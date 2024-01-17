<?php

class Landing_model extends CI_Model
{
	public function getCategories()
	{
		$this->db->limit(4);
		return $this->db->get("categories")->result_array();
	}

	public function getProducts()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->where("stock > 0");
		$this->db->limit(6);
		return $this->db->get()->result_array();
	}
}
