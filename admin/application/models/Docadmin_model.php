<?php

class Docadmin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_partner_documents() {
        $sql = "select 
sum(case when photo_status = 'Verification In Process' then 1 end) as total_photo,
sum(case when vat_status = 'Verification In Process' then 1 end) as total_vat,
sum(case when pan_status = 'Verification In Process' then 1 end) as total_pan,
sum(case when deed_status = 'Verification In Process' then 1 end) as total_deed,
sum(case when cancel_status = 'Verification In Process' then 1 end) as total_cancel,
sum(case when cenvat_status = 'Verification In Process' then 1 end) as total_cenvat 
from vendor_partner";
        if (($result = $this->db->query($sql))) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function get_proprietor_documents() {
        $sql = "select 
sum(case when photo_status = 'Verification In Process' then 1 end) as total_photo,
sum(case when vat_status = 'Verification In Process' then 1 end) as total_vat,
sum(case when pan_status = 'Verification In Process' then 1 end) as total_pan,
sum(case when cenvat_status = 'Verification In Process' then 1 end) as total_cenvat,
sum(case when cancel_status = 'Verification In Process' then 1 end) as total_cancel
from vendor_proprietorship";
        if (($result = $this->db->query($sql))) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function get_private_documents() {
        $sql = "select 
sum(case when photo_status = 'Verification In Process' then 1 end) as total_photo,
sum(case when vat_status = 'Verification In Process' then 1 end) as total_vat,
sum(case when pan_status = 'Verification In Process' then 1 end) as total_pan,
sum(case when cenvat_status = 'Verification In Process' then 1 end) as total_cenvat,
sum(case when cancel_status = 'Verification In Process' then 1 end) as total_cancel,
sum(case when moa_status = 'Verification In Process' then 1 end) as total_moa
from vendor_pvt";
        if (($result = $this->db->query($sql))) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function get_photo($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.photo_id as data, d.input_photo_id as input, d.photo_date as enter_date from " . $table . " d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.photo_status = 'Verification In Process'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_vat($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.vat_cst as data, d.input_vat_cst as input, d.vat_date as enter_date from " . $table . " d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.vat_status = 'Verification In Process'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_pan($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.pan as data, d.input_pan as input, d.pan_date as enter_date from " . $table . " d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.pan_status = 'Verification In Process'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_pan_partner() {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.company_pan as data, d.input_company_pan as input, d.pan_date as enter_date from vendor_partner d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.pan_status = 'Verification In Process'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    public function get_pan_private() {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.company_pan as data, d.input_company_pan as input, d.pan_date as enter_date from vendor_pvt d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.pan_status = 'Verification In Process'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_cenvat($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.cenvat as data, d.cenvat_date as enter_date from " . $table . " d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.cenvat_status = 'Verification In Process'";
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    public function get_cancel($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.cancel_cheque as data, d.cancel_date as enter_date, bk.account_name, bk.account_number, bk.bank_name, bk.branch_name, bk.ifsc from ".$table." d, basic_profile b, vendors v, business_bank bk where v.id = b.vendor_id and bk.vendor_id = v.id and d.vendor_id = v.id and d.cancel_status = 'Verification In Process'";
        if(($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    public function get_cancel_data($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.cancel_cheque as data, d.cancel_date as enter_date from ".$table." d, basic_profile b, vendors v where v.id = b.vendor_id  and d.vendor_id = v.id and d.cancel_status = 'Verification In Process' and v.id not in (select vendor_id from business_bank)";
        if(($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    public function get_deed($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.part_deed as data, d.deed_date as enter_date from ".$table." d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.deed_status = 'Verification In Process'";
        if(($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    public function get_moa($table) {
        $sql = "select v.id, v.email, v.phone, b.company, b.first_name, b.last_name, b.regdate, d.moa as data, d.moa_date as enter_date from ".$table." d, basic_profile b, vendors v where v.id = b.vendor_id and d.vendor_id = v.id and d.moa_status = 'Verification In Process'";
        if(($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    
    public function update_status($table, $data, $vendor_id) {
        if(($result = $this->db->where(['vendor_id'=>$vendor_id])->update($table, $data))) {
            return $this->db->affected_rows() >= 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }
    
    public function get_content_pdf($url) {
      header('Content-type: application/pdf');
      $homepage = file_get_contents($url);
      print_r($homepage);
    }
    

}
