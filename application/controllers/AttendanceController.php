<?php

use Carbon\Traits\ToStringFormat;

defined('BASEPATH') or exit('No direct script access allowed');

class AttendanceController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('AttendanceModel');
        $this->load->library('session');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $current_date = date('Y-m-d');

        $time_in_exists = $this->AttendanceModel->checkTimeIn($user_id, $current_date);
        $time_out_exists = $this->AttendanceModel->checkTimeOut($user_id, $current_date);
        $attendance = $this->AttendanceModel->getAttendanceForDate($user_id, $current_date);

        $data['time_in_exists'] = $time_in_exists;
        $data['time_out_exists'] = $time_out_exists;
        $data['time_in'] = isset($attendance['time_in']) ? $attendance['time_in'] : '';
        $data['time_out'] = isset($attendance['time_out']) ? $attendance['time_out'] : '';

        $this->load->view('employee/employee_logs', $data);
    }

    public function time_in()
    {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user_id = $this->session->userdata('user_id');
            $username = $this->session->userdata('username');
            $employee_username  = $this->input->post("username");
            $current_time = new DateTime('now', new DateTimeZone('Asia/Manila'));
            $formatted_time = $current_time->format('Y-m-d H:i:s');
    
            $this->form_validation->set_rules("username", "Username", "trim|required");
    
            if ($this->form_validation->run() === TRUE) {
                $data = [
                    'user_id' => $user_id,
                    'time_in' => $formatted_time,
                    'date' => date('Y-m-d')
                ];
    
                if ($username !== $employee_username) {
                    $this->session->set_flashdata('error', 'Incorrect Username');
                    redirect('AttendanceController/index');
                } else {
                    $this->AttendanceModel->insertTimeIn($data);
                    $this->session->set_flashdata('success', 'Time-in recorded successfully!');
                    redirect('AttendanceController/index');
                }
            } else {
                $this->session->set_flashdata('error', 'Username must have value.');
                redirect('AttendanceController/index');
            }
        } else {
            redirect('AttendanceController/index');
        }
    }
    


    public function time_out()
    {
        $user_id = $this->session->userdata('user_id');
        $username = $this->session->userdata('username');
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $employee_username  = $this->input->post("username2");
            
            $current_time = new DateTime('now', new DateTimeZone('Asia/Manila'));
            $formatted_time = $current_time->format('Y-m-d H:i:s');
    
            $this->form_validation->set_rules("username2", "Username", "trim|required");
    
            if ($this->form_validation->run() === TRUE) {
    
                if ($username !== $employee_username) {
                    $this->session->set_flashdata('error', 'Incorrect Username');
                    redirect('AttendanceController/index');
                } else {
                    $this->AttendanceModel->insertTimeOut($user_id, $formatted_time );
                    $this->session->set_flashdata('success', 'Time-out recorded successfully!');
                    redirect('AttendanceController/index');
                }
            } else {
                $this->session->set_flashdata('error', 'Username must have value.');
                redirect('AttendanceController/index');
            }
        } else {
            redirect('AttendanceController/index');
        }
    }
}
