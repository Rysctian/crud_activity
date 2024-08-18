<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttendanceModel extends CI_Model {

    public function insertTimeIn($data) {
        $this->db->insert('attendance', $data);
    }


    public function insertTimeOut($user_id, $time_out) {
        $this->db->where('user_id', $user_id);
        $this->db->where('date', date('Y-m-d'));
        $this->db->update('attendance', ['time_out' => $time_out]);
    }

    public function checkTimeIn($user_id, $date) {
        $this->db->where('user_id', $user_id);
        $this->db->where('date', $date);
        $this->db->where('time_in IS NOT NULL', NULL, FALSE);
        $query = $this->db->get('attendance');
        return $query->num_rows() > 0;
    }

    public function checkTimeOut($user_id, $date) {
        $this->db->where('user_id', $user_id);
        $this->db->where('date', $date);
        $this->db->where('time_out IS NOT NULL', NULL, FALSE);
        $query = $this->db->get('attendance');
        return $query->num_rows() > 0;
    }

    public function getAttendanceForDate($user_id, $date) {
        $this->db->where('user_id', $user_id);
        $this->db->where('date', $date);
        $query = $this->db->get('attendance');
        return $query->row_array();
    }



}
