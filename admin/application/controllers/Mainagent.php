<?php

class Mainagent extends CI_Controller {

    private $url = "mainagent/";

    public function __construct() {
        parent::__construct();
       $this->load->model("look_model");
       $this->security_access->set_authorization_security();
        $this->security_access->validate_agent_pages();
    }

    public function index() {

        $this->load->view($this->url . "quicklook", ["look" => $this->look_model->get_quick_look()]);
    }

    public function your_vendors() {
        $this->load->view($this->url . "your_vendors", ["look" => $this->look_model->get_agent_vendors($this->session->userdata("agent_code"))]);
    }

    public function rejected_vendors() {
        $this->load->model("rejected_model");
        $this->load->view($this->url . "rejected_vendors", ["vendors" => $this->rejected_model->get_rejected_vendors_list($this->session->userdata("agent_code"))]);
    }

    public function reject_vendor() {
        $this->load->model("rejected_model");
        $response = $this->rejected_model->insert_rejected_vendor();
        if ($response === "no") {
            $this->session->set_flashdata('message', "Please try again..! cannot reject this vendor");
            redirect("mainagent/your_vendors");
        } else if ($response === "yes") {
            $this->session->set_flashdata('message', "Successfully Rejected..!");
            redirect("mainagent/rejected_vendors");
        }
    }

    public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect("admin/agent_login");
    }

}
