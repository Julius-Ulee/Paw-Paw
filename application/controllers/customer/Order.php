<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Order extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Customer/Product_model', 'Product_model');
		$this->load->model('admin/Bank_model', 'Bank_model');
	}

	public function transfer()
	{
		$data["page_title"] = "Lengkapi Detail Pesanan";
		$data["banks"] = $this->Bank_model->getAllBanks();

		$this->form_validation->set_rules('receipent_name', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('receipent_phone', 'No Hp Penerima', 'required');
		$this->form_validation->set_rules("receipent_address", "Alamat penerima", "required");

		if (empty($_FILES['payment_slip']['name'])) {
			$this->form_validation->set_rules('payment_slip', 'Slip Pembayaran', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("customer/order/payment/transfer_view", $data);
		} else {
			$customerId = $this->input->post("customer_id");
			$receipentName = $this->input->post('receipent_name');
			$receipentPhone = $this->input->post("receipent_phone");
			$receipentAddress = $this->input->post("receipent_address");
			$paymentMethod = "transfer";
			$paymentSlip = $_FILES["payment_slip"];
			if ($paymentSlip) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				// $config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/payments/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("payment_slip")) {
					$paymentSlip = $this->upload->data("file_name");
				} else {
					// echo $this->display_error();
					echo "Upload gagal";
				}
			}
			$totalPayment = $this->input->post("total_payment");

			$dataOrder = [
				"customer_id" => $customerId,
				"receipent_name" => $receipentName,
				"receipent_phone" => $receipentPhone,
				"receipent_address" => $receipentAddress,
				"payment_method" => $paymentMethod,
				"payment_slip" => $paymentSlip,
				"total_payment" => $totalPayment,
				"info" => "Lunas"
			];

			$idOrder = $this->Product_model->addOrder($dataOrder);
			// input detail order disini
			if ($cart = $this->cart->contents()) {
				foreach ($cart as $item) {
					$dataDetailOrder = array(
						"order_id" => $idOrder,
						"item_id" => $item["id"],
						"qty" => $item["qty"],
						"total_price" => $item["qty"] * $item["price"]
					);
					$this->Product_model->addOrderDetail($dataDetailOrder);
				}
			}
			$this->cart->destroy();
			redirect("checkout-success");
		}
	}

	public function cod()
	{
		$data["page_title"] = "Lengkapi Detail Pesanan";

		$this->form_validation->set_rules('receipent_name', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('receipent_phone', 'No Hp Penerima', 'required');
		$this->form_validation->set_rules("receipent_address", "Alamat penerima", "required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("customer/order/payment/cod_view", $data);
		} else {
			$customerId = $this->input->post("customer_id");
			$receipentName = $this->input->post('receipent_name');
			$receipentPhone = $this->input->post("receipent_phone");
			$receipentAddress = $this->input->post("receipent_address");
			$paymentMethod = "cod";
			$totalPayment = $this->input->post("total_payment");

			$dataOrder = [
				"customer_id" => $customerId,
				"receipent_name" => $receipentName,
				"receipent_phone" => $receipentPhone,
				"receipent_address" => $receipentAddress,
				"payment_method" => $paymentMethod,
				"total_payment" => $totalPayment,
				"info" => "Bayar Ditempat"
			];

			$idOrder = $this->Product_model->addOrder($dataOrder);
			// input detail order disini
			if ($cart = $this->cart->contents()) {
				foreach ($cart as $item) {
					$dataDetailOrder = array(
						"order_id" => $idOrder,
						"item_id" => $item["id"],
						"qty" => $item["qty"],
						"total_price" => $item["qty"] * $item["price"]
					);
					$this->Product_model->addOrderDetail($dataDetailOrder);
				}
			}
			$this->cart->destroy();
			redirect("checkout-success");
		}
	}

	public function processOrder()
	{

		$dataOrder = array(
			"customer_id" => $this->input->post("customer_id"),
			"receipent_name" => $this->input->post("receipent_name"),
			"receipent_phone" => $this->input->post("receipent_phone"),
			"receipent_address" => $this->input->post("receipent_address"),
			"total_payment" => $this->input->post("total_payment")
		);
		$idOrder = $this->Product_model->addOrder($dataOrder);
		// input detail order disini
		if ($cart = $this->cart->contents()) {
			foreach ($cart as $item) {
				$dataDetailOrder = array(
					"order_id" => $idOrder,
					"item_id" => $item["id"],
					"qty" => $item["qty"],
					"total_price" => $item["qty"] * $item["price"]
				);
				$this->Product_model->addOrderDetail($dataDetailOrder);
			}
		}
		$this->cart->destroy();
		redirect("checkout-success");
	}
}
