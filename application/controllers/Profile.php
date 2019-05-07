<?php

class Profile extends CI_Controller {

    private $url = "vendor/";

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("basicprofile_model");
        $this->load->model("register_model");
    }

    public function index() {
        $data = ['profile' => $this->basicprofile_model->get_basic_profile_info(), 'primary' => $this->register_model->get_vendor_details()];
        $this->load->view($this->url . "profile", $data);
    }

    public function update_profile_view() {
        $data = ['profile' => $this->basicprofile_model->get_basic_profile_info()];
        $this->load->view($this->url . "update_profile", $data);
    }
    
    public function update_primary_view() {
        $data = ['profile' => $this->register_model->get_vendor_details()];
        $this->load->view($this->url . "update_primary", $data);
    }

    public function update_profile() {
        if ($this->input->post("company")) {
            $response = $this->basicprofile_model->update_profile();
            $this->session->set_flashdata("message", $response);
            redirect("profile");
        } else {
            redirect("profile");
        }
    }
    
    public function update_primary() {
        if($this->input->post("phone")) {
            $response = $this->register_model->update_details();
            $this->session->set_flashdata("primary_resp", $response);
            redirect("profile");
        } else {
            redirect("profile");
        }
    }

}
