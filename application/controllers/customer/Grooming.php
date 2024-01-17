<?php
class Grooming extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('customer/Grooming_model', 'Grooming_model');
		if ($this->session->userdata("logged_in") !== "customer") {
			redirect("login");
		}
	}

	public function index()
	{
		$data["page_title"] = "Status Layanan Grooming";
		$data["groomings"] = $this->Grooming_model->getGroomingsDataByUser();

		$this->load->view("customer/groomings/index_view", $data);
	}

	public function groomingRegistration()
	{
		$data["page_title"] = "Registrasi Grooming";
		$data["packages"] = $this->Grooming_model->getAllPackages();

		$this->_groomingValidation();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("customer/groomings/registration_view", $data);
		} else {
			$customerName = htmlspecialchars($this->input->post("customer_name", true));
			$customerPhone = htmlspecialchars($this->input->post("customer_phone"));
			$customerAddress = htmlspecialchars($this->input->post("customer_address"));
			$petType = $this->input->post("pet_type");
			$packageId = $this->input->post("package_id");
			$customerNotes = htmlspecialchars($this->input->post("notes", true));

			$groomingData = [
				"customer_name" => $customerName,
				"customer_phone" => $customerPhone,
				"customer_address" => $customerAddress,
				"pet_type" => $petType,
				"grooming_status" => "Didaftarkan",
				"package_id" => $packageId,
				"customer_id" => $this->session->userdata("customer_id"),
				"notes" => $customerNotes
			];

			$this->Grooming_model->registerGrooming($groomingData);
			$this->session->set_flashdata('message', 'Didaftarkan');
			redirect('grooming');
		}
	}

	public function detailGrooming($id)
	{
		$data["page_title"] = "Detail Status Groomong";
		$data["grooming"] = $this->Grooming_model->getGroomingById($id);

		$this->load->view("customer/groomings/detail_view", $data);
	}

	public function deleteGroomingData($id)
	{
		$this->Grooming_model->deleteGrooming($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("grooming");
	}

	private function _groomingValidation()
	{
		$this->form_validation->set_rules("customer_name", "Nama Customer", "required");
		$this->form_validation->set_rules("customer_phone", "Phone Customer", "required");
		$this->form_validation->set_rules("customer_address", "Alamat Customer", "required");
		$this->form_validation->set_rules("pet_type", "Tipe Peliharaan", "required");
	}
}
