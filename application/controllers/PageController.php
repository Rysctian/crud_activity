<?php
defined('BASEPATH') or exit('No direct script access allowed');


class PageController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    private function check_authentication()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function home()
    {
        $this->check_authentication();
        $data['username'] = $this->session->userdata('username');
        $data['firstname'] = $this->session->userdata('firstname');
        $data['role_id'] = $this->session->userdata('role_id');

        $this->load->view("home_view", $data);
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

       $user_id = $this->session->userdata('user_id');
       $this->load->model('ProfileModel');
       
       $user_data = $this->ProfileModel->getUserProfile($user_id);
        $this->check_authentication();
        $this->load->view("profile_view.php", ['data'=> $user_data]);
    }
  


    
}
