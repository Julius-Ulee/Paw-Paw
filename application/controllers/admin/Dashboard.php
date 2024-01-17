<?php
defined('BASEPATH') or exit('No direct script access');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Dashboard_model', 'Dashboard_model');
		if ($this->session->userdata("logged_in") !== "admin") {
			redirect("/");
		}
	}

	public function index()
	{
		$data["page_title"] = "Dashboard";
		$data["total_customers"] = $this->Dashboard_model->countAllCustomers();
		$data["total_products"] = $this->Dashboard_model->countAllProducts();
		$data["total_groomings"] = $this->Dashboard_model->countAllGroomings();
		$data["total_orders"] = $this->Dashboard_model->countAllOrders();

		$this->load->view("admin/dashboard_view", $data);
	}
}
