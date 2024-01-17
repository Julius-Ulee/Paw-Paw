<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

	public function getAllProduct()
	{
		$this->db->select('items.*, categories.name AS category_name');
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		return $this->db->get()->result_array();
	}

	public function getProductById($id)
	{
		return $this->db->get_where("items", ["item_id" => $id])->row_array();
	}

	public function getProductCategory()
	{
		return $this->db->get("categories")->result_array();
	}

	public function addNewProduct($productData)
	{
		$this->db->insert("items", $productData);
	}

	public function updateProduct($productData, $id)
	{
		$this->db->set("name", $productData["name"]);
		$this->db->set("slug", $productData["slug"]);
		$this->db->set("images", $productData["images"]);
		$this->db->set("description", $productData["description"]);
		$this->db->set("stock", $productData["stock"]);
		$this->db->set("price", $productData["price"]);
		$this->db->set("category_id", $productData["category_id"]);
		$this->db->where("item_id", $id);
		$this->db->update("items", $productData);
	}

	public function deleteProduct($id)
	{
		$this->db->where("item_id", $id);
		$this->db->delete("items");
	}
}
