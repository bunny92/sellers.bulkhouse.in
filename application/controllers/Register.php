<?php

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model("register_model");
        $this->load->model("basicprofile_model");
        $this->load->model("mail_model");
        $this->load->library("encrypt");
    }

    public function export() {
        $this->load->view("export");
    }

    public function domestic() {
      $this->load->view("domestic");
    }

    public function both() {
      $this->load->view("both"); 
    }

    public function index() {
        $this->load->view("register_view");
    }

    /**
     * First Step Registration with Email Validation
     */
    public function first_step() {
        if (($email = $this->input->post("email")) !== NULL) {
            $email_response = $this->register_model->is_email_exists();
            if ($email_response === "yes" || $email_response === "fail") {

                $this->load->view("already_registered_view", ['email' => $email]);
            } else {
                $register_response = $this->register_model->first_step_registration();
                 if ($register_response === "yes") {
                    $time = strtotime('+1 Day');
                    $encrypted_link = base_url() . "register/activate_account?email=" . urlencode($this->encrypt->encode($email.":".$time));
                    $email_response = $this->mail_model->sendMail($email, $encrypted_link, $time);
                    $data = [
                        'email' => $email,
                        'email_response' => $email_response,

                    ];
                    $this->load->view("confirmation_email", $data);
                } else {
                    $this->load->view("already_registered_view", ['email' => $email]);
                }
            }
        } else {
            redirect("register/");
        }
    }

    public function getCaptcha() {
        $s = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
        echo $s;
    }

    public function send_activation_link() {
        if ($this->input->post("email")) {
            $time = strtotime('+1 Day');
            $email = $this->input->post("email");
            $encrypted_link = base_url() . "register/activate_account?email=" . urlencode($this->encrypt->encode($email . ":" . strtotime('+1 Day')));
            $email_response = $this->mail_model->sendMail($email, $encrypted_link, $time);
            echo $email_response;
        } else {
            echo "no";
        }
    }
    
    public function get_manual_activation_link() {
        if(($email = $this->input->post("email"))) {
            $enc = $this->encrypt->encode($email);
            echo base_url()."register/manual_activate?email=".urlencode($enc); 
        } else {
            echo "no";
        }
    }

    /**
     * Method executed after clicking on activation link in the mail
     */
    public function activate_account() {
        if (($encryptedEmail = $this->input->get("email"))) {
            $data = $this->encrypt->decode($encryptedEmail);
            $values = explode(":", $data);
            $email = $values[0];
            $time = $values[1];
            $present_time = strtotime('now');
            if($present_time <= $time) {
            $this->load->model("basicprofile_model");
            $vendor_id = $this->register_model->get_email_id($email);
            if ($vendor_id === NULL) {
                $this->load->view("technical_problems_view");
            } else {
                if ($this->basicprofile_model->basic_profile_check($vendor_id)) {
                    $this->load->view("already_registered_profile_view");
                } else {
                    $this->session->set_flashdata("email", $email);
                    $data = [
                        'vendor_id' => $vendor_id,'firms' => $this->basicprofile_model->get_firm_types()
                    ];
                    $this->load->view("register_profile", $data);
                }
            } } else {
                $this->load->view("expired_link_view");
            }
        } else {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        }
    }
    
    
    /**
     * Method executed after clicking on activation link in the mail
     */
    public function manual_activate() {
        if (($email = $this->input->get("email"))) {
            $data = $this->encrypt->decode($email);
            $this->load->model("basicprofile_model");
            $vendor_id = $this->register_model->get_email_id($data);
            if ($vendor_id === NULL) {
                $this->load->view("technical_problems_view");
            } else {
                if ($this->basicprofile_model->basic_profile_check($vendor_id)) {
                    $this->load->view("already_registered_profile_view");
                } else {
                    $this->session->set_flashdata("email", $data);
                    $data = [
                        'vendor_id' => $vendor_id,'firms' => $this->basicprofile_model->get_firm_types()
                    ];
                    $this->load->view("register_profile", $data);
                }
            } 
               
            
        } else {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        }
    }

 
    /**
     * Method to register basic vendor information..!
     */
    public function second_step() {
        if (($email = $this->input->post("email"))) {
            $this->load->model("basicprofile_model");
            $response = $this->basicprofile_model->register_basic_profile() ? "yes" : "no";
            $this->load->view("successful_registration_view", array(['response', $response]));
        } else {
            redirect("register/");
        }
   }

    
    public function enquiry(){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[10]|max_length[13]');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[6]|max_length[100]');
      if ($this->form_validation->run() == FALSE) {
           echo validation_errors();
      } else {
          $data = $this->register_model->enquiry_vendor();
          echo $data;
      }
   }

}
