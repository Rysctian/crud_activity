<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EmployeeModel');
        $this->load->model('ScheduleModel');
        $this->load->library('upload');

        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('error', 'You are not authorized to access this page.');
            redirect('home');
        }
    }

 
    public function index() 
    {
        $data['employees'] = $this->EmployeeModel->getAllEmployee();
        $data['schedules'] = $this->ScheduleModel->getAllSchedules(); 
        $this->load->view('employee/employee_view', $data);
    }


    public function assignSchedule() {
        $employee_id = $this->input->post('employee_id');
        $schedule_id = $this->input->post('schedule_id');
        
        if ($employee_id && $schedule_id) {
            $result = $this->EmployeeModel->updateEmployee($employee_id, ['schedule_id' => $schedule_id]);
        
            if ($result) {
                $this->session->set_flashdata('success', 'Schedule assigned successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to assign schedule.');
            }
        } else {
            $this->session->set_flashdata('error', 'Failed to assign schedule. Some data is missing.');
        }
        
        redirect('employees'); 
    }
    
    public function edit($id)
    {
        $data['employee'] = $this->EmployeeModel->getEmployeeById($id);
        $data['schedules'] = $this->ScheduleModel->getAllSchedules(); 
        $data['flash_message'] = $this->session->flashdata('flash_message');
        $this->load->view('employee/employee_edit', $data);
    }
    
    
    public function update($id)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; 
        $config['file_name'] = $_FILES['userfile']['name'];
    
        $this->upload->initialize($config);
    
        if ($this->upload->do_upload('userfile')) {
            $uploadedData = $this->upload->data();
            $image = $uploadedData['file_name'];
        } else {
            $image = $this->input->post('existing_image');
        }
    
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'role_id' => $this->input->post('role_id'),
            'schedule_id' => $this->input->post('schedule_id'),
            'profile_image' => $image,
        );
    
        if ($this->EmployeeModel->updateEmployee($id, $data)) {
            $this->session->set_flashdata('success', 'Employee updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update employee.');
        }
    
        redirect('employees');
    }
    
    public function delete($id)
    {
        if ($this->EmployeeModel->deleteEmployee($id)) {
            $this->session->set_flashdata('success', 'Employee deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete employee.');
        }
    
        redirect('employees');
    }


}