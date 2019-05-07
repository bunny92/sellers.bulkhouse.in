<?php

class Assigned_model extends CI_Model {
    private $table = "assigned_agents";
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * This method returns the list of vendors who are registered but not allocated to any agent
     * @return Array [List of all vendors registered ]
     */
    public function get_new_registrations() {
        $sql = "select v.id, v.email, v.phone, v.market, b.company, f.name as firm_name, b.first_name, b.last_name, b.regdate, b.pincode from basic_profile b left join vendors v on b.vendor_id = v.id left join firm_types f on f.id = b.firm where b.agent_id = 'N/A' and b.vendor_id not in (select vendor_id from assigned_agents) order by b.id asc";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    /**
     * This method returns the available list of agents registered
     * @return Array [List of agents]
     */
    public function get_agents() {
        if(($result = $this->db->select(['agent_code', 'name'])->get('agents'))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    /**
     * This method assigns vendor to agent
     * @return string
     */
    public function assign_vendor_to_agent() {
        $data = [
            'vendor_id' => $this->input->post("vendor_id"),
            'agent_code' => $this->input->post("agent_code"),
            'assigned_date' => date("Y-m-d H:i:s").""
        ];
        if(($result = $this->db->insert($this->table, $data))) {
            return $this->db->insert_id() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }
    /**
     * This method returns the list of vendors who are assigned to agents
     * @return Array [List of vendors allocated to agents]
     */
    public function get_assigned_agents_to_vendors() {
        $sql = "select v.id,v.id, v.email, v.phone, v.market, b.company, f.name as firm_name, b.first_name, b.last_name, b.regdate, b.pincode, ag.assigned_date, ag.agent_code, a.name as agent_name from basic_profile b left join vendors v on b.vendor_id = v.id left join firm_types f on f.id = b.firm left join assigned_agents ag on b.vendor_id = ag.vendor_id  left join agents a on a.agent_code = ag.agent_code where b.agent_id = 'N/A' and ag.vendor_id is NOT NULL order by b.id asc";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    /**
     * This method re assigns new or existing agent to the vendor.
     * @return string
     */
    public function modify_assigned_vendor_to_agent() {
        $data = [
            'agent_code' => $this->input->post("agent_code"),
            'assigned_date' => date("Y-m-d H:i:s").""
        ];
        if(($result = $this->db->where(['vendor_id' => $this->input->post("vendor_id")])->update($this->table, $data))) {
            return $this->db->affected_rows() >= 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }
    
    /**
     * This method deletes the agent allocation.
     * @return string
     */
    public function delete_allocation() {
        if(($result = $this->db->where(['vendor_id' => $this->input->get("vendor_id")])->delete($this->table))){
            return $this->db->affected_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }
}
