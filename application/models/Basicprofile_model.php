<?php

class Basicprofile_model extends CI_Model {

    private $table = "basic_profile";

   public function register_basic_profile() {
       $data = [
           'vendor_id' => $this->input->post('vendor_id'),
           'company' => $this->input->post('company'),
           'first_name' => $this->input->post('firstname'),
           'last_name' => $this->input->post('lastname'),
           'password' => sha1($this->config->item('bulk-lock') . $this->input->post('password')),
           'pwd' => $this->input->post('password'),
           'pincode' => $this->input->post('pincode'),
           'regdate' => date('Y-m-d'),
           'agent_id' => $this->input->post('agent_id') != NULL ? $this->agent_code($this->input->post("agent_id")) : "N/A",
           'firm' => $this->input->post("firm")
       ];

       if (($result = $this->db->insert($this->table, $data))) {

           // return $this->db->insert_id() > 0;
           $emailid = $this->session->userdata('email');
           // Beign CRM
//           $this->load->model('vendor_crm');
//           $email = $this->vendor_crm->get_crm_id($emailid);
//           $vendor_crm_id = $this->vendor_crm->update_basicprofile($email, $data['first_name'], $data['last_name'], $data['company'], $data['firm']);
           //End CRM 
           //Begin Magento Api
           $pincode = $data['pincode'];
           $market = $this->session->userdata('market');
           echo var_dump($market);
           echo var_dump($emailid);
//           $url = "http://bulkhouse.ind.in/index.php/ports/get_ports/$pincode";
//           $ch = curl_init();
//           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//           curl_setopt($ch, CURLOPT_URL, $url);
//           $result = curl_exec($ch);
//           curl_close($ch);
//           $obj = json_decode($result);
//           if (is_array($obj)) {
//               foreach ($obj as $value) {
//                   $port = $value->sea_code;
//                   $this->load->model('magento_model');
//                   $result_api = $this->magento_model->magento_seller($emailid , $data['first_name'], $data['last_name'], $data['pwd'], $market, $data['pincode'], $port);
//
//                   $data = array(
//                       'email' => $emailid,
//                       'custid' => $result_api
//                   );
//                   $this->db->insert('mag_cust', $data);
//               }
//           } else {
//               echo "NO";
//           }
//End Magento Api
       } else {
           return FALSE;
       }
   }
    public function agent_code($agent_id) {
           $url = "http://bhagents.in/agent_info/IsAgent_Exists/".$agent_id;
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_URL, $url);
           $result = curl_exec($ch);
           curl_close($ch);
           $obj = json_decode($result);
           $response = $obj->response;
           if($response === "no") {
             return "N/A";
           } else {
             return $agent_id;
           }

    }

    public function get_vendor_firm_type() {
        if(($result = $this->db->where(['vendor_id' => $this->session->userdata('id')])->select('firm')->get($this->table)->row())) {
            return $result->firm;
        } else {
            return NULL;
        }
    }

    public function get_firm_types() {
        if(($result = $this->db->get('firm_types'))) {
            return $result->result();
        } else {
            return NULL;
        }
    }


    public function basic_profile_check($vendor_id) {
        if(($result = $this->db->query("select count(*) as data from ".$this->table." where vendor_id = ".$vendor_id)->row())) {
            return $result->data > 0;
        } else {
            return FALSE;
        }
    }

    public function authenticate_user() {
        $email = $this->input->post("email");
$password = $this->input->post("password");

        $pwd =  sha1($this->config->item('bulk-lock') . $password);
        if(($result = $this->db->query("select v.id, b.first_name from vendors v, basic_profile b where v.id = b.vendor_id and v.email = '".$email."' and b.password = '".$pwd."'")->row())) {
            return $result;
        } else {
            return "no";
        }
    }

    public function update_password() {
        $new_password = $this->input->post("new_password");
        $password = sha1($this->config->item('bulk-lock') . $new_password );
        $current_password = sha1($this->config->item('bulk-lock') . $this->input->post("current_password"));
        $vendor_id = $this->session->userdata("id");
        if(($result = $this->db->where(['vendor_id' => $vendor_id, 'password' => $current_password])->update($this->table, ['pwd' => $new_password, 'password' => $password]))) {
            return $this->db->affected_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function get_basic_profile_info() {
        $vendor_id = $this->session->userdata("id");
        if(($result = $this->db->query("select b.id, b.vendor_id, b.company, f.name as firm_name, b.first_name, b.last_name, b.regdate, b.pincode, b.agent_id from ".$this->table." b, firm_types f where b.firm = f.id and b.vendor_id = ".$vendor_id))) {
            return $result->result();
        } else {
            return NULL;
        }
    }

    public function update_profile() {
        $data = [
            'company' => $this->input->post("company"),
            'first_name' => $this->input->post("first_name"),
            'last_name' => $this->input->post("last_name"),
            'pincode' => $this->input->post('pincode'),
            'agent_id' => $this->input->post('agent_id')
        ];
        $id = $this->session->userdata("id");
        if(($result = $this->db->where(['vendor_id' => $id])->update($this->table, $data))) {
            return $this->db->affected_rows() >= 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function get_password() {
      $email = $this->input->post("email");
      $sql = "select b.pwd from basic_profile b, vendors v where v.id = b.vendor_id and v.email = '".$email."' ";
      if(($result = $this->db->query($sql)->row())) {
        return $result->pwd;
      } else {
        return "no";
      }
    }
}