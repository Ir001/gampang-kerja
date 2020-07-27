<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Mlogin extends CI_Model{
        public function is_valid($email){
            return $this->db->get_where('admin', ['email' => $email]);
        }
        public function log($email){
            $this->db->set('last_login', date('Y-m-d H:i:s'));
            $this->db->where('email', $email);
            $this->db->update('admin');
            return $this->db->affected_rows();
        }
        public function detail($id){
            return $this->db->get_where('admin', ['id'=> $id])->row_array();
        }
    }
?>