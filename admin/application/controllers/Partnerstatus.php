<?php

class Partnerstatus extends CI_Controller {
    private $table = "vendor_partner";
    
    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("docadmin_model");
    }
    
    public function photo() {
        $this->load->view("documents/validate_proofs", ['url' => 'photo','type' => 'photo_status', 'vendors' => $this->docadmin_model->get_photo($this->table)]);
    }
    
    public function vat() {
        $this->load->view("documents/validate_proofs", ['url' => 'vat','type' => 'vat_status','vendors' => $this->docadmin_model->get_vat($this->table)]);
    }
    
    public function pan() {
        $this->load->view("documents/validate_proofs", ['url' => 'pan','type' => 'pan_status','vendors' => $this->docadmin_model->get_pan_partner()]);
    }
    
    public function cenvat() {
        $this->load->view("documents/validate_proofs", ['url' => 'cenvat','type' => 'cenvat_status','vendors' => $this->docadmin_model->get_cenvat($this->table)]);
    }
    
    public function deed() {
        $this->load->view("documents/validate_proofs", ['url' => 'deed','type' => 'deed_status','vendors' => $this->docadmin_model->get_deed($this->table)]);
    }
    
    public function cancel() {
        $this->load->view("documents/validate_proofs", ['url' => 'cancel','type' => 'cancel_status','vendors' => $this->docadmin_model->get_cancel($this->table), 'pending_vendors'=>$this->docadmin_model->get_cancel_data($this->table)]);
    }
    
    public function change_status() {
        if(($id = $this->input->get("vendor_id"))) {
            $status = $this->input->get("status");
            $type = $this->input->get("type");
            $data = [
                "".$type => "".$status
            ];
            $response = $this->docadmin_model->update_status($this->table, $data, $id);
            $this->session->set_flashdata("message", $response === "yes" ? "Executed Successfully..!" : "Sorry execution failed. Please try again..!");
            redirect("partnerstatus/".$this->input->get("url"));
        } else {
            redirect("documents/");
        }
    }
    
    

}