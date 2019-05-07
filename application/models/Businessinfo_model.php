<?php

class Businessinfo_model extends CI_Model {

    private $table = "business_details";
    private $id;
    private $category = "vendor_categories";

    public function __construct() {
        parent::__construct();
        $this->id = $this->session->userdata("id");
        $this->load->model('vendor_crm');
    }

    public function is_vendor_exists() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->select('id')->get($this->table))) {
            return $result->num_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function is_vendor_category_exists() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->select('id')->get($this->category))) {
            return $result->num_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function get_vendor_categories() {
        if (($result = $this->db->query('select v.id, c.name from vendor_categories v, categories c where v.vendor_id = ' . $this->id . " and c.id = v.category_id"))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_categories() {
        if (($result = $this->db->query('select c.id, c.name from categories c where c.id not in (select v.category_id from vendor_categories v where v.vendor_id = ' . $this->id . ' )'))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function add_category() {
        $data = [
            'vendor_id' => $this->id,
            'category_id' => $this->input->post('category')
        ];
        if (($result = $this->db->insert($this->category, $data))) {
            //return $this->db->insert_id() > 0 ? "yes" : "no";
           $email = $this->session->userdata('email');
           $vendor_crm_id = $this->vendor_crm->update_product_cat($this->vendor_crm->get_crm_id($email),$data['category_id']);
            return "yes";
        } else {
            return "no";
        }
    }

    public function delete_category($id) {
        if (($result = $this->db->where(['id' => $id])->delete($this->category))) {
            return $this->db->affected_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function create_business_info() {
       $data = [
           'vendor_id' => $this->id,
           'year' => $this->input->post("year"),
           'no_of_employees' => $this->input->post("no"),
           'turn_over' => $this->input->post("turn_over"),
           'certificate' => $this->input->post('certificate'),
           'contact_person' => $this->input->post('contact_person') != NULL ? $this->input->post('contact_person') : "N/A",
           'contact_email' => $this->input->post('contact_email') != NULL ? $this->input->post('contact_email') : "N/A",
           'contact_phone' => $this->input->post('contact_phone') != NULL ? $this->input->post('contact_phone') : "N/A"
       ];
       if (($result = $this->db->insert($this->table, $data))) {
           // return $this->db->insert_id() > 0 ? "yes" : "no";
           $email = $this->session->userdata('email');
           $vendor_crm_id = $this->vendor_crm->update_businessinfo($this->vendor_crm->get_crm_id($email),$data['year'],$data['no_of_employees'],$data['turn_over'],$data['certificate'],$data['contact_person'],$data['contact_email'],$data['contact_phone']);
           return "yes";
       } else {
           return "no";
       }
   }

    public function get_business_info() {
        if (($result = $this->db->where(['vendor_id' => $this->session->userdata("id")])->get($this->table))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function update_binfo() {
       $data = [

           'year' => $this->input->post("year"),
           'no_of_employees' => $this->input->post("no"),
           'turn_over' => $this->input->post("turn_over"),
           'certificate' => $this->input->post('certificate'),
           'contact_person' => $this->input->post('contact_person'),
           'contact_email' => $this->input->post('contact_email'),
           'contact_phone' => $this->input->post('contact_phone')
       ];
       if (($result = $this->db->where(['vendor_id' => $this->session->userdata("id")])->update($this->table, $data))) {
           //return $this->db->affected_rows() >= 0 ? "yes" : "no";
           $email = $this->session->userdata('email');
           $this->load->model('vendor_crm');
           $vendor_crm_id = $this->vendor_crm->update_businessinfo($this->vendor_crm->get_crm_id($email),$data['year'],$data['no_of_employees'],$data['turn_over'],$data['certificate'],$data['contact_person'],$data['contact_email'],$data['contact_phone']);
           return "yes";
       } else {
           return "no";
       }
   }

}
