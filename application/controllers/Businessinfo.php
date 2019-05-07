<?php

class Businessinfo extends CI_Controller {
    private $url = "vendor/";

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("businessinfo_model");
        $this->load->model("businessprofile_model");
    }
     
    public function index() {
        $business_exists = $this->businessprofile_model->is_vendor_exists();
        if ($business_exists === "no") {
            $this->load->view($this->url . "pending_business");
        } else if($business_exists == "yes") {
        $response = $this->businessinfo_model->is_vendor_exists();
        if($response === "yes") {
            $data = ['profile' => $this->businessinfo_model->get_business_info(),'categories' => $this->businessinfo_model->is_vendor_category_exists()  === "no" ? "Please click here to your product categories" : $this->businessinfo_model->get_vendor_categories()];
            
            $this->load->view($this->url."info_view",  $data);
        } else if($response === "no") {
            $data = ['categories'=> $this->businessinfo_model->is_vendor_category_exists() === "no" ? "Click to add product category" : $this->businessinfo_model->get_vendor_categories()];
            $this->load->view($this->url."info_create", $data);
        }
        }
    }
    
    
    
    public function product_categories() {
        $data = ['available'=> $this->businessinfo_model->get_categories(),'categories'=> $this->businessinfo_model->is_vendor_category_exists() === "no" ? "no" : $this->businessinfo_model->get_vendor_categories()];
        $this->load->view($this->url."category_view", $data);
    }
    
    public function add_product_category() {
        if($this->input->post("category")) {
            $this->session->set_flashdata("message", $this->businessinfo_model->add_category());
            redirect("businessinfo/product_categories");
        } else {
            redirect("businessinfo/product_categories");
        }
    }
    
    public function delete_category($id) {
        $this->session->set_flashdata("messages", $this->businessinfo_model->delete_category($id));
        redirect("businessinfo/product_categories");
    }
   
    
    public function create_business_info() {
        if($this->input->post("year")) {
            $this->session->set_flashdata("message", $this->businessinfo_model->create_business_info());
            redirect("businessinfo");
        } else {
            redirect("businessinfo");
        }
    }
    
    public function update_business_info_view() {
        $data = ['profile' => $this->businessinfo_model->get_business_info(),'categories' => $this->businessinfo_model->is_vendor_category_exists()  === "no" ? "Please click here to your product categories" : $this->businessinfo_model->get_vendor_categories()];
        $this->load->view($this->url."info_update", $data);
    }
    
    public function update_business_details() {
        if($this->input->post("year")) {
            $response = $this->businessinfo_model->update_binfo();
            if($response === "yes") {
                $this->session->set_flashdata("message", "updated");
            } else {
                $this->session->set_flashdata("message", "no");
            }
            redirect("businessinfo");
        } else {
            redirect("businessinfo");
        }
    } 
    
}
