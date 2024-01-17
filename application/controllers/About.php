<?php
class About extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["page_title"] = "Petshop";

		$this->load->view("about_view", $data);
	}
}
