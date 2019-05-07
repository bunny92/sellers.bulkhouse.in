<?php

class Look_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * This method gives the complete set of credentials entered by vendor
     * @return Array [Complete Set of Vendor Details]
     */
    public function get_quick_look() {
        $sql = "select v.id, v.email, v.phone, v.market, b.company, b.firm, f.name as firm_type, b.first_name, b.last_name, b.pwd, b.regdate,bs.registration_category, bs.contact_office_landline, bs.contact_address,bs.contact_area,  bs.contact_city, bs.contact_state, bs.contact_district, bs.contact_pincode, bs.disp_office_landline, bs.disp_office_address, bs.disp_area, bs.disp_city, bs.disp_state, bs.disp_district, bs.disp_pincode,
bd.year, bd.no_of_employees, bd.turn_over, bd.certificate, bd.contact_person, bd.contact_email, bd.contact_phone,ag.agent_code,a.name,partner.photo_status as partner_photo, partner.vat_status as partner_vat, partner.pan_status as partner_pan, partner.cancel_status as partner_cancel,
prop.photo_status as prop_photo, prop.vat_status as prop_vat, prop.pan_status as prop_pan, prop.cancel_status as prop_cancel,
private.photo_status as private_photo, private.vat_status as private_vat, private.pan_status as private_pan, private.cancel_status as private_cancel,
bank.bank_status from basic_profile b 
left outer join vendors v on b.vendor_id = v.id 
left outer join firm_types f on b.firm = f.id 
left outer join vendor_partner partner on b.vendor_id = partner.vendor_id 
left outer join vendor_proprietorship prop on b.vendor_id = prop.vendor_id 
left outer join vendor_pvt private on b.vendor_id = private.vendor_id 
left outer join business_bank bank on b.vendor_id = bank.vendor_id
left outer join business_profile bs on b.vendor_id = bs.vendor_id
left outer join business_details bd on b.vendor_id = bd.vendor_id
left outer join assigned_agents ag on b.vendor_id = ag.vendor_id
left outer join agents a on ag.agent_code = a.agent_code where b.agent_id = 'N/A' and b.vendor_id not in (select vendor_id from rejected_vendors) order by b.id desc limit 100"
        ;
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_complete_look() {
        $sql = "select v.id, v.email, v.phone, v.market, b.company, b.firm, f.name as firm_type, b.first_name, b.last_name, b.pwd, b.regdate,bs.registration_category, bs.contact_office_landline, bs.contact_address,bs.contact_area,  bs.contact_city, bs.contact_state, bs.contact_district, bs.contact_pincode, bs.disp_office_landline, bs.disp_office_address, bs.disp_area, bs.disp_city, bs.disp_state, bs.disp_district, bs.disp_pincode,
bd.year, bd.no_of_employees, bd.turn_over, bd.certificate, bd.contact_person, bd.contact_email, bd.contact_phone,ag.agent_code,a.name,partner.photo_status as partner_photo, partner.vat_status as partner_vat, partner.pan_status as partner_pan, partner.cancel_status as partner_cancel,
prop.photo_status as prop_photo, prop.vat_status as prop_vat, prop.pan_status as prop_pan, prop.cancel_status as prop_cancel,
private.photo_status as private_photo, private.vat_status as private_vat, private.pan_status as private_pan, private.cancel_status as private_cancel,
bank.bank_status from basic_profile b 
left outer join vendors v on b.vendor_id = v.id 
left outer join firm_types f on b.firm = f.id 
left outer join vendor_partner partner on b.vendor_id = partner.vendor_id 
left outer join vendor_proprietorship prop on b.vendor_id = prop.vendor_id 
left outer join vendor_pvt private on b.vendor_id = private.vendor_id 
left outer join business_bank bank on b.vendor_id = bank.vendor_id
left outer join business_profile bs on b.vendor_id = bs.vendor_id
left outer join business_details bd on b.vendor_id = bd.vendor_id
left outer join assigned_agents ag on b.vendor_id = ag.vendor_id
left outer join agents a on ag.agent_code = a.agent_code where b.agent_id = 'N/A' and b.vendor_id not in (select vendor_id from rejected_vendors) order by b.id desc"
        ;
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    /**
     * This method gives the complete set of credentials entered by vendor including DRA
     * @return Array [Complete Set of Vendor Details]
     */
    public function get_quick_all_look() {
        $sql = "select v.id, v.email, v.phone, v.market, b.company, b.firm, f.name as firm_type, b.first_name, b.last_name, b.pwd, b.regdate,bs.registration_category, bs.contact_office_landline, bs.contact_address,bs.contact_area,  bs.contact_city, bs.contact_state, bs.contact_district, bs.contact_pincode, bs.disp_office_landline, bs.disp_office_address, bs.disp_area, bs.disp_city, bs.disp_state, bs.disp_district, bs.disp_pincode,
bd.year, bd.no_of_employees, bd.turn_over, bd.certificate, bd.contact_person, bd.contact_email, bd.contact_phone,ag.agent_code,a.name,partner.photo_status as partner_photo, partner.vat_status as partner_vat, partner.pan_status as partner_pan, partner.cancel_status as partner_cancel,
prop.photo_status as prop_photo, prop.vat_status as prop_vat, prop.pan_status as prop_pan, prop.cancel_status as prop_cancel,
private.photo_status as private_photo, private.vat_status as private_vat, private.pan_status as private_pan, private.cancel_status as private_cancel,
bank.bank_status from basic_profile b 
left outer join vendors v on b.vendor_id = v.id 
left outer join firm_types f on b.firm = f.id 
left outer join vendor_partner partner on b.vendor_id = partner.vendor_id 
left outer join vendor_proprietorship prop on b.vendor_id = prop.vendor_id 
left outer join vendor_pvt private on b.vendor_id = private.vendor_id 
left outer join business_bank bank on b.vendor_id = bank.vendor_id
left outer join business_profile bs on b.vendor_id = bs.vendor_id
left outer join business_details bd on b.vendor_id = bd.vendor_id
left outer join assigned_agents ag on b.vendor_id = ag.vendor_id
left outer join agents a on ag.agent_code = a.agent_code where b.agent_id = 'N/A' and b.vendor_id not in (select vendor_id from rejected_vendors) order by b.id desc"
        ;
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_complete_all_look() {
        $sql = "select v.id, v.email, v.phone, v.market, b.company, b.firm, f.name as firm_type, b.first_name, b.last_name, b.pwd, b.regdate,bs.registration_category, bs.contact_office_landline, bs.contact_address,bs.contact_area,  bs.contact_city, bs.contact_state, bs.contact_district, bs.contact_pincode, bs.disp_office_landline, bs.disp_office_address, bs.disp_area, bs.disp_city, bs.disp_state, bs.disp_district, bs.disp_pincode,
bd.year, bd.no_of_employees, bd.turn_over, bd.certificate, bd.contact_person, bd.contact_email, bd.contact_phone,ag.agent_code,a.name,partner.photo_status as partner_photo, partner.vat_status as partner_vat, partner.pan_status as partner_pan, partner.cancel_status as partner_cancel,
prop.photo_status as prop_photo, prop.vat_status as prop_vat, prop.pan_status as prop_pan, prop.cancel_status as prop_cancel,
private.photo_status as private_photo, private.vat_status as private_vat, private.pan_status as private_pan, private.cancel_status as private_cancel,
bank.bank_status from basic_profile b 
left outer join vendors v on b.vendor_id = v.id 
left outer join firm_types f on b.firm = f.id 
left outer join vendor_partner partner on b.vendor_id = partner.vendor_id 
left outer join vendor_proprietorship prop on b.vendor_id = prop.vendor_id 
left outer join vendor_pvt private on b.vendor_id = private.vendor_id 
left outer join business_bank bank on b.vendor_id = bank.vendor_id
left outer join business_profile bs on b.vendor_id = bs.vendor_id
left outer join business_details bd on b.vendor_id = bd.vendor_id
left outer join assigned_agents ag on b.vendor_id = ag.vendor_id
left outer join agents a on ag.agent_code = a.agent_code where b.agent_id = 'N/A' and b.vendor_id not in (select vendor_id from rejected_vendors) order by b.id desc"
        ;
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_agent_vendors($agent_code) {
        $sql = "select v.id, v.email, v.phone, v.market, b.company, b.firm, f.name as firm_type, b.first_name, b.last_name, b.pwd, b.regdate,bs.registration_category, bs.contact_office_landline, bs.contact_address,bs.contact_area,  bs.contact_city, bs.contact_state, bs.contact_district, bs.contact_pincode, bs.disp_office_landline, bs.disp_office_address, bs.disp_area, bs.disp_city, bs.disp_state, bs.disp_district, bs.disp_pincode,
                bd.year, bd.no_of_employees, bd.turn_over, bd.certificate, bd.contact_person, bd.contact_email, bd.contact_phone,ag.agent_code,a.name,partner.photo_status as partner_photo, partner.vat_status as partner_vat, partner.pan_status as partner_pan, partner.cancel_status as partner_cancel,
                prop.photo_status as prop_photo, prop.vat_status as prop_vat, prop.pan_status as prop_pan, prop.cancel_status as prop_cancel,
                private.photo_status as private_photo, private.vat_status as private_vat, private.pan_status as private_pan, private.cancel_status as private_cancel,
                bank.bank_status from basic_profile b 
                left outer join vendors v on b.vendor_id = v.id 
                left outer join firm_types f on b.firm = f.id 
                left outer join vendor_partner partner on b.vendor_id = partner.vendor_id 
                left outer join vendor_proprietorship prop on b.vendor_id = prop.vendor_id 
                left outer join vendor_pvt private on b.vendor_id = private.vendor_id 
                left outer join business_bank bank on b.vendor_id = bank.vendor_id
                left outer join business_profile bs on b.vendor_id = bs.vendor_id
                left outer join business_details bd on b.vendor_id = bd.vendor_id
                left outer join assigned_agents ag on b.vendor_id = ag.vendor_id
                left outer join agents a on ag.agent_code = a.agent_code  where b.agent_id = 'N/A' and ag.agent_code = '" . $agent_code . "' and b.vendor_id not in (select vendor_id from rejected_vendors) order by b.id desc";

        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }
    
    
    
    
      public function get_complete_look_date($fromDate, $toDate) {
        $sql = "select v.id, v.email, v.phone, v.market, b.company, b.firm, f.name as firm_type, b.first_name, b.last_name, b.pwd, b.regdate,bs.registration_category, bs.contact_office_landline, bs.contact_address,bs.contact_area,  bs.contact_city, bs.contact_state, bs.contact_district, bs.contact_pincode, bs.disp_office_landline, bs.disp_office_address, bs.disp_area, bs.disp_city, bs.disp_state, bs.disp_district, bs.disp_pincode,
bd.year, bd.no_of_employees, bd.turn_over, bd.certificate, bd.contact_person, bd.contact_email, bd.contact_phone,ag.agent_code,a.name,partner.photo_status as partner_photo, partner.vat_status as partner_vat, partner.pan_status as partner_pan, partner.cancel_status as partner_cancel,
prop.photo_status as prop_photo, prop.vat_status as prop_vat, prop.pan_status as prop_pan, prop.cancel_status as prop_cancel,
private.photo_status as private_photo, private.vat_status as private_vat, private.pan_status as private_pan, private.cancel_status as private_cancel,
bank.bank_status from basic_profile b 
left outer join vendors v on b.vendor_id = v.id 
left outer join firm_types f on b.firm = f.id 
left outer join vendor_partner partner on b.vendor_id = partner.vendor_id 
left outer join vendor_proprietorship prop on b.vendor_id = prop.vendor_id 
left outer join vendor_pvt private on b.vendor_id = private.vendor_id 
left outer join business_bank bank on b.vendor_id = bank.vendor_id
left outer join business_profile bs on b.vendor_id = bs.vendor_id
left outer join business_details bd on b.vendor_id = bd.vendor_id
left outer join assigned_agents ag on b.vendor_id = ag.vendor_id
left outer join agents a on ag.agent_code = a.agent_code where  b.regdate between '".$fromDate."' and '".$toDate."' and b.agent_id = 'N/A'  and b.vendor_id not in (select vendor_id from rejected_vendors) order by b.id desc"
        ;
        if (($result = $this->db->query($sql))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

}
