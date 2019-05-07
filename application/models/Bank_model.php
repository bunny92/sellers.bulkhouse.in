<?php

class Bank_model extends CI_Model {

    private $table = "business_bank";
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

   public function register_bank_credentails() {
       $data = [
           'vendor_id' => $this->id,
           'account_name' => $this->input->post('account_name'),
           'account_number' => $this->input->post('account_number'),
           'bank_name' => $this->input->post("bank_name"),
           'branch_name' => $this->input->post("branch_name"),
           'ifsc' => $this->input->post("ifsc"),
           'bank_status' => 'Verification In Process',
           'amount' => $this->f_rand(1, 3, rand(1, 4))."",
           'click_count' => 0
       ];

       if (($result = $this->db->insert($this->table, $data))) {
           // return $this->db->insert_id() > 0 ? "yes" : "no";
           $email = $this->session->userdata('email');
           $this->load->model('vendor_crm');
           $vendor_crm_id = $this->vendor_crm->update_Bank_credentials($this->vendor_crm->get_crm_id($email),$data['account_name'],$data['account_number'],$data['bank_name'],$data['branch_name'],$data['ifsc']);
           return "yes";
       } else {
           return "no";
       }
   }

    public function get_bank_credentials() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->get($this->table))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function get_amount() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->select('amount')->get($this->table)->row())) {
            return $result->amount;
        } else {
            return NULL;
        }
    }

    public  function update_bank_count() {
        if(($result = $this->db->query("update ".$this->table." set click_count = click_count + 1 where vendor_id = ".$this->id))) {
            return $this->db->affected_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function approve_bank_account() {
        if(($result = $this->db->where(['vendor_id' => $this->id])->update($this->table, ['bank_status' => 'Approved']))) {
            return $this->db->affected_rows() > 0 ? "approved" : "deny";
        } else {
            return "deny";
        }
    }


    public function f_rand($min = 0, $max = 1, $mul = 1000000) {
       if ($min > $max) {
           return false;} else {
       $number =  mt_rand($min * $mul, $max * $mul) / $mul;
           return round($number, 2);
       } 
   }

    public function update_bank_credentails() {
       $data = [
           'account_name' => $this->input->post('account_name'),
           'account_number' => $this->input->post('account_number'),
           'bank_name' => $this->input->post("bank_name"),
           'branch_name' => $this->input->post("branch_name"),
           'ifsc' => $this->input->post("ifsc")
       ];
       if (($result = $this->db->where(['vendor_id' => $this->id])->update($this->table, $data))) {
           //return $this->db->affected_rows() >= 0 ? "yes" : "no";
           $email = $this->session->userdata('email');
           $this->load->model('vendor_crm');
           $vendor_crm_id = $this->vendor_crm->update_Bank_credentials($this->vendor_crm->get_crm_id($email),$data['account_name'],$data['account_number'],$data['bank_name'],$data['branch_name'],$data['ifsc']);
           return "yes";
       } else {
           return "no";
       }
   }

    public function get_verification_status() {
        if (($result = $this->db->select("bank_status")->where(['vendor_id' => $this->id])->get($this->table))) {
            if (($row = $result->row())) {
                if ($row->bank_status === "Approved") {
                    return "yes";
                } else if($row->bank_status === "Rejected"){
                    return "reject";
            } else {
                return "no";
            }
            } else {
                return "no";
            }
        } else {
            return "no";
        }
    }

    public function is_status_deposit() {
      if(($result = $this->db->select("bank_status")->where(['vendor_id' => $this->id, 'bank_status' => 'Deposit'])->get($this->table))) {
        return $result->num_rows() > 0 ? "yes" : "no";
      } else {
        return "no";
      }
    }

}
