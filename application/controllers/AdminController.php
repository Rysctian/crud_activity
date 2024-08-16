<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Ensure the user is logged in and has admin role
        if ($this->session->userdata('role_id') != 1) {
            redirect('login');
        }
    }

    public function index() {
        // Load the admin dashboard view
        $this->load->view('dashboard_view');
    }
}
