<?php

class Businessprofile_model extends CI_Model {

    private $table = "business_profile";
    private $id;

    public function __construct() {
        parent::__construct();
        $this->id = $this->session->userdata("id");
    }

    public function is_vendor_exists() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->select('id')->get($this->table))) {
            return $result->num_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function view_vendor() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->get($this->table))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function register_business_profile() {
        $data = [
            'vendor_id' => $this->id,
            'registration_category' => $this->input->post("registration_category"),
            'contact_office_landline' => $this->input->post("cont_off_land"),
            'contact_address' => $this->input->post("cont_address"),
            'contact_area' => $this->input->post("cont_area"),
            'contact_city' => $this->input->post("cont_city"),
            'contact_state' => $this->input->post("cont_state"),
            'contact_district' => $this->input->post("cont_district"),
            'contact_pincode' => $this->input->post("cont_pincode"),
            'disp_office_landline' => $this->input->post("disp_off_land"),
            'disp_office_address' => $this->input->post("disp_address"),
            'disp_area' => $this->input->post("disp_area"),
            'disp_city' => $this->input->post("disp_city"),
            'disp_state' => $this->input->post("disp_state"),
            'disp_district' => $this->input->post('disp_district'),
            'disp_pincode' => $this->input->post('disp_pincode')
        ];
        if (($result = $this->db->insert($this->table, $data))) {
            // return $this->db->insert_id() > 0 ? "yes" : "no";
            $email = $this->session->userdata('email');
            $this->load->model('vendor_crm');
            $vendor_crm_id = $this->vendor_crm->update_businessprofile(
            $this->vendor_crm->get_crm_id($email),
            $data['registration_category'],
            $data['contact_office_landline'],
            $data['contact_address'],
            $data['contact_area'],
            $data['contact_city'],
            $data['contact_state'],
            $data['contact_district'],
            $data['contact_pincode'],
            $data['disp_office_landline'],
            $data['disp_office_address'],
            $data['disp_area'],
            $data['disp_city'],
            $data['disp_state'],
            $data['disp_district'],
            $data['disp_pincode']);
            return "yes";
        } else {
            return "no";
        }
    }

    public function update_business_profile() {
        $data = [

            'registration_category' => $this->input->post("registration_category"),
            'contact_office_landline' => $this->input->post("cont_off_land"),
            'contact_address' => $this->input->post("cont_address"),
            'contact_area' => $this->input->post("cont_area"),
            'contact_city' => $this->input->post("cont_city"),
            'contact_state' => $this->input->post("cont_state"),
            'contact_district' => $this->input->post("cont_district"),
            'contact_pincode' => $this->input->post("cont_pincode"),
            'disp_office_landline' => $this->input->post("disp_off_land"),
            'disp_office_address' => $this->input->post("disp_address"),
            'disp_area' => $this->input->post("disp_area"),
            'disp_city' => $this->input->post("disp_city"),
            'disp_state' => $this->input->post("disp_state"),
            'disp_district' => $this->input->post('disp_district'),
            'disp_pincode' => $this->input->post('disp_pincode')
        ];
        if (($result = $this->db->where(['vendor_id' => $this->id])->update($this->table, $data))) {
            //return $this->db->affected_rows() >= 0 ? "yes" : "no";
            $email = $this->session->userdata('email');
            $this->load->model('vendor_crm');
            $vendor_crm_id = $this->vendor_crm->update_businessprofile(
            $this->vendor_crm->get_crm_id($email),
            $data['registration_category'],
            $data['contact_office_landline'],
            $data['contact_address'],
            $data['contact_area'],
            $data['contact_city'],
            $data['contact_state'],
            $data['contact_district'],
            $data['contact_pincode'],
            $data['disp_office_landline'],
            $data['disp_office_address'],
            $data['disp_area'],
            $data['disp_city'],
            $data['disp_state'],
            $data['disp_district'],
            $data['disp_pincode']);
            return "yes";
        } else {
            return "no";
        }
    }

}