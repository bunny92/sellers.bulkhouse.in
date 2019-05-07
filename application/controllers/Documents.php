<?php

class Documents extends CI_Controller {

    private $url = 'vendor/';

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("document_model");
        $this->load->model("businessprofile_model");
    }

    public function index() {
        $business_exists = $this->businessprofile_model->is_vendor_exists();
        if ($business_exists === "no") {
            $this->load->view($this->url . "pending_business");
        } else if($business_exists == "yes") {
        $vendor_exists = $this->document_model->is_vendor_exists();
        if ($vendor_exists === "no") {
            $response = $this->document_model->insert_data();
            $this->session->set_flashdata("message", $response);
        }
        $data = ['profile' => $this->document_model->get_data()];
        $this->load->view($this->url . "" . $this->document_model->get_view(), $data);
        }
    }

   
    
    

}
