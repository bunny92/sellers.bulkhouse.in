<?php

class Dashboard extends CI_Controller {

    private $vendors_url = "vendors/";

    public function __construct() {
        parent::__construct();
        $this->load->model("leads_model");
        $this->load->model("registration_model");
        $this->load->model("documents_model");
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->security_access->validate_admin_pages();
        
    }

    /**
     * Type : View
     * Role : Today's Leads
     */
    public function index() {
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url . "home", ["leads" => $this->leads_model->get_todays_leads()]);
        $this->load->view($this->vendors_url . "endfooter");
    }

    /**
     * Type : view
     * Role : Today's Vendors Registrations list
     */
    public function today_registrations() {
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url . "today_registrations", ["registrations" => $this->registration_model->get_todays_registrations()]);
        $this->load->view($this->vendors_url . "footer");
    }

    /**
     * Type : view
     * Role : Overall Vendor Leads
     */
    public function overall_leads() {
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url . "overall_leads", ["leads" => $this->leads_model->get_overall_leads()]);
        $this->load->view($this->vendors_url . "endfooter");
    }

    /**
     * Type : view
     * Role : Overall Vendors Registrations list
     */
    public function overall_registrations() {
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url . "overall_registrations", ["registrations" => $this->registration_model->get_overall_registrations()]);
        $this->load->view($this->vendors_url . "footer");
    }

    /**
     * Type : view
     * Role : Private Pending Documents List
     */
    public function private_pending_documents() {
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url . "private_pending_documents", ["documents" => $this->documents_model->get_pending_private_documents()]);
        $this->load->view($this->vendors_url . "footer");
    }

    /**
     * Type : view
     * Role : Private Pending Documents List
     */
    public function proprietor_pending_documents() {
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url . "proprietor_pending_documents", ["documents" => $this->documents_model->get_pending_proprietor_documents()]);
        $this->load->view($this->vendors_url . "footer");
    }

    /**
     * Type : view
     * Role : Private Pending Documents List
     */
    public function partner_pending_documents() {
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url . "partner_pending_documents", ["documents" => $this->documents_model->get_pending_partner_documents()]);
        $this->load->view($this->vendors_url . "footer");
    }
    
    /**
     * Type : view
     * Role : List of rejected vendors
     */
    public function rejected_vendors() {
        $this->load->model("rejected_model");
        $this->load->view($this->vendors_url . "header");
        $this->load->view($this->vendors_url."rejected_vendors", ["vendors"=> $this->rejected_model->get_vendor_details()]);
        $this->load->view($this->vendors_url . "footer");
    }

}
