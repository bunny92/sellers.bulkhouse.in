<?php

class Leads_model extends CI_Model {
    
    private $table = "vendors";
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Method returns the leads registered today.. Basic Registered Vendors
     * @return string
     */
    public function get_todays_leads() {
        if(($result = $this->db->query("select * from ".$this->table." where DATE(regdate) = CURDATE() and id not in (select vendor_id from basic_profile) order by id asc"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    /**
     * Method returns overall leads registered till date
     * @return String
     */
    public function get_overall_leads() {
        if(($result = $this->db->query("select * from ".$this->table." where  id not in (select vendor_id from basic_profile) order by id asc"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
   
    
}
