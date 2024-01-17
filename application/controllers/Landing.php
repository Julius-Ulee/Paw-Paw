<?php
class Landing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Landing_model');
	}

	public function index()
	{
		$data["page_title"] = "Petshop";
		$data["products"] = $this->Landing_model->getProducts();
		$data["categories"] = $this->Landing_model->getCategories();

		$this->load->view("landing_view", $data);
	}
}
