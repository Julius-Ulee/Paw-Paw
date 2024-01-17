<?php
class Bank_model extends CI_Model
{

	public function getAllBanks()
	{
		return $this->db->get("bank_accounts")->result_array();
	}

	public function insertNewBank($bankData)
	{
		$this->db->insert("bank_accounts", $bankData);
	}

	public function updateBank($bankData, $id)
	{
		$this->db->set("logo", $bankData["logo"]);
		$this->db->set("name", $bankData["name"]);
		$this->db->set("number", $bankData["number"]);
		$this->db->set("holder", $bankData["holder"]);
		$this->db->where("bank_id", $id);
		$this->db->update("bank_accounts", $bankData);
	}

	public function getBankById($id)
	{
		return $this->db->get_where("bank_accounts", ["bank_id" => $id])->row_array();
	}

	public function deleteBank($id)
	{
		$this->db->where("bank_id", $id);
		$this->db->delete("bank_accounts");
	}
}
