<?php
class Admin_model extends CI_Model
{

    public function getAllAdmins()
    {
        return $this->db->get("admins")->result_array();
    }

    public function getAdminById($id)
    {
        return $this->db->get_where("admins", ["admin_id" => $id])->row_array();
    }

    public function addNewAdmin($adminData)
    {
        $this->db->insert("admins", $adminData);
    }

    public function updateAdmin($adminData, $id)
    {
        $this->db->set("name", $adminData["name"]);
        $this->db->set("avatar", $adminData["avatar"]);
        $this->db->set("email", $adminData["email"]);
        $this->db->set("role", $adminData["role"]);
        $this->db->set("is_active", $adminData["is_active"]);
        $this->db->where("admin_id", $id);
        $this->db->update("admins", $adminData);
    }

    public function deleteAdmin($id)
    {
        $this->db->where("admin_id", $id);
        $this->db->delete("admins");
    }
}
