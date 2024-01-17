<?php
defined('BASEPATH') or exit('No direct script access');

class Bank extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/Bank_model', 'Bank_model');
		if ($this->session->userdata("logged_in") == "admin" && $this->session->userdata("role") !== "Admin") {
			redirect("/");
		}
	}

	public function index()
	{
		$data["page_title"] = "Kelola Rekening Pembayaran";
		$data["banks"] = $this->Bank_model->getAllBanks();

		$this->load->view("admin/banks/index_view", $data);
	}

	public function addNewBank()
	{
		$data["page_title"] = "Tambah Rekening Pembayaran";

		$this->form_validation->set_rules('name', 'Nama Bank', 'required');
		$this->form_validation->set_rules('number', 'Nomor Rekening', 'required');
		$this->form_validation->set_rules('holder', 'Nama Pemilik', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/banks/create_view", $data);
		} else {

			$bankName = $this->input->post("name");
			$bankNumber = $this->input->post("number");
			$ownerName = $this->input->post("holder");
			$bankLogo = $_FILES["logo"];
			if ($bankLogo) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				// $config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/banks/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("logo")) {
					$bankLogo = $this->upload->data("file_name");
				} else {
					// echo $this->display_error();
					echo "Upload gagal";
				}
			}

			$bankData = [
				"logo" => $bankLogo,
				"name" => $bankName,
				"number" => $bankNumber,
				"holder" => $ownerName,
			];

			$this->Bank_model->insertNewBank($bankData);
			$this->session->set_flashdata("message", "Ditambah");
			redirect("admin/bank");
		}
	}

	public function editBank($id)
	{
		$data["page_title"] = "Ubah Rekening Pembayaran";
		$data["bank"] = $this->Bank_model->getBankById($id);

		$this->form_validation->set_rules("name", "Nama Bank", 'required');
		$this->form_validation->set_rules("number", "Nomor Rekening", 'required');
		$this->form_validation->set_rules("holder", "Pemilik", 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/banks/edit_view", $data);
		} else {
			$bankName = $this->input->post("name");
			$bankNumber = $this->input->post("number");
			$ownerName = $this->input->post("holder");
			$bankLogo = $_FILES["logo"];
			if ($bankLogo) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["max_size"] = 1024; //1 MB
				$config["file_name"] = $id;
				$config["upload_path"] = "./assets/uploads/banks/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("logo")) {
					$bank = $this->Bank_model->getBankById($id);
					$oldbankLogo = $bank["logo"];
					if ($oldbankLogo) {
						unlink('./assets/uploads/banks/' . $oldbankLogo);
					}
					$newbankLogo = $this->upload->data("file_name");
					$bankLogo = $newbankLogo;
				} else {
					$bank = $this->Bank_model->getBankById($id);
					$bankLogo = $bank["logo"];
				}
			}

			$bankData = [
				"logo" => $bankLogo,
				"name" => $bankName,
				"number" => $bankNumber,
				"holder" => $ownerName
			];

			$this->Bank_model->updateBank($bankData, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('admin/bank');
		}
	}

	public function deleteBank($id)
	{
		$bank = $this->Bank_model->getBankById($id);
		if (file_exists('./assets/uploads/banks/' . $bank["logo"]) && $bank["logo"]) {
			unlink('./assets/uploads/banks/' . $bank["logo"]);
		}
		$this->Bank_model->deleteBank($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("admin/bank");
	}
}
