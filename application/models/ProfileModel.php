<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProfileModel extends CI_Model
{

    public function get_user_profile($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
    
        if ($query->num_rows() > 0) {
            return $query->row_array(); 
        } else {
            return null;
        }
    }


    public function update_user_profile($data, $user_id)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    
}
