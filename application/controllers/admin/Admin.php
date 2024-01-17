<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model', 'Admin_model');
		$this->load->library('form_validation');
		if ($this->session->userdata("logged_in") == "admin" && $this->session->userdata("role") !== "Admin") {
			redirect("/");
		}
	}

	public function index()
	{
		$data["page_title"] = "Kelola Admin";
		$data["admins"] = $this->Admin_model->getAllAdmins();

		$this->load->view("admin/admins/index_view", $data);
	}

	public function create()
	{
		$data["page_title"] = "Tambah Admin";

		$this->_validationAdd();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/admins/create_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$email = htmlspecialchars($this->input->post("email", true));
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
			$role = htmlspecialchars($this->input->post("role", true));
			$password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$isActive = 1;

			// Set Data
			$adminData = [
				"name" => $name,
				"avatar" => $avatar,
				"email" => $email,
				"role" => $role,
				"password" => $password,
				"is_active" => $isActive
			];

			$this->Admin_model->addNewAdmin($adminData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect("kelola-admin");
		}
	}

	public function edit($id)
	{
		$data["page_title"] = "Edit Admin";
		$data["admin"] = $this->Admin_model->getAdminById($id);

		$this->_validationEdit();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/admins/edit_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$email = htmlspecialchars($this->input->post("email", true));
			$avatar = $_FILES["avatar"];
			if ($avatar) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["upload_path"] = "./assets/uploads/avatars/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("avatar")) {
					$admin = $this->Admin_model->getAdminById($id);
					$oldAvatar = $admin["avatar"];
					if ($oldAvatar != "default.jpg") {
						unlink('./assets/uploads/avatars/' . $oldAvatar);
					}
					$newAvatar = $this->upload->data("file_name");
					$avatar = $newAvatar;
				} else {
					$admin = $this->Admin_model->getAdminById($id);
					$avatar = $admin["avatar"];
				}
			}
			$role = $this->input->post("role");
			$isActive = $this->input->post("is_active");

			// Set Data
			$adminData = [
				"name" => $name,
				"avatar" => $avatar,
				"email" => $email,
				"role" => $role,
				"is_active" => $isActive
			];
			$this->Admin_model->updateAdmin($adminData, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect("kelola-admin");
		}
	}

	public function delete($id)
	{
		$admin = $this->Admin_model->getAdminById($id);
		if (file_exists('./assets/uploads/avatars/' . $admin["avatar"]) && $admin["avatar"] != "default.jpg") {
			unlink('./assets/uploads/avatars/' . $admin["avatar"]);
		}
		$this->Admin_model->deleteAdmin($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("kelola-admin");
	}

	private function _validationAdd()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[customers.email]', [
			'is_unique' => 'E-mail ini sudah digunakan'
		]);
		$this->form_validation->set_rules('role', 'Hak Akses', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
			'min_length' => 'Password minimal harus 4 karakter'
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sesuai'
		]);
	}

	private function _validationEdit()
	{
		$this->form_validation->set_rules("name", "Nama", "required|trim");
		$this->form_validation->set_rules("email", "E-mail", "required|trim");
	}
}
