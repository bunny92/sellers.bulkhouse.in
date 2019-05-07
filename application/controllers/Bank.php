<?php

class Bank extends CI_Controller {

    private $url = "vendor/";

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("bank_model");
        $this->load->model("businessprofile_model");
    }

    public function index() {
        $business_exists = $this->businessprofile_model->is_vendor_exists();
        if ($business_exists === "no") {
            $this->load->view($this->url . "pending_business");
        } else if($business_exists == "yes") {
        $exists = $this->bank_model->is_vendor_exists();
        if ($exists === "yes") {
            $data = [ 'bank_profile' => $this->bank_model->get_bank_credentials()];
            $this->load->view($this->url . "bank_view", $data);
        } else {
            $this->load->view($this->url . "bank_create");
        }
        }
    }

    public function create_bank_credentials() {
        if ($this->input->post("account_name")) {
            $response = $this->bank_model->register_bank_credentails();
            if ($response === "yes") {
                $this->session->set_flashdata("message", "Bank Credentials added successfully..!");
                redirect("bank");
            } else if ($response === "no") {
                $this->session->set_flashdata("no_message", "Bank Credentials are not added");
                redirect("bank");
            }
        } else {
            redirect("bank");
        }
    }

    public function edit_bank_credentials() {
        $data = [ 'bank_profile' => $this->bank_model->get_bank_credentials()];
        $this->load->view($this->url . "bank_update", $data);
    }

    public function update_bank_credentials() {
        if ($this->input->post("account_name")) {
            $message = $this->bank_model->update_bank_credentails() === "yes" ? "Bank Credentials updated successfully..!" : "Sorry not updated.. Please try again..!";
            $this->session->set_flashdata("message", $message);
            redirect("bank");
        } else {
            redirect("bank");
        }
    }

    public function check_details() {
        if (($value = $this->input->post("amount"))) {
            $amount = $this->bank_model->get_amount();
            if ($amount == $value) {
                $response = $this->bank_model->approve_bank_account();
                if ($response === "deny") {
                    $this->session->set_flashdata("message", "Approval Failed.. Please try again..!");
                } 
            } else {
                $this->bank_model->update_bank_count();
                $this->session->set_flashdata("message", "Please enter amount deposited to your bank");
            }

            redirect("bank");
        } else {
            redirect("bank");
        }
    }

}
