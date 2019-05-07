<?php

class Documents_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Method returns the list of documents of the vendors who registered for proprietor
     * @return Array
     */
    public function get_pending_proprietor_documents() {
        if (($result = $this->db->query("select v.email, v.phone, b.first_name, b.last_name, b.company, d.photo_status, d.vat_status, d.pan_status, d.cenvat_status, d.cancel_status, a.agent_code, a.name as agent_name from basic_profile b left join vendors v on b.vendor_id = v.id left join vendor_proprietorship d on d.vendor_id = b.vendor_id left join assigned_agents ag on ag.vendor_id = b.vendor_id left join agents a on ag.agent_code = a.agent_code where b.firm = 1 order by b.id asc"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    /**
     * Method returns the list of documents of the vendors who registered for partner
     * @return Array
     */
    public function get_pending_partner_documents() {
        if (($result = $this->db->query("select v.email, v.phone, b.first_name, b.last_name, b.company, d.photo_status, d.vat_status, d.pan_status, d.cenvat_status,d.deed_status, d.cancel_status, a.agent_code, a.name as agent_name from basic_profile b left join vendors v on b.vendor_id = v.id left join vendor_partner d on d.vendor_id = b.vendor_id left join assigned_agents ag on ag.vendor_id = b.vendor_id left join agents a on ag.agent_code = a.agent_code where b.firm = 2 order by b.id asc"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    /**
     * Method returns the list of documents of the vendors who registered for private
     * @return Array
     */
    public function get_pending_private_documents() {
        if (($result = $this->db->query("select v.email, v.phone, b.first_name, b.last_name, b.company, d.photo_status, d.vat_status, d.pan_status, d.cenvat_status,d.moa_status, d.cancel_status, a.agent_code, a.name as agent_name from basic_profile b left join vendors v on b.vendor_id = v.id left join vendor_pvt d on d.vendor_id = b.vendor_id left join assigned_agents ag on ag.vendor_id = b.vendor_id left join agents a on ag.agent_code = a.agent_code where b.firm = 3 order by b.id asc"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

}
