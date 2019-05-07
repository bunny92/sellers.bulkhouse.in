<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_crm extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        date_default_timezone_set('Asia/Kolkata');
    }

     public function get_crm_id($email) {
        $this->db->select('crm_id');
        $this->db->from('crm_cust');
        $this->db->where(array('crm_cust.email' => $email));
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $res) {
            return $res->crm_id;
        }
    }

    // ------Update Register_model--------

    public function register($email, $mobile, $market) {
        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        //function to make cURL request
        //login ---------------------------------------------
        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);

        //get session id
        $session_id = $login_result->id;

        //create account -------------------------------------
        $set_entry_parameters = array(
            //session id
            "session" => $session_id,
            //The name of the module from which to retrieve records.
            "module_name" => "ven_Vendor",
            //Record attributes
            "name_value_list" => array(
                array("name" => "venregstage_c", "value" => "In Active"),
                array("name" => "registration_c", "value" => "Not Activated"),
                array("name" => "registration_type_c", "value" => "" . $market . ""),
                array("name" => "email1", "value" => "" . $email . ""),
                array("name" => "phone_office", "value" => "" . $mobile . "")
            ),
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);

        return $set_entry_result->id;
    }

    // ------Update basicprofile_model--------

    public function update_basicprofile($crm_id, $first_name, $last_name, $company, $firm) {
        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        //function to make cURL request
        //login ---------------------------------------------
        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "venregstage_c", "value" => "Active"),
                array("name" => "vendor_type_c", "value" => "Register"),
                array("name" => "registration_c", "value" => "Account Activated"),
                array("name" => "firmtype_c", "value" => "" . $firm . ""),
                array("name" => "name", "value" => "" . $company . ""),
                array("name" => "first_name_c", "value" => "" . $first_name . ""),
                array("name" => "last_name_c", "value" => "" . $last_name . ""),
                array("name" => "assigned_user_id", "value" => "b1018f0f-5762-7765-d74b-5645790c8f9a")
            ),
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);

        return $set_entry_result->id;
    }

