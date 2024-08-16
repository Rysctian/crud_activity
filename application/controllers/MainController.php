<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainController extends CI_Controller
{

    public function index()
    {
        $this->register();
    }

    
    public function register()
    {
        $this->load->view('auth/register_view');
    }
    
}
