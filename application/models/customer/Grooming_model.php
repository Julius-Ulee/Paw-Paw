<?php

class Grooming_model extends CI_Model
{
    public function getAllPackages()
    {
        return $this->db->get("packages")->result_array();
    }

    public function getGroomingsDataByUser()
    {
        $this->db->select('*');
        $this->db->from("groomings");
        $this->db->join("packages", "packages.package_id = groomings.package_id");
        $this->db->where("customer_id", $this->session->userdata("customer_id"));
        return $this->db->get()->result_array();
    }

    public function registerGrooming($groomingData)
    {
        $this->db->insert("groomings", $groomingData);
    }

    public function getGroomingById($id)
    {
        $this->db->select('*');
        $this->db->from("groomings");
        $this->db->join("packages", "packages.package_id = groomings.package_id");
        $this->db->where("grooming_id", $id);
        return $this->db->get()->row_array();
    }

    public function deleteGrooming($id)
    {
        $this->db->where("grooming_id", $id);
        $this->db->delete("groomings");
    }
}
