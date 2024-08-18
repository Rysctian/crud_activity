<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserProfileController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('ProfileModel');
    }
    
    private function check_authentication()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

       
    public function profile()
    {
    //    $data = [
    //         'user_id'=> $this->session->userdata('user_id'),
    //         'firstname' => $this->session->userdata('firstname'),
    //         'lastname' => $this->session->userdata('lastname'),
    //         'username' => $this->session->userdata('username'),
    //         'email' => $this->session->userdata('email'),
    //    ];

        $this->check_authentication();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('ProfileModel');

        $user_data = $this->ProfileModel->getUserProfile($user_id);
        $this->load->view("profile_view.php", ['data'=> $user_data]);
    }
   

    public function update_profile()
    {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
        );

        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 800;
        $config['upload_path'] = './uploads/';

        $this->load->library('upload', $config);
        
        if (!empty($_FILES['userfile']['name'])) {
            if ($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
                $image_path = $upload_data['file_name'];
                $data['profile_image'] = $image_path;
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('profile');
            }
        } else {
            $existing_data = $this->ProfileModel->getUserProfile($user_id);
            $data['profile_image'] = $existing_data['profile_image'];
        }

        $update_status = $this->ProfileModel->updateUserProfile($user_id, $data);

        if ($update_status) {
            $this->session->set_flashdata('success', 'Profile updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update profile.');
        }

        $updated_data = $this->ProfileModel->getUserProfile($user_id);
        $this->load->view("profile_view", ['data' => $updated_data]);
    }
}
