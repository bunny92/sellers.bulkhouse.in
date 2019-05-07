<?php

class Magento_Model extends CI_Model {

    public function get_mazeid($email) {
        $this->db->select('custid');
        $this->db->from('mag_cust');
        $this->db->where(array('mag_cust.email' => $email));
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as $res) {
            return $res->custid;
        }
    }

    public function magento_seller($email, $first_name, $last_name, $pwd, $market, $seller_zipcode) {
        $client = new SoapClient('http://bulk.house/api/soap/?wsdl');
        $session = $client->login('inhouse_developer', '3125582');
        $result = $client->call($session, 'customer.create', array(array(
                'email' => $email,
                'firstname' => $first_name,
                'lastname' => $last_name,
                'password' => $pwd,
                'seller_type' => $market,
                'seller_zipcode' => $seller_zipcode,
                'customerstatus' => 1,
                // 'seller_code' => $compid,
                'website_id' => 1,
                'store_id' => 1,
                'group_id' => 4
        )));

        return $result;
    }

    public function magento_update_password($custid, $new_password) {

        $client = new SoapClient('http://bulk.house/api/soap/?wsdl');

        $session = $client->login('inhouse_developer', '3125582');
        $result = $client->call($session, 'customer.update', array('customerId' => $custid,
            'customerData' => array('password_hash' => md5($new_password))));
        return $result;
    }

    public function magento_delete_seller($id) {

        $client = new SoapClient('http://bulk.house/index.php/api/soap/?wsdl'); // TODO : change url
        $session = $client->login('inhouse_developer', '3125582'); // TODO : change login and pwd if necessary

        $result = $client->call($session, 'customer.delete', $id);
        return $result;
    }

}

?>