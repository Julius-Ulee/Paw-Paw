<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function getAllCustomers()
    {
        return $this->db->get("customers")->result_array();
    }

    public function getCustomerById($id)
    {
        return $this->db->get_where("customers", ["customer_id" => $id])->row_array();
    }

    public function addNewCustomer($customerData)
    {
        $this->db->insert("customers", $customerData);
    }

    public function updateCustomer($userData)
    {
        $this->db->set("name", $userData["name"]);
        $this->db->set("avatar", $userData["avatar"]);
        $this->db->set("phone", $userData["phone"]);
        $this->db->set("address", $userData["address"]);
        $this->db->set("email", $userData["email"]);
        $this->db->set("is_active", $userData["is_active"]);
        $this->db->where("customer_id", $this->input->post("customer_id"));
        $this->db->update("customers", $userData);
    }

    public function deleteCustomer($id)
    {
        $this->db->where("customer_id", $id);
        $this->db->delete("customers");
    }
}
