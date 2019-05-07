<?php

class Api_model extends CI_Model {

    private $table = "api_vendors";

    public function __construct() {
        parent::__construct();
    }
    
    public function get_details($email) {
        if(($result = $this->db->query("select a.email, b.first_name, b.last_name, a.market, b.pwd, b.pincode from vendors a, basic_profile b where a.id = b.vendor_id and a.email = '".$email."'"))) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function get_magento_vendors() {
        if (($result = $this->db->query(" select v.email from api_vendors a, vendors v where a.vendor_id = v.id and a.magento_id = 'N/A' "))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    
    public function get_crm_vendors() {
        if (($result = $this->db->query("select v.email from api_vendors a, vendors v where a.vendor_id = v.id and a.crm_id = 'N/A' "))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

}
