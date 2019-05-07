<?php

class Security_access extends CI_Model {


    public function restrict_web_access() {
	
         $url = base_url();
		
        $allowed_hosts = array('http://localhost/SellerLocal/', 'http://sellerportal.bhagents.in/', 'http://192.168.100.139/SellerLocal/','http://sellers.bulkhouse.in/','http://52.91.97.99');
        if(!in_array($url, $allowed_hosts)) {
            $this->output->set_status_header('403','Your access is forbidden');
            exit;
        } else {
            return TRUE;
        }
    }


    // Setting Login Security
    public function set_authorization_security() {
        $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        $details = current_url();
        $index = strrpos($details, "/");
        $substr = substr($details, $index+1);
        $data = $this->session->userdata("logged_in");

        $pages = array('index.php', 'authenticate_user', 'forgot_password', 'send_mail','login');
         if(in_array($substr, $pages)) {
        } else {
           if(isset($data) && $data === TRUE) {
           } else {
               redirect("/");
            }

        }

    }

     public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('welcome');
    }




}
