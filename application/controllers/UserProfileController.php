<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserProfileController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
    }
    
    public function get_user_information()
    {
        $user_id = $this->session->userdata('user_id');
    
        $user_profile = $this->ProfileModel->getUserProfile($user_id);
    
        if ($user_profile) {
            $this->load->view('profile_view', [
                'user' => $user_profile,
            ]);
        } else {
            show_error('User profile not found.');
        }
    }
    

    // public function update_user_profile()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //         // Form validation rules
    //         $this->form_validation->set_rules("firstname", "First Name", "trim|required|alpha");
    //         $this->form_validation->set_rules("lastname", "Last Name", "trim|required|alpha");
    //         $this->form_validation->set_rules("username", "Username", "trim|required");
    //         $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
    //         $this->form_validation->set_rules("password", "Password", "trim|required|min_length[6]");

    //         if ($this->form_validation->run() === TRUE) {
    //             $user_id = $this->session->userdata('user_id');
    //             $first_name = $this->input->post("firstname");
    //             $last_name = $this->input->post("lastname");
    //             $username = $this->input->post("username");
    //             $email = $this->input->post("email");
    //             $password = password_hash($this->input->post("password"), PASSWORD_DEFAULT); // Hash password

    //             // Handle image upload
    //             $config['upload_path'] = './upload';
    //             $config['allowed_types'] = 'gif|jpg|png';
    //             $config['max_size'] = 2048; // 2 MB
    //             $this->upload->initialize($config);

    //             if ($this->upload->do_upload('image_profile')) {
    //                 $upload_data = $this->upload->data();
    //                 $image_path = $upload_data['file_name'];
    //             } else {
    //                 $image_path = $this->input->post('current_image'); 
    //             }

    //             $data = [
    //                 'first_name' => $first_name,
    //                 'last_name' => $last_name,
    //                 'username' => $username,
    //                 'email' => $email,
    //                 'password' => $password,
    //                 'profile_image' => $image_path,
    //             ];

    //             if ($this->ProfileModel->update_user_profile($user_id, $data)) {
    //                 $this->session->set_flashdata('success', 'Profile updated successfully!');
    //             } else {
    //                 $this->session->set_flashdata('error', 'Failed to update profile.');
    //             }
                
    //             redirect('profile');
    //         } else {
    //             $this->load->view('update_profile_view');
    //         }
    //     } else {
    //         redirect("profile");
    //     }
    // }

    public function upload_profile_image()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 800; 
    
        $user_id = $this->session->userdata('user_id');
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('userfile'))
        {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect("UserProfileController/upload_profile_image");
        }
        else
        {
            $upload_data = $this->upload->data();
            $image_path = $upload_data['file_name'];
            
            $data = array('profile_image' => $image_path);
            
            $this->load->model('ProfileModel');
            $this->ProfileModel->update_user_profile($data, $user_id);
            
            $this->session->set_flashdata('success', 'Profile image uploaded successfully!');
            redirect("image_upload");
        }
    }
    
}
