<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EmployeeModel');

        // Check if the user is an admin
        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('error', 'You are not authorized to access this page.');
            redirect('AdminController/unauthorized');
        }
    }

    public function unauthorized()
    {
        $this->load->view('errors/unauthorized');
    }
    
    public function index() {
        $this->load->view('admin/dashboard_view');
    }

    public function employee_view() {
        $this->load->view('employee/employee_view');
    }
}
