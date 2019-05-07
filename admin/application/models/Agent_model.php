<?php

class Agent_model extends CI_Model {

    private $table = "agents";

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }

    /**
     * This method registers agents having default password as bulk@lwyz123
     * @return string
     */
    public function register_agent() {
        $agent_code = $this->input->post("agent_code");
        $name = $this->input->post("name");
        $login_id = $this->input->post("login_id");
        $pwd = "bulk@lwyz123";
        $reg_date = "" . date("Y-m-d G:i:s");
        if (($result = $this->db->insert($this->table, [
            'agent_code' => $agent_code,
            'name' => $name,
            'login_id' => $login_id,
            'pwd' => $pwd,
            'regdate' => $reg_date
                ]))) {
            return $this->db->insert_id() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    /**
     * This method returns the list of agents who are registered.
     * @return Array [List of Agents]
     */
    public function get_agents() {
        if (($result = $this->db->get($this->table))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    /**
     * This method delets the agent credentials from the database.
     * @return string
     */
    public function delete_agent_credentials() {
        $id = $this->input->get("id");
        if(($result = $this->db->where(['id' => $id ])->delete($this->table))) {
            return $this->db->affected_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

}
