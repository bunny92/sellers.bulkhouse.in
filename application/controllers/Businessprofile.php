<?php

class Businessprofile extends CI_Controller {

    private $url = "vendor/";

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("businessprofile_model");
    }

    public function index() {
        $response = $this->businessprofile_model->is_vendor_exists();
        if ($response === "no") {
            $this->load->view($this->url . "business_profile");
        } else if ($response === "yes") {
            $data = ['profile' => $this->businessprofile_model->view_vendor()];
            $this->load->view($this->url . "update_business_profile", $data);
        }
    }
    
    public function ganesh() {
        $this->load->view("vendor/pending_business");
    }

    public function update_business_profile() {
        $data = ['profile' => $this->businessprofile_model->view_vendor()];
        $this->load->view($this->url . "update_business", $data);
    }
    
    public function edit_business_profile() {
        if($this->input->post("registration_category")) {
            $response = $this->businessprofile_model->update_business_profile();
            if($response === "yes") {
                $this->session->set_flashdata("message", "Business Profile Updated Successfully..!");
                redirect("businessprofile");
            } else if($response === "no") {
                $this->session->set_flashdata("message", "Sorry.. Not Updated.. Please try again..!");
                redirect("businessprofile/update_business_profile");
            }
        } else {
            redirect("businessprofile");
        }
    }

    public function save_business_profile() {
        if ($this->input->post("registration_category")) {
            $response = $this->businessprofile_model->register_business_profile();
            if ($response === "yes") {
                $this->session->set_flashdata("message", "Registration Successful..");
            } else if ($response === "no") {
                $this->session->set_flashdata("message", "Registration Unsuccessful..Please try again");
            }
            redirect("businessprofile");
        } else {
            redirect("businessprofile");
        }
    }

}
