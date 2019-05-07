<?php

class Documents extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("look_model");
        $this->load->model("docadmin_model");
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->security_access->validate_document_pages();
    }
    /**
     * Type : View 
     * This method is a url which displays the list of documents to be approved or rejected
     */
    public function index() {
        $this->load->view("documents/documents", ["private" => $this->docadmin_model->get_private_documents(), "prop" => $this->docadmin_model->get_proprietor_documents(), "partner" => $this->docadmin_model->get_partner_documents()]);
    }
    /**
     * Type : View
     * This method gives a quick look on overall credentials of all vendors who are registered
     */
    public function quicklook() {
        $this->load->view("documents/quicklook",["look" => $this->look_model->get_quick_all_look()]);
    }
    
     public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect("admin/document_admin");
    }
    
    
    public function get_document() {
     if(($url = $this->input->get("pic"))) {
       $this->load->model("docadmin_model");
       $this->docadmin_model->get_content_pdf($url);
     }
   }
    

}
