<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Msitemap extends CI_Model{
        public function post($limit, $offset){
            $this->db->select('permalink, posted_at, perusahaan_name');
            $this->db->join('perusahaan', 'loker.perusahaan_id=perusahaan.id');
            $this->db->limit($limit, $offset);
            $this->db->order_by('posted_at', 'DESC');
            return $this->db->get('loker')->result_array();
        }
        public function kategori(){
            $this->db->select('category_name');
            return $this->db->get('loker')->result_array();
        }
        public function perusahaan(){
            $this->db->select('perusahaan_name');
            return $this->db->get('perusahaan')->result_array();
        }
    }
?>