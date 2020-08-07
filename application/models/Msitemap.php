<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Msitemap extends CI_Model{
        public function post($limit, $offset){
            $this->db->select('permalink, posted_at, perusahaan_name');
            $this->db->join('perusahaan', 'loker.perusahaan_id=perusahaan.id');
            $this->db->limit($limit, $offset);
            $this->db->order_by('posted_at', 'DESC');
            return $this->db->get('loker')->result_array();
        }
        public function kategori($limit, $offset){
            $this->db->select('category_name, count(loker.category_id) as total');
            $this->db->join('category', 'category.id = loker.category_id');
            $this->db->limit($limit, $offset);
            $this->db->group_by('category_id');
            $this->db->order_by('total');
            return $this->db->get('loker')->result_array();
        }
        public function perusahaan($limit, $offset){
            $this->db->select('perusahaan_name');
            $this->db->limit($limit, $offset);

            return $this->db->get('perusahaan')->result_array();
        }
    }
?>