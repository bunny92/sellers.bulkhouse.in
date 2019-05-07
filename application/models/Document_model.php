<?php

class Document_model extends CI_Model {

    private $id;
    private $table;
    private $view;

    public function __construct() {
        parent::__construct();
        $this->id = $this->session->userdata("id");
        $this->table = $this->get_table();
    }

    public function get_view() {
        return $this->view;
    }

    private function get_table() {
        if (($result = $this->db->select('firm')->where(['vendor_id' => $this->id])->get('basic_profile'))) {
            $row = $result->row();
            $id = $row->firm;
            if ($id === '1') {
                $this->view = "document_proprietor";
                return "vendor_proprietorship";
            } else if ($id === '2') {
                $this->view = "document_partner";
                return "vendor_partner";
            } else if ($id === '3') {
                $this->view = "document_pvt";
                return "vendor_pvt";
            }
        } else {
            return "";
        }
    }

    public function is_vendor_exists() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->select('id')->get($this->table))) {
            return $result->num_rows() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function get_document_status() {
      $verification_status = "no";

      if (($result = $this->db->select(['photo_status', 'vat_status', 'pan_status', 'cancel_status'])->where(['vendor_id' => $this->id])->get($this->table))) {
          if(($row = $result->row())) {
          if ($row->photo_status !== "N/A" && $row->vat_status !== "N/A" && $row->pan_status !== "N/A" && $row->cancel_status !== "N/A") {
              $verification_status = "yes";
          } else {
              $verification_status = "no";
          } } else {
              $verification_status = "no";
          }
      } else {
          $verification_status = "no";
      }

      return $verification_status;
    }


    public function insert_data() {
        $data = [
            'vendor_id' => $this->id
        ];
        if (($result = $this->db->insert($this->table, $data))) {
            return $this->db->insert_id() > 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function update_data($data) {
        if (($result = $this->db->where(['vendor_id' => $this->id])->update($this->table, $data))) {
            return $this->db->affected_rows() >= 0 ? "yes" : "no";
        } else {
            return "no";
        }
    }

    public function get_data() {
        if (($result = $this->db->where(['vendor_id' => $this->id])->get($this->table))) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function upload_pic_to_bucket($document_type) {
        if (isset($_FILES['pic']['name'])) {
            $file_name = $_FILES['pic']['name'];
            $file_tmp_name = $_FILES['pic']['tmp_name'];
            $ext = substr($file_name, strrpos($file_name, '.') + 1);
            include (APPPATH . "third_party/s3_config.php");
            $actual_image_name = 'bulkhouse' . '_' . 'vendor_' . $this->id . '_' . $document_type . '' . "." . $ext;
            if ($s3->putObjectFile($file_tmp_name, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                return 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
            } else {
                return "no";
            }
        } else {
            return "no";
        }
    }
    public function get_verification_status() {
        $verification_status = "no";

        if (($result = $this->db->select(['photo_status', 'vat_status', 'pan_status', 'cancel_status'])->where(['vendor_id' => $this->id])->get($this->table))) {
            if(($row = $result->row())) {
            if ($row->photo_status === "Approved" && $row->vat_status === "Approved" && $row->pan_status === "Approved" && $row->cancel_status === "Approved") {
                $verification_status = "yes";
            } else if($row->photo_status === "Rejected" || $row->vat_status === "Rejected" || $row->pan_status === "Rejected" || $row->cancel_status === "Rejected") {
                $verification_status = "reject";
            } else {
                $verification_status = "no";
            } } else {
                $verification_status = "no";
            }
        } else {
            $verification_status = "no";
        }

        return $verification_status;
    }


    public function get_content_pdf($url) {
      header('Content-type: application/pdf');
      $homepage = file_get_contents($url);
      print_r($homepage);
    }




}
