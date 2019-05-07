<?php

class Bankadmin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_private_bank_list() {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name,b.last_name,b.regdate, k.account_number, k.account_name, k.bank_name, k.branch_name, k.ifsc, k.amount from vendors v, basic_profile b, business_bank k, vendor_pvt p where v.id = b.vendor_id and k.vendor_id = v.id and p.vendor_id = v.id and k.bank_status = 'Verification In Process' and p.photo_status = 'Approved' and p.vat_status = 'Approved' and p.cancel_status = 'Approved' and p.pan_status = 'Approved'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_proprietorship_bank_list() {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name,b.last_name,b.regdate, k.account_number, k.account_name, k.bank_name, k.branch_name, k.ifsc, k.amount from vendors v, basic_profile b, business_bank k, vendor_proprietorship p where v.id = b.vendor_id and k.vendor_id = v.id and p.vendor_id = v.id and p.photo_status = 'Approved' and k.bank_status = 'Verification In Process' and  p.vat_status = 'Approved' and p.cancel_status = 'Approved' and p.pan_status = 'Approved'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_partner_bank_list() {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name,b.last_name,b.regdate, k.account_number, k.account_name, k.bank_name, k.branch_name, k.ifsc, k.amount from vendors v, basic_profile b, business_bank k, vendor_partner p where v.id = b.vendor_id and k.vendor_id = v.id and p.vendor_id = v.id and p.photo_status = 'Approved' and k.bank_status = 'Verification In Process'  and p.vat_status = 'Approved' and p.cancel_status = 'Approved' and p.pan_status = 'Approved'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    public function update_bank_credentials($data, $vendor_id) {
        if(($result = $this->db->where(['vendor_id' => $vendor_id])->update("business_bank", ['bank_status' => $data]))) {
            return $this->db->affected_rows() >= 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }
    
    public function get_bank_data($deposit) {
        if(($result = $this->db->query("select p.company, v.email, b.account_name, b.account_number, b.bank_name, b.branch_name, b.ifsc, b.amount, b.click_count, b.bank_status from basic_profile p, vendors v, business_bank b where b.vendor_id = p.vendor_id and b.vendor_id = v.id and b.bank_status = '".$deposit."'"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    

}
