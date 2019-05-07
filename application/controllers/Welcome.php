

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->security_access->restrict_web_access();
        $this->security_access->set_authorization_security();
        $this->load->model("basicprofile_model");
    }

    public function index() {
		
        $this->load->view("landing/home");
    }
    
    public function login() {
        $this->load->view("login_view");
    }

    public function forgot_password() {

        $this->load->view("forgot_password_view");
    }

    public function authenticate_user() {
        if ($this->input->post("email") !== NULL) {
            $response = $this->basicprofile_model->authenticate_user();
            if ($response !== NULL && $response !== "no") {
                $this->session->set_userdata(['email' => $this->input->post("email"), 'id' => $response->id, 'first_name' => $response->first_name, 'logged_in' => TRUE]);
                redirect("dashboard");
            } else {
                $data = ['response' => 'Login Failed. Please try again..!', 'email'=>$this->input->post("email")];
                $this->load->view("login_view", $data);
            }
        } else {
            redirect("welcome");
        }
    }
    
 

    public function send_mail() {
      if(($email = $this->input->post("email"))) {
          if(($response = $this->basicprofile_model->get_password($email))) {
            if($response === "no") {
              $this->session->set_flashdata("message", "Email Id is not valid");
              redirect("welcome/forgot_password");
            } else {
              $this->load->model("mail_model"); 
              $this->mail_model->sendPassword($email, $response);
              $this->session->set_flashdata("yes", "Please check your mail for password.. Thank you");
              redirect("welcome/forgot_password");
            }
          } else {
            redirect("welcome/forgot_password");
          }
      } else {
        redirect("welcome/forgot_password");
      }

    }

}
  
