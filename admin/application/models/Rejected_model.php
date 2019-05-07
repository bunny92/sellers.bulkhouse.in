<?php

class Rejected_model extends CI_Model {
    
    private $table = "rejected_vendors";
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * This method returns the list of all rejected vendors.
     * @return Array
     */
    public function get_vendor_details() {
        $sql = "select r.id, r.reason, r.rejected_date, a.agent_code, a.name, v.email, v.phone, b.company, b.first_name, b.last_name from rejected_vendors r, agents a, vendors v, basic_profile b where r.vendor_id = v.id and r.vendor_id = b.vendor_id and a.agent_code = r.agent_code";
        if(($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    
    /**
     * This method inserts the rejected vendors list
     * @return string
     */
    public function insert_rejected_vendor() {
        $data = [
            'vendor_id' => $this->input->post('vendor_id'),
            'agent_code' => $this->session->userdata("agent_code"),
            'reason' => $this->input->post("reason"),
            'rejected_date' => "".date("Y-m-d H:i:s")
            ];
        
        if(($result = $this->db->insert('rejected_vendors', $data))) {
            return $this->db->insert_id() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }
    
    /**
     * This method returns the list of all rejected vendors by a specified agent.
     * @return Array
     */
    public function get_rejected_vendors_list($agent_code) {
        $sql = "select r.id, r.reason, r.rejected_date, a.agent_code, a.name, v.email, v.phone, b.company, b.first_name, b.last_name from rejected_vendors r, agents a, vendors v, basic_profile b where r.vendor_id = v.id and r.vendor_id = b.vendor_id and a.agent_code = r.agent_code and r.agent_code = '".$agent_code."'";
        if(($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
}
