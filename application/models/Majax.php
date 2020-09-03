<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Majax extends CI_Model{
        public function industri($q){
            $this->db->select('id, industri_name');
            $this->db->like('industri_name', $q);
            $this->db->order_by('id DESC');
            return $this->db->get('industri')->result_array();
        }
        public function perusahaan($q){
            $this->db->select('id, perusahaan_name');
            $this->db->like('perusahaan_name', $q);
            $this->db->order_by('id DESC');
            return $this->db->get('perusahaan')->result_array();
        }
        public function kategori($q){
            $this->db->select('id, category_name');
            $this->db->like('category_name', $q);
            $this->db->order_by('id DESC');
            return $this->db->get('category')->result_array();
        }
    }
?>