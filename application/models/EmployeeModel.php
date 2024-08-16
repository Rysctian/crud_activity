

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeModel extends CI_Model
{

    public function get_all_employee()
    {
        $query = $this->db->where('role_id', 2)->get('users');
        return $query->result();
    }

    public function get_employee($id)
    {
        $query = $this->query->where('id', $id)->get('users');
        return $query;
    }
}