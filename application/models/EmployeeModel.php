<?php

defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeModel extends CI_Model
{
    public function getAllEmployee()
    {
        $this->db->select('users.*, schedules.name AS schedule_name, schedules.start_time, schedules.end_time');
        $this->db->from('users');
        $this->db->join('schedules', 'users.schedule_id = schedules.id', 'left');
        $this->db->where('users.role_id', 2 );
        $query = $this->db->get();
        return $query->result();
    }

    public function getEmployeeById($id)
    {
        $this->db->select('users.*, schedules.start_time, schedules.end_time');
        $this->db->from('users');
        $this->db->join('schedules', 'users.schedule_id = schedules.id', 'left');
        $this->db->where('users.id', $id);
        $query = $this->db->get();
        return $query->row(); 
    }


    public function updateEmployee($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    
    public function deleteEmployee($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
