<?php

class Notification_model extends CI_Model{

    private $table = "vendor_notifications";
    
    public function generate_notification() {
        
    }
    
    public function view_notifications() {
        if(($result = $this->db->where(['vendor_id' => $this->session->userdata("id")])->get($this->table))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
}
