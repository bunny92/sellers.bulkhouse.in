<?php

class Security_access extends CI_Model {

    public function restrict_web_access() {
        $url = base_url();
        $allowed_hosts = array('http://localhost/Admin/','http://sellers.bulkhouse.in/admin/');
        if (!in_array($url, $allowed_hosts)) {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        } else {
            return TRUE;
        }
    }

    public function validate_admin_pages() {
        if ($this->session->userdata("role") !== "Admin") {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        }
    }

    public function validate_document_pages() {
        if ($this->session->userdata("role") !== "Document") {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        }
    }
    
    public function validate_agent_pages() {
        if ($this->session->userdata("role") !== "Agent") {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        }
    }

    public function validate_bank_pages() {
        if ($this->session->userdata("role") !== "Bank") {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        }
    }
    
    public function validate_api_pages() {
        if ($this->session->userdata("role") !== "Api") {
            $this->output->set_status_header('403', 'Your access is forbidden');
            exit;
        }
    }

    // Setting Login Security
    public function set_authorization_security() {
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
        $details = current_url();
        $index = strrpos($details, "/");
        $substr = substr($details, $index + 1);
        $data = $this->session->userdata("logged_in");

        $pages = array('index.php', 'api_login', 'authenticate_api', 'major_strokes', 'authenticate_admin', 'documents_login_view', 'document_admin', 'authenticate_document', 'bank_admin', 'authenticate_bank', 'agent_login', 'authenticate_agent');
        if (in_array($substr, $pages)) {
            
        } else {
            if (isset($data) && $data === TRUE) {
                
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
        redirect("/");
    }

}
