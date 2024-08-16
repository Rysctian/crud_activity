<?php 


class UserModel extends CI_Model
{

    function registerUserData($data)
    {
        $this->db->insert('users', $data);
    }

    
    public function loginUserData($data)
    {   
        $username = $data["username"];
        $password = $data["password"];
    
        // Fetch the user by email
        $query = $this->db->where('username', $username)->get('users');
    
        if ($query->num_rows() == 1) {
            $user = $query->row();
    
            // Verify password
            if (password_verify($password, $user->password)) {
                return $user; 
            }
        }
    
        return NULL;
    }
    
}