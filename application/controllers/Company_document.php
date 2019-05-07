<?php

class Company_document extends CI_Controller {

    private $url = 'vendor/';

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("document_model");
        date_default_timezone_set("Asia/Calcutta");
    }

    public function index() {
        $data = ['profile' => $this->document_model->get_data()];
        $this->load->view($this->url . "upload_company", $data);
    }

    public function upload_document() {
        if ($this->input->post("input_photo_id")) {
            $image_url = $this->document_model->upload_pic_to_bucket($this->input->post("doc_type"));
            if ($image_url === "no") {
                $this->session->set_flashdata("message", "Cannot Upload.. Please try again..!");
                redirect("company_document");
            } else {
                $data = [
                    'input_company_pan' => $this->input->post("input_photo_id"),
                    'company_pan' => $image_url,
                    'pan_status' => 'Verification In Process',
                    'pan_date' => date('Y-m-d')
                ];
                $response = $this->document_model->update_data($data);
                if ($response === "yes") {
                    //--- CRM API BEGIN
                 $email = $this->session->userdata('email');
                 $this->load->model('vendor_crm');
                 $vendor_crm_id = $this->vendor_crm->update_company_pan($this->vendor_crm->get_crm_id($email),$data['input_company_pan']);
                 //--- CRM API END
                    $this->session->set_flashdata("company_message", "Uploaded Successfully..!");
                    redirect("documents");
                } else {
                    $this->session->set_flashdata("message", "Cannot Upload.. Please try again..!");
                    redirect("company_document");
                }
            }
        } else {
            redirect("company_document");
        }
    }

}
