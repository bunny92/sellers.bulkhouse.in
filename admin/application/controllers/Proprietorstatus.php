<?php

class Proprietorstatus extends CI_Controller {
    private $table = "vendor_proprietorship";
    
    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("docadmin_model");
    }
    
    public function photo() {
        $this->load->view("documents/validate_proof", ['url' => 'photo','type' => 'photo_status', 'vendors' => $this->docadmin_model->get_photo($this->table)]);
    }
    
    public function vat() {
        $this->load->view("documents/validate_proof", ['url' => 'vat','type' => 'vat_status','vendors' => $this->docadmin_model->get_vat($this->table)]);
    }
    
    public function pan() {
        $this->load->view("documents/validate_proof", ['url' => 'pan','type' => 'pan_status','vendors' => $this->docadmin_model->get_pan($this->table)]);
    }
    
    public function cenvat() {
        $this->load->view("documents/validate_proof", ['url' => 'cenvat','type' => 'cenvat_status','vendors' => $this->docadmin_model->get_cenvat($this->table)]);
    }
    
    public function cancel() {
        $this->load->view("documents/validate_proof", ['url' => 'cancel','type' => 'cancel_status','vendors' => $this->docadmin_model->get_cancel($this->table), 'pending_vendors'=>$this->docadmin_model->get_cancel_data($this->table)]);
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
            redirect("proprietorstatus/".$this->input->get("url"));
        } else {
            redirect("documents/");
        }
    }
    
    

}
