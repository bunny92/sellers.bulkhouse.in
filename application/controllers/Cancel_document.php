<?php

class Cancel_document extends CI_Controller {

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
        $this->load->view($this->url . "upload_cancel", $data);
    }

    public function upload_document() {
        if ($this->input->post("doc_type")) {
            $image_url = $this->document_model->upload_pic_to_bucket($this->input->post("doc_type"));
            if ($image_url === "no") {
                $this->session->set_flashdata("message", "Cannot Upload.. Please try again..!");
                redirect("cancel_document");
            } else {
                $data = [
                    'cancel_cheque' => $image_url,
                    'cancel_status' => 'Verification In Process',
                    'cancel_date' => date('Y-m-d')
                ];
                $response = $this->document_model->update_data($data);
                if ($response === "yes") {
                    //--- CRM API BEGIN
                 $email = $this->session->userdata('email');
                 $this->load->model('vendor_crm');
                 $vendor_crm_id = $this->vendor_crm->update_cancel($this->vendor_crm->get_crm_id($email));
                 //--- CRM API END
                    $this->session->set_flashdata("cancel_message", "Uploaded Successfully..!");
                    redirect("documents");
                } else {
                    $this->session->set_flashdata("message", "Cannot Upload.. Please try again..!");
                    redirect("cancel_document");
                }
            }
        } else {
            redirect("cancel_document");
        }
    }

}
