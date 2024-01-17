<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Customer_model', 'Customer_model');
		if ($this->session->userdata("logged_in") !== "admin") {
			redirect("/");
		}
	}

	public function index()
	{
		$data["page_title"] = "Kelola Customer";
		$data["customers"] = $this->Customer_model->getAllCustomers();

		$this->load->view("admin/customers/index_view", $data);
	}

	public function create()
	{
		$data["page_title"] = "Tambah Customer";

		$this->_validationAdd();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/customers/create_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$email = htmlspecialchars($this->input->post("email", true));
			$phone = htmlspecialchars($this->input->post("phone", true));
			$address = htmlspecialchars($this->input->post("address", true));
			$avatar = $_FILES["avatar"];
			if ($avatar) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/avatars/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("avatar")) {
					$avatar = $this->upload->data("file_name");
				} else {
					$avatar = "default.jpg";
				}
			}
			$password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$isActive = 1;

			// Set Data
			$customerData = [
				"name" => $name,
				"avatar" => $avatar,
				"phone" => $phone,
				"address" => $address,
				"email" => $email,
				"password" => $password,
				"is_active" => $isActive
			];

			$this->Customer_model->addNewCustomer($customerData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect("kelola-customer");
		}
	}

	public function edit($id)
	{
		$data["page_title"] = "Ubah Data Customer";
		$data["customer"] = $this->Customer_model->getCustomerById($id);

		$this->_validatonEdit();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/customers/edit_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$email = htmlspecialchars($this->input->post("email", true));
			$phone = htmlspecialchars($this->input->post("phone", true));
			$address = htmlspecialchars($this->input->post("address", true));
			$avatar = $_FILES["avatar"];
			if ($avatar) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["upload_path"] = "./assets/uploads/avatars/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("avatar")) {
					$customer = $this->Customer_model->getCustomerById($id);
					$oldAvatar = $customer["avatar"];
					if ($oldAvatar != "default.jpg") {
						unlink('./assets/uploads/avatars/' . $oldAvatar);
					}
					$newAvatar = $this->upload->data("file_name");
					$avatar = $newAvatar;
				} else {
					$customer = $this->Customer_model->getCustomerById($id);
					$avatar = $customer["avatar"];
				}
			}
			$isActive = $this->input->post("is_active");

			// Set Data
			$customerData = [
				"name" => $name,
				"avatar" => $avatar,
				"phone" => $phone,
				"address" => $address,
				"email" => $email,
				"is_active" => $isActive,
			];
			$this->Customer_model->updateCustomer($customerData);
			$this->session->set_flashdata('message', 'Diubah');
			redirect("kelola-customer");
		}
	}

	public function delete($id)
	{
		$customer = $this->Customer_model->getCustomerById($id);
		if (file_exists('./assets/uploads/avatars/' . $customer["avatar"]) && $customer["avatar"] != "default.jpg") {
			unlink('./assets/uploads/avatars/' . $customer["avatar"]);
		}
		$this->Customer_model->deleteCustomer($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("kelola-customer");
	}

	public function detail($id)
	{
		$data["page_title"] = "Detail Data Customer";
		$data["customer"] = $this->Customer_model->getCustomerById($id);

		$this->load->view("admin/customers/detail_view", $data);
	}


	// validation function
	private function _validationAdd()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[customers.email]', [
			'is_unique' => 'E-mail ini sudah digunakan'
		]);
		$this->form_validation->set_rules('phone', 'Nomor Ponsel', 'required|trim|is_unique[customers.phone]', [
			'is_unique' => 'Nomor ini sudah digunakan'
		]);
		$this->form_validation->set_rules('address', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
			'min_length' => 'Password minimal harus 4 karakter'
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sesuai'
		]);
	}

	private function _validatonEdit()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
		$this->form_validation->set_rules('phone', 'Nomor Ponsel', 'required|trim');
		$this->form_validation->set_rules('address', 'Alamat Tinggal', 'required|trim');
	}
}
