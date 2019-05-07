<?php

class Dashboard extends CI_Controller {

    private $url = "vendor/";

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("basicprofile_model");
        $this->load->model("notification_model");
    }

    public function index() {
        $this->load->model("businessprofile_model");
        $this->load->model("businessinfo_model");
        $this->load->model("bank_model");
        $this->load->model("document_model");
        $percenage = 20;
        $data = array();
        if($this->businessprofile_model->is_vendor_exists() === "yes") {
            $percenage += 20;
            $data['business'] = 'yes';
        }
        if($this->businessinfo_model->is_vendor_exists() === "yes") {
            $percenage += 20;
            $data['info'] = 'yes';
        }
        if($this->bank_model->is_vendor_exists() === "yes") {
            $percenage += 20;
            $data['bank'] = 'yes';
        }
        if($this->document_model->is_vendor_exists() === "yes") {
            if($this->document_model->get_document_status() === "yes") {
              $percenage += 20;
              $data['document'] = 'yes';
            }
        }
        
        $data['bank_deposit'] = $this->bank_model->is_status_deposit();
        $data['notifications'] = $this->notification_model->view_notifications();
        $bank_verification = $this->bank_model->get_verification_status();
        $data['bank_verification'] = $bank_verification;
        $document_verification = $this->document_model->get_verification_status();
        $data['document_verification'] = $document_verification;
        if($data['document_verification'] == 'reject') {
        	$percenage = $percenage - 20;
        }
        
                if($data['bank_verification'] == 'reject') {
        	$percenage = $percenage - 20;
        }
        $data['percentage'] = $percenage;
        $data['verification'] = ($bank_verification === "yes" && $document_verification === "yes") ? "Successfully Verified" : "Under Verification";

        $this->load->view($this->url . "home", $data);
    }



    public function update_password() {
        if ($this->input->post("new_password") != NULL) {
            $response = $this->basicprofile_model->update_password();
            $this->load->view($this->url."change_password", ['response' => $response]);
        } else {
            redirect("dashboard/change_password");
        }
    }

    public function change_password() {
        $this->load->view($this->url . "change_password");
    }

    public function logout() {
        $this->security_access->logout();
    }

    public function get_document() {
      if(($url = $this->input->get("pic"))) {
        $this->load->model("document_model");
        $this->document_model->get_content_pdf($url);
      }
    }



}