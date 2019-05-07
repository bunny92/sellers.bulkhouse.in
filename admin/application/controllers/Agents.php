<?php

class Agents extends CI_Controller {

    private $url = "agents/";

    public function __construct() {
        parent::__construct();
        $this->load->model("agent_model");
        $this->load->model("assigned_model");
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->security_access->validate_admin_pages();
        
    }

    /**
     * Type : View
     * This page registers and displays agent details
     */
    public function index() {
        $this->load->view($this->url . "header");
        $this->load->view($this->url . "home", ["agent_cred" => $this->agent_model->get_agents()]);
        $this->load->view($this->url . "footer");
    }
    
    /**
     * Type : Business Logic
     * This method registers agent having default password as bulk@lwyz123
     */
    public function register_agent() {
        if (($this->input->post("agent_code"))) {
            $response = $this->agent_model->register_agent();
            if($response === "yes") {
                $this->session->set_flashdata("success_message", "Registered Successfully..!");
            } else {
                $this->session->set_flashdata("failure_message", "Not Registered Please try again..!");
            }
            redirect("agents");
        } else {
            redirect("agents");
        }
    }
    
    /**
     * Type : View
     * This method is url to assign agents to the vendors
     */
    public function assign_agents() {
        $this->load->view($this->url."header");
        $this->load->view($this->url."assigned_agents", ["new_registrations" => $this->assigned_model->get_new_registrations(), "agent_cred" => $this->assigned_model->get_agents()]);
        $this->load->view($this->url."footer");
    }
    
    /**
     * Type : View
     * This method is url to modify the agents' allocations to the vendors
     */
    public function modify_assigns() {
        $this->load->view($this->url."header");
        $this->load->view($this->url."modify_assign", ["allocated_vendors" => $this->assigned_model->get_assigned_agents_to_vendors(), "agent_cred" => $this->assigned_model->get_agents()]);
        $this->load->view($this->url."footer");
        
    }
    
    /**
     * Type : View
     * This method is url to delete the allocation 
     */
    public function delete_assigns() {
        $this->load->view($this->url."header");
        $this->load->view($this->url."delete_assign", ["allocated_vendors" => $this->assigned_model->get_assigned_agents_to_vendors()]);
        $this->load->view($this->url."footer");
        
    }
    
    /**
     * Type : Business Logic
     * This method deletes agent based on ID [Auto-Increment]
     */
    public function delete_agent() {
        if(($this->input->get("id"))) {
            $response = $this->agent_model->delete_agent_credentials();
            if($response === "yes") {
                $this->session->set_flashdata("success_message", "Deleted Successfully..!");
            } else {
                $this->session->set_flashdata("failure_message", "Agent Credentials Not deleted.. Please try again..!");
            }
            redirect("agents");
        } else {
            redirect("agents");
        }
    }
    
    /**
     * Type : Business Logic
     * This method allocates agent to the vendor
     */
    public function allocate_agent_to_vendor() {
        if(($email = $this->input->post("vendor_email"))) {
            $response = $this->assigned_model->assign_vendor_to_agent();
            if($response === "yes") {
                $this->session->set_flashdata("success_message", $email." Assigned Successfully..!");
            } else {
                $this->session->set_flashdata("failure_message", "Failed to allocate.. Please try again..!");
            }
            redirect("agents/assign_agents");
        } else {
            redirect("agents/assign_agents");
        }
    }
    
    /**
     * Type : Business Logic
     * This method re-allocates agents to the vendors
     */
    public function re_allocate_agent_to_vendor() {
        if(($email = $this->input->post("vendor_email"))) {
            $response = $this->assigned_model->modify_assigned_vendor_to_agent();
            if($response === "yes") {
                $this->session->set_flashdata("success_message", $email." Re-Assigned Successfully..!");
            } else {
                $this->session->set_flashdata("failure_message", "Failed to Re-Assign.. Please try again..!");
            }
            redirect("agents/modify_assigns");
        } else {
            redirect("agents/modify_assigns");
        }
    }
    /**
     * Type : Business Logic
     * This method deletes the allocation 
     */
    public function delete_allocation() {
        if(($vendor_id = $this->input->get("vendor_id"))) {
            $response = $this->assigned_model->delete_allocation();
            if($response === "yes") {
                $this->session->set_flashdata("success_message", "Deleted Successfully..!");
            } else {
                $this->session->set_flashdata("failure_message", "Not Deleted.. Please try again..!");
            }
            redirect("agents/modify_assigns");
        } else {
            redirect("agents/delete_assigns");
        }
    }
    
    

}
