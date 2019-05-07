<?php
class Quicklook extends CI_Controller {
 
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
        $this->load->view("quicklook/quicklook", ["look" => $this->look_model->get_quick_look()]);
    }
    
    
}