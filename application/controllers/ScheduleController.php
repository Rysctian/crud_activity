<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScheduleController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ScheduleModel');
        $this->load->model('UserModel');

        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('error', 'You are not authorized to access this page.');
            redirect('home');
        }
    }

    
    public function index()
    {
        $data['schedules'] = $this->ScheduleModel->getAllSchedules();
        $this->load->view('schedule/schedule_view.php', $data);
    }

    public function store()
    {
        $name = $this->input->post('name');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
    
        if ($start_time && $end_time) {
            $schedule_data = [
                'name' => !empty($name) ? $name : NULL,
                'start_time' => $start_time,
                'end_time' => $end_time
            ];
    
           $this->ScheduleModel->insertSchedule($schedule_data);
           $this->session->set_flashdata('success', 'Schedule Created successfully');
            
        } else {
            $this->session->set_flashdata('error', 'Failed to create schedule. Start time or end time is missing.');
        }
    
        redirect('schedule');
    }
    

    public function assign($user_id)
    {
        $data['user'] = $this->UserModel->getUserById($user_id);
        $data['schedules'] = $this->ScheduleModel->getAllSchedules();
        $this->load->view('admin/assign_schedule', $data);
    }

    public function update_schedule()
    {
        $schedule_id = $this->input->post('schedule_id');
        $name = $this->input->post('name');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
    
        if ($schedule_id && $name && $start_time && $end_time) {

            $this->ScheduleModel->updateSchedule([
                'name' => $name,
                'start_time' => $start_time,
                'end_time' => $end_time
            ], $schedule_id);
            $this->session->set_flashdata('success', 'Schedule updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update schedule. Some data is missing.');
        }
    
        redirect('schedule');
    }
    
    public function delete_schedule($schedule_id)
    {
        if ($schedule_id) {
            $this->ScheduleModel->deleteSchedule($schedule_id);
            $this->session->set_flashdata('success', 'Schedule deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Schedule ID is missing.');
        }

        redirect('schedule');
    }
}
