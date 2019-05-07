<?php

class Registration_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Method returns the users who clicked on the verification link and completed registration today to go to home page.
     * @return array if value exists else NULL
     */
    public function get_todays_registrations() {
        $sql = "select v.email, v.phone, v.market, b.company, f.name as firm_name, b.first_name, b.last_name, b.regdate, b.pincode, ag.assigned_date, ag.agent_code, a.name as agent_name from basic_profile b left join vendors v on b.vendor_id = v.id left join firm_types f on f.id = b.firm left join assigned_agents ag on b.vendor_id = ag.vendor_id left join agents a on a.agent_code = ag.agent_code where b.regdate = curdate() and b.agent_id = 'N/A' order by b.id asc";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    /**
     * Method returns the users who clicked on the verification link and completed registration to go to home page.
     * @return array if value exists else NULL
     */
    public function get_overall_registrations() {
        $sql = "select v.email, v.phone, v.market, b.company, f.name as firm_name, b.first_name, b.last_name, b.regdate, b.pincode, ag.assigned_date, ag.agent_code, a.name as agent_name from basic_profile b left join vendors v on b.vendor_id = v.id left join firm_types f on f.id = b.firm left join assigned_agents ag on b.vendor_id = ag.vendor_id left join agents a on a.agent_code = ag.agent_code where b.agent_id = 'N/A' order by b.id asc";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    /**
     * Method returns the email and passwords who clicked on the verification link and completed registration to go to home page.
     * @return array if value exists else NULL
     */
    public function get_data_list() {
        $sql = "select v.email, b.company, b.pwd from basic_profile b left join vendors v on b.vendor_id = v.id ";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

}
