<?php

class Bank extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->security_access->validate_bank_pages();
        $this->load->model("bankadmin_model");
    }

    public function index() {
        $data = [
            'private' => $this->bankadmin_model->get_private_bank_list(),
            'prop' => $this->bankadmin_model->get_proprietorship_bank_list(),
            'partner' => $this->bankadmin_model->get_partner_bank_list()
        ];
        $this->load->view("bank/bank_export", $data);
    }

    public function deposit() {
        $this->load->model("bankadmin_model");
        $data = [
            'private' => $this->bankadmin_model->get_private_bank_list(),
            'prop' => $this->bankadmin_model->get_proprietorship_bank_list(),
            'partner' => $this->bankadmin_model->get_partner_bank_list()
        ];
        $this->load->view("bank/bank_deposit", $data);
    }

    public function deposit_amount() {
        if (( $id = $this->input->get("vendor_id"))) {
            $response = $this->bankadmin_model->update_bank_credentials('Deposit', $id);
            $this->session->set_flashdata("message", $response === "yes" ? "Deposited Successfully..!" : "Not Deposited.. Please try again..!");
            redirect("bank/deposit");
        } else {
            redirect("bank/deposit");
        }
    }

    public function reject_amount() {
        if (( $id = $this->input->get("vendor_id"))) {
            $response = $this->bankadmin_model->update_bank_credentials('Rejected', $id);
            $this->session->set_flashdata("message", $response === "yes" ? "Rejected Successfully..!" : "Not Rejected.. Please try again..!");
            redirect("bank/deposit");
        } else {
            redirect("bank/deposit");
        }
    }
    
    public function get_deposit() {
        $this->load->view("bank/bank_get_deposit", ["list" => $this->bankadmin_model->get_bank_data('Deposit')]);
    }
    public function get_approved() {
        $this->load->view("bank/bank_get_approved", ["list" => $this->bankadmin_model->get_bank_data('Approved')]);
    }
    
    public function get_rejected() {
        $this->load->view("bank/bank_get_reject", ["list" => $this->bankadmin_model->get_bank_data('Rejected')]);
    }
    public function get_pending() {
        $this->load->view("bank/bank_get_pending", ["list" => $this->bankadmin_model->get_bank_data('Verification In Process')]);
    }
    
    
    
    public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect("admin/bank_admin");
    }


}
