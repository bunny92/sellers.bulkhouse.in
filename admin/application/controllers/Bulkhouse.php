<?php

class Bulkhouse extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->load->model("look_model");
    }
    
    
    public function index() {
        $this->load->view("ganesh", ["look" => $this->look_model->get_complete_look()]);
    }
    
}