// ------Update Businessprofile_model--------

    public function update_businessprofile($crm_id, $registration_category, $contact_office_landline, $contact_address, $contact_area, $contact_city, $contact_state, $contact_district, $contact_pincode, $disp_office_landline, $disp_office_address, $disp_area, $disp_city, $disp_state, $disp_district, $disp_pincode) {
        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "venregstage_c", "value" => "Active"),
                array("name" => "registration_category_c", "value" => $registration_category),
                array("name" => "office_landline_1_c", "value" => $contact_office_landline),
                array("name" => "adress_c", "value" => $contact_address),
                array("name" => "country_c", "value" => "India"),
                array("name" => "city_c", "value" => $contact_city),
                array("name" => "state_c", "value" => $contact_state),
                array("name" => "acccon_con_adress_pincode_c", "value" => $contact_pincode),
                array("name" => "mobile_3_c", "value" => $disp_office_landline),
                array("name" => "city_cont_c", "value" => $disp_city),
                array("name" => "address_c", "value" => $disp_office_address),
                array("name" => "adress_con_postalcode_c", "value" => $disp_pincode),
                array("name" => "assigned_user_id", "value" => "b1018f0f-5762-7765-d74b-5645790c8f9a")
            )
        );
        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update Businessinfo_model--------

    public function update_businessinfo($crm_id, $year, $no_of_employees, $turn_over, $certificate, $contact_person, $contact_email, $contact_phone) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "profile_c", "value" => "Submitted"),
                array("name" => "venregstage_c", "value" => "Active"),
                //array("name" =>"website", "value" =>$website),
                array("name" => "year_established_c", "value" => $year),
                array("name" => "no_of_employee_c", "value" => $no_of_employees),
                array("name" => "turn_over_c", "value" => $turn_over),
                array("name" => "quality_certifiacation_c", "value" => $certificate),
                array("name" => "contact_person_name_c", "value" => $contact_person),
                array("name" => "mobile_4_c", "value" => $contact_email),
                array("name" => "email_id_c", "value" => $contact_phone),
                array("name" => "assigned_user_id", "value" => "b1018f0f-5762-7765-d74b-5645790c8f9a")
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update Bank_model--------

    public function update_Bank_credentials($crm_id, $account_name, $account_number, $bank_name, $branch_name, $ifcs) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "bank_verification_c", "value" => "Submitted"),
                array("name" => "venregstage_c", "value" => "Active"),
                array("name" => "acc_bank_account_name_c", "value" => "" . $account_name . ""),
                array("name" => "bank_account_number_c", "value" => "" . $account_number . ""),
                array("name" => "name_of_the_bank_c", "value" => "" . $bank_name . ""),
                array("name" => "branch_name_c", "value" => "" . $branch_name . ""),
                array("name" => "ifsc_code_c", "value" => "" . $ifcs . "")
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    public function update_product_cat($crm_id, $product) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "product_category_c", "value" => $product)
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update Pan_model--------

    public function update_pan($crm_id, $pan) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "documentation_c", "value" => "Pan Submited"),
                array("name" => "company_pan_c", "value" => $pan)
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update company pan model--------

    public function update_company_pan($crm_id, $company_pan) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "documentation_c", "value" => "Company Pan Submited"),
                array("name" => "company_pan_c", "value" => "" . $company_pan . ""),
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update photo id model--------

    public function update_photoid($crm_id, $photoid) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "documentation_c", "value" => "Photo ID Submited"),
                array("name" => "photo_id_of_promoter_c", "value" => $photoid),
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update Vat Cst model--------

    public function update_vatcst($crm_id, $vat_cst) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "documentation_c", "value" => "VAT / CST Submited"),
                array("name" => "vat_no_c", "value" => $vat_cst),
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update Cancel Cheque model--------

    public function update_cancel($crm_id) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "venregstage_c", "value" => "Documents Submited"),
                array("name" => "documentation_c", "value" => "Documents Submited"),
                array("name" => "cancelled_cheque_c", "value" => "Submitted"),
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update cenvat model--------

    public function update_cenvat($crm_id) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;

        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "ven_Vendor",
            "name_value_list" => array(
                //Here Mention ID Of Record want to be update
                array("name" => "id", "value" => $crm_id),
                array("name" => "registered_cenvat_c", "value" => "Yes"),
            )
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
    }

    // ------Update Register_model--------

    public function enquiry_form($email, $first_name, $last_name, $phone, $category, $message) {

        $url = "http://161.202.21.7/bulkhouse/dev/service/v4_1/rest.php";
        $username = "vivek";
        $password = "Simplecrm@123";

        $login_parameters = array(
            "user_auth" => array(
                "user_name" => $username,
                "password" => md5($password),
                "version" => "1"
            ),
            "application_name" => "RestTest",
            "name_value_list" => array(),
        );

        $login_result = $this->call("login", $login_parameters, $url);
        $session_id = $login_result->id;
        $set_entry_parameters = array(
            "session" => $session_id,
            "module_name" => "SE_Sales_Enquiries",
            "name_value_list" => array(
                'name' => "" . $category . "",
                'first_name_c' => "" . $first_name . "",
                'last_name_c' => "" . $last_name . "",
                'phone_c' => "" . $phone . "",
                'email_c' => "" . $email . "",
                'productcategory_c' => "" . $category . "",
                'type' => "" . $message . "",
                'description' => "" . $message . "",
                'source_c' => 'VWE',
                'resolution_se_c' => 'Testing remarks',
                'state_c' => 'Open',
                'status_se_c' => 'New',
                'assigned_user_id' => 'b1018f0f-5762-7765-d74b-5645790c8f9a')
        );

        $set_entry_result = $this->call("set_entry", $set_entry_parameters, $url);
        return $set_entry_result->id;
    }

    public function call($method, $parameters, $url) {
        ob_start();
        $curl_request = curl_init();

        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        $jsonEncodedData = json_encode($parameters);

        $post = array(
            "method" => $method,
            "input_type" => "JSON",
            "response_type" => "JSON",
            "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();

        return $response;
    }

}