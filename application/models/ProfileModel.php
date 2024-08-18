<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProfileModel extends CI_Model
{

    public function getUserProfile($user_id)
    {
        $this->db->select('users.*, schedules.name AS schedule_name, schedules.start_time, schedules.end_time');
        $this->db->from('users');
        $this->db->join('schedules', 'users.schedule_id = schedules.id', 'left');
        $this->db->where('users.id', $user_id);
        return $this->db->get()->row_array();
    }

    
    public function updateUserProfile($user_id, $data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
}
