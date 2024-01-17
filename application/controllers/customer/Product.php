<?php

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer/Product_model', 'Product_model');
	}

	public function index()
	{
		$data["page_title"] = "List Produk";
		$data["categories"] = $this->Product_model->getCategories();
		$data["products"] = $this->Product_model->getAllProducts();

		if ($this->input->post("keyword")) {
			$data["products"] = $this->Product_model->getSearchResult();
		}

		$this->load->view("customer/products/product_view", $data);
	}

	public function detail($slug)
	{
		$getTitle = $this->Product_model->getTitleBySlug($slug);
		$data["page_title"] = $getTitle["name"];
		$data["product"] = $this->Product_model->getProductBySlug($slug);
		$data["products"] = $this->Product_model->getLatestProduct();

		$this->load->view("customer/products/detail_view", $data);
	}
}
