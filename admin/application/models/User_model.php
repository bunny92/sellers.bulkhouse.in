<?php

class User_model extends CI_Model {
    private $table = "admin";
    public function __construct() {
        parent::__construct();
    }
    /**
     * This method validates the login credentials
     * @return string
     */
    public function authenticate_user() {
        $username = $this->input->post("username");
        $pwd = $this->input->post("pwd");
        if(($result = $this->db->select(['id'])->where(['username' => $username, 'pwd' => $pwd])->get($this->table))) {
            $row = $result->row();
            return $row->id !== NULL ? "yes" : "no"; 
        } else {
            return "no";
        }
    }
    
    /**
     * This method validates the login credentials of document admin
     * @return string
     */
    public function authenticate_document() {
        $username = $this->input->post("username");
        $pwd = $this->input->post("pwd");
        if(($result = $this->db->select(['id'])->where(['username' => $username, 'pwd' => $pwd])->get("document_admin"))) {
            $row = $result->row();
            return $row->id !== NULL ? "yes" : "no"; 
        } else {
            return "no";
        }
    }
    
    
      /**
     * This method validates the login credentials of document admin
     * @return string
     */
    public function authenticate_bank() {
        $username = $this->input->post("username");
        $pwd = $this->input->post("pwd");
        if(($result = $this->db->select(['id'])->where(['username' => $username, 'pwd' => $pwd])->get('bank_admin'))) {
            $row = $result->row();
            return $row->id !== NULL ? "yes" : "no"; 
        } else {
            return "no";
        }
        
    }
    
    /**
     * This method validates agent credentails and redirect to agents login page
     * @return Object
     */
     public function authenticate_agent() {
         $username = $this->input->post("username");
        $pwd = $this->input->post("pwd");
        if(($result = $this->db->select(['agent_code'])->where(['login_id' => $username, 'pwd' => $pwd])->get('agents'))) {
            $row = $result->row();
            return $row;
        } else {
            return NULL;
        }
     }
    
    
    
}
