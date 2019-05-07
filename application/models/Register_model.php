<?php

class Register_model extends CI_Model {

   private $table = "vendors";

   public function first_step_registration() {
       $data = [
           'email' => $this->input->post("email"),
           'phone' => $this->input->post("phone"),
           'market' => $this->input->post("transaction"),
           'regdate' => date('Y-m-d H:i:s')
       ];
       $info = $this->security->xss_clean($data);
       if (($result = $this->db->insert($this->table, $info))) {

           $this->load->model('vendor_crm');
           $vendor_crm_id = $this->vendor_crm->register($data['email'], $data['phone'], $data['market']);

           $data = array(
               'crm_id' => $vendor_crm_id,
               'email' => $data['email'],
               'status' => '3'
           );
           $this->db->insert('crm_cust', $data);
           return $this->db->insert_id() > 0 ? "yes" : "no";
       } else {
           return "no";
       }
   }

   public function is_email_exists() {
       $email = $this->input->post("email");
       if (($result = $this->db->query("select email from " . $this->table . " where email = '" . $email . "'"))) {
           return $result->num_rows() > 0 ? "yes" : "no";
       } else {
           return "fail";
       }
   }

   public function get_email_id($email) {
       if (($result = $this->db->select('id')->where(['email' => $email])->get($this->table)->row())) {
           return $result->id;
       } else {
           return NULL;
       }
   }

   public function get_vendor_details() {
       $id = $this->session->userdata("id");
       if (($result = $this->db->where(['id' => $id])->get($this->table))) {
           return $result->result();
       } else {
           return NULL;
       }
   }

   public function update_details() {
       $id = $this->session->userdata("id");
       $data = [
           'phone' => $this->input->post("phone"),
           'market' => $this->input->post("market")
       ];
       if (($result = $this->db->where(['id' => $id])->update($this->table, $data))) {
           return $this->db->affected_rows() >= 0 ? "yes" : "no";
       } else {
           return "no";
       }
   }

   public function enquiry_vendor() {

       $email = $this->input->post('email');
       $phone = $this->input->post('phone');
       $first_name = $this->input->post('first_name');
       $last_name = $this->input->post('last_name');
       $category = $this->input->post('category');
       $message = $this->input->post('message');
       $date = date("Y-m-d") . "|" . date("h:i:s");

       $data = array(
           'first_name' => $first_name,
           'last_name' => $last_name,
           'email' => $email,
           'phone' => $phone,
           'category' => $category,
           'message' => $message,
           'date' => $date
       );
       $this->db->insert('enquiry', $data);
       if ($this->db->insert_id() > 0) {

           $this->load->model('vendor_crm');
           $vendor_crm_id = $this->vendor_crm->enquiry_form($email, $first_name, $last_name, $phone, $category, $message);
           return "yes";
       } else {
           return "no";
       }
   }

}