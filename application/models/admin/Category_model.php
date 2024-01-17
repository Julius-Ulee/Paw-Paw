<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

	var $table = "categories";
	var $columnOrder = array("image", "name", "slug", null);
	var $columnSearch = array("name", "slug");
	var $order = array("category_id" => "DESC");

	private function _getDatatablesQuery()
	{
		$this->db->from($this->table);
		$i = 0;

		foreach ($this->columnSearch as $item) {
			if ($_POST['search']['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($this->columnSearch) - 1 == $i) $this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->columnOrder[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function getDatatables()
	{
		$this->_getDatatablesQuery();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
			return $this->db->get()->result();
		}
	}

	public function countFiltered()
	{
		$this->_getDatatablesQuery();
		return $this->db->get()->num_rows();
	}

	public function countAll()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function getById($id)
	{
		$this->db->from($this->table);
		$this->db->where("category_id", $id);
		return $this->db->get()->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function deleteById($id)
	{
		$this->db->where("category_id", $id);
		$this->db->delete($this->table);
	}
}
