<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function userRegistration($userData)
	{
		$this->db->insert('customers', $userData);
	}
}
