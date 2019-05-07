<?php

class Api extends CI_Controller {

    private $url = "api/";

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->security_access->validate_api_pages();
        $this->load->model("api_model");
    }

    /**
     * Type : View
     * Function : It Displays the List of Vendors ready to get synchronized with Magento
     */
    public function index() {
        $this->load->view($this->url . "home", ["magento" => $this->api_model->get_magento_vendors()]);
    }

    /**
     * Type : View
     * Function : It Displays the List of Vendors ready to get synchronized with CRM
     */
    public function crm() {
        $this->load->view($this->url . "crm", ["crm" => $this->api_model->get_crm_vendors()]);
    }

    public function sync_maze() {

        if (($email = $this->input->post("email"))) {
            $response = $this->api_model->get_details($email);
            $this->load->model("maze_model");
            if (($result = $this->maze_model->magento_create_seller($email, $response->first_name, $response->last_name, md5($response->pwd), $response->market, $response->pincode))) {
                if($result != NULL) {
                    echo $result;
                } else {
                    echo "no";
                }
            } else {
                echo "no";
            }
        } else {
            echo "no";
        }
    }
    
     public function sync_maze_dup() {

        if (($email = $this->input->get("email"))) {
            $response = $this->api_model->get_details($email);
            $this->load->model("maze_model");
            if (($result = $this->maze_model->magento_create_seller_dup($email, $response->first_name, $response->last_name, md5($response->pwd), $response->market, $response->pincode))) {
                if($result != NULL) {
                    echo $result;
                } else {
                    echo "no";
                }
            } else {
                echo "no";
            }
        } else {
            echo "no";
        }
    }

    /**
     * Type : Business Logic
     * Function : Logs out user session
     */
    public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect("admin/api_login");
    }

}
