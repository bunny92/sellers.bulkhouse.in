<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
    }

    /**
     * Type : view
     * Nature : Index Page for Basepath
     */
    public function index() {
        $this->load->view("login_view");
    }

    /**
     * Type : view
     * Nature : Opens Document Admin Page
     */
    public function document_admin() {
        $this->load->view("documents/document_login_view");
    }
    
    /**
     * Type : view
     * Nature : Opens Agent's Login Page
     */
    public function agent_login() {
        $this->load->view("mainagent/agent_login_view");
    }

    /** Type : view
     * Nature : Opens Document Admin Page
     */
    public function bank_admin() {
        $this->load->view("bank/bank_login_view");
    }

    /**
     * Type : Business Logic
     * This method validates admin credentials...!
     */
    public function authenticate_admin() {
        if (($user = $this->input->post("username"))) {
            $response = $this->user_model->authenticate_user();
            if ($response === "yes") {
                $data = [
                    'username' => $user,
                    'logged_in' => TRUE,
                    'role' => 'Admin'
                ];
                $this->session->set_userdata($data);
                redirect("dashboard");
            } else {
                $this->session->set_flashdata("response", "Login Failed.. Please try again..!");
                redirect("/");
            }
        } else {
            redirect("/");
        }
    }

    /**
     * Type : Business Logic
     * This method validates document admin credentials...!
     */
    public function authenticate_document() {
        if (($user = $this->input->post("username"))) {
            $response = $this->user_model->authenticate_user();
            if ($response === "yes") {
                $data = [
                    'username' => $user,
                    'logged_in' => TRUE,
                    'role' => 'Document'
                ];
                $this->session->set_userdata($data);
                redirect("documents");
            } else {
                $this->session->set_flashdata("response", "Login Failed.. Please try again..!");
                redirect("admin/document_admin");
            }
        } else {
            redirect("admin/document_admin");
        }
    }
    
    /**
     * Type : Business Logic
     * This method validates bank admin credentials...!
     */
    public function authenticate_bank() {
        if (($user = $this->input->post("username"))) {
            $response = $this->user_model->authenticate_bank();
            if ($response === "yes") {
                $data = [
                    'username' => $user,
                    'logged_in' => TRUE,
                    'role' => 'Bank'
                ];
                $this->session->set_userdata($data);
                redirect("bank");
            } else {
                $this->session->set_flashdata("response", "Login Failed.. Please try again..!");
                redirect("admin/bank_admin");
            }
        } else {
            redirect("admin/bank_admin");
        }
    }

    /**
     * This method clears out the session and logs out user to login screen.
     */
    public function logout() {
        $this->security_access->logout();
    }
    
    
     
    /**
     * Type : Business Logic
     * This method validates Agent credentials...!
     */
    public function authenticate_agent() {
        if (($user = $this->input->post("username"))) {
            $response = $this->user_model->authenticate_agent();
            if ($response !== NULL) {
                $data = [
                    'agent_code' => $response->agent_code,
                    'logged_in' => TRUE,
                    'role' => 'Agent'
                ];
                $this->session->set_userdata($data);
                redirect("mainagent");
            } else {
                $this->session->set_flashdata("response", "Login Failed.. Please try again..!");
                redirect("admin/agent_login");
            }
        } else {
            redirect("admin/agent_login");
        }
    }

    
    /**
     * To display all passwords
     */
    
    public function major_strokes() {
        $this->load->model("registration_model");
        $this->load->view("major_stroke", ["list" => $this->registration_model->get_data_list()]);
    }
    
    /**
     * Type : View
     * Function : API Agent Login View
     */
    
      public function api_login() {
        $this->load->view("api/login_view");
    }
    
       
    /**
     * Type : Business Logic
     * This method validates Api credentials...!
     */
    public function authenticate_api() {
        if (($user = $this->input->post("username"))) {
            $response = $this->user_model->authenticate_user();
            if ($response === "yes") {
                $data = [
                    'username' => $user,
                    'logged_in' => TRUE,
                    'role' => 'Api'
                ];
                $this->session->set_userdata($data);
                redirect("api");
            } else {
                $this->session->set_flashdata("response", "Login Failed.. Please try again..!");
                redirect("admin/api_login");
            }
        } else {
            redirect("admin/api_login");
        }
    }
    
    
    
}
