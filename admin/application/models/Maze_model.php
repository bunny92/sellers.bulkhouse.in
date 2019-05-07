<?php

class Maze_model extends CI_Model {

    public function magento_create_seller($email, $firstname, $lastname, $password_sec, $market, $pincode) {
        try {
            $client = new SoapClient('http://bulk.house/api/soap/?wsdl');
            $session = $client->login('inhouse_developer', '3125582');
            $result = $client->call($session, 'customer.create', array(array(
                    'email' => $email,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'password' => $password_sec,
                    'seller_zipcode' => $pincode,
                    'seller_type' => $market,
                    'website_id' => 1,
                    'store_id' => 1,
                    'group_id' => 4
            )));

            return $result ;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    
      public function magento_create_seller_dup($email, $firstname, $lastname, $password_sec, $market, $pincode) {
          try {
            $client = new SoapClient('http://bulk.house/api/soap/?wsdl');
            $session = $client->login('inhouse_developer', '3125582');
            $result = $client->call($session, 'customer.create', array(array(
                    'email' => $email,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'password' => $password_sec,
                    'seller_zipcode' => $pincode,
                    'seller_type' => $market,
                    'website_id' => 1,
                    'store_id' => 1,
                    'group_id' => 4
            )));

          return $result ; } catch (Exception $ex) {
              return $ex->getMessage();
              
          }
        
    }

}
