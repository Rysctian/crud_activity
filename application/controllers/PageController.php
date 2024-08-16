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
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function home()
    {
        $this->check_authentication();
        $data['username'] = $this->session->userdata('username');
        $data['firstname'] = $this->session->userdata('firstname');
        $data['role_id'] = $this->session->userdata('role_id');

        var_dump($data);

        $this->load->view("home_view", $data);
    }

 

    public function profile()
    {
        $user_id = $this->session->userdata('user_id');
        $this->check_authentication();
        $this->load->view("profile_view.php");
    }
  
    public function image_upload()
    {
        $this->check_authentication();
        
        $this->load->view("image_upload.php");
    }

    
}
