<?php

class Cart extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer/Product_model', 'Product_model');
		if ($this->session->userdata("logged_in") !== "customer") {
			redirect("login");
		}
	}

	public function index()
	{
		$data["page_title"] = "Keranjang Saya";
		$this->load->view("customer/cart/index_view", $data);
	}

	public function addToCart($id)
	{
		$barang = $this->Product_model->find($id);
		$qty = 1;

		// cek jika user menambahkan qty barang
		if ($this->input->post("qty")) {
			$qty = $this->input->post("qty");
		}

		$data = array(
			"id" => $barang->item_id,
			"qty" => $qty,
			"price" => $barang->price,
			"name" => $barang->name,
			"images" => $barang->images,
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('message', 'Ditambah ke Keranjang');
		redirect($_SERVER["HTTP_REFERER"]);
	}

	public function emptyCart()
	{
		$this->cart->destroy();
		redirect('detail-keranjang');
	}

	public function continueOrder()
	{
		$data["page_title"] = "Pilih Metode Pembayaran";
		$this->load->view("customer/order/index_view", $data);
	}



	public function checkoutSuccess()
	{
		$data["page_title"] = "Checkout Berhasil";

		$this->load->view("customer/cart/checkout_view", $data);
	}

	public function showMyOrder()
	{
		$data["page_title"] = "Orderan Saya";
		$data["orders"] = $this->Product_model->getAllOrdersByUser();

		$this->load->view("customer/cart/order_view", $data);
	}

	public function showDetailOrder($id)
	{
		$data["page_title"] = "Detail Orderan";
		$data["items"] = $this->Product_model->getDetailOrderById($id);

		$this->load->view("customer/cart/detail_view", $data);
	}
}
