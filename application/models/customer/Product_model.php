<?php
class Product_model extends CI_Model
{

	public function getCategories()
	{
		$this->db->limit(4);
		return $this->db->get("categories")->result_array();
	}

	public function getAllProducts()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->where("stock > 0");
		return $this->db->get()->result_array();
	}

	public function getSearchResult()
	{
		$keyword = $this->input->post("keyword");
		$this->db->like('name', $keyword);
		return $this->db->get("items")->result_array();
	}

	public function getTitleBySlug($slug)
	{
		$this->db->select("name");
		$this->db->from("items");
		$this->db->where("slug", $slug);
		return $this->db->get()->row_array();
	}

	public function getProductBySlug($slug)
	{
		return $this->db->get_where("items", ["slug" => $slug])->row_array();
	}

	public function getLatestProduct()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->where("stock > 0");
		$this->db->limit(4);
		$this->db->order_by("item_id", "DESC");
		return $this->db->get()->result_array();
	}

	public function find($id)
	{
		$result = $this->db->where('item_id', $id)->limit(1)->get('items');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function addOrder($dataOrder)
	{
		$this->db->insert("orders", $dataOrder);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public  function addOrderDetail($dataDetailOrder)
	{
		$this->db->insert("order_details", $dataDetailOrder);
	}

	public function getAllOrdersByUser()
	{
		return $this->db->get_where("orders", ["customer_id" => $this->session->userdata("customer_id")])->result_array();
	}

	public function getDetailOrderById($id)
	{
		$this->db->select("*");
		$this->db->from("order_details");
		$this->db->join("items", "items.item_id = order_details.item_id");
		$this->db->where("order_id", $id);
		return $this->db->get()->result_array();
	}
}
