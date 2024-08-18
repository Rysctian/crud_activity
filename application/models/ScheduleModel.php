<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScheduleModel extends CI_Model
{

    public function getAllSchedules()
    {

        $query = $this->db->from('schedules')->get();
        return $query->result_array(); 
    }

    public function getScheduleById($schedule_id)
    {
        return $this->db->where('id', $schedule_id)->get('schedules')->row_array();
    }

    public function insertSchedule($data)
    {
        $this->db->insert('schedules', $data);
    }


    public function updateSchedule($data, $schedule_id)
    {
        $this->db->where('id', $schedule_id);
        $this->db->update('schedules', $data);
    }

    public function deleteSchedule($schedule_id)
    {
        $this->db->where('id', $schedule_id);
        $this->db->delete('schedules');
    }
}
