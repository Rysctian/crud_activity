<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EmployeeModel');
        if ($this->session->userdata('role_id') != 1) {
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('admin/dashboard_view');
    }
    public function employee_view() {
        $this->load->view('admin/employee_view');
    }


    public function all_employees()
    {
        $employees = $this->EmployeeModel->get_all_employee();

        redirect("employee_view", ["employees" => $employees]);
    }

}
