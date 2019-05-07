<?php

class Completelook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("look_model");
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->security_access->validate_admin_pages();
    }

    /**
     * Type : View
     * This method is the url for every credentials given by the vendors
     */
    public function index() {
        $this->load->view("quicklook/mylook");
    }

    public function search() {
        if (($fromDate = $this->input->post("from_date"))) {
            if (($toDate = $this->input->post("to_date"))) {
                $this->load->view("quicklook/mylook", ["look" => $this->look_model->get_complete_look_date($fromDate, $toDate)]);
            } else {
                $this->session->set_flashdata("message", "Please select To Date");
            }
        } else {
            $this->session->set_flashdata("message", "Please select From Date");
            redirect("completelook");
        }
    }

}
