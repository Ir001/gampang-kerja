<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Mapi extends CI_Model{
        public function cek_perusahaan($perusahaan, $url){
            return $this->db->get_where('perusahaan', ['perusahaan_name' => $perusahaan, 'url' => $url]);
        }
        public function cek_industri($industri, $url){
            return $this->db->get_where('industri ', ['industri_name' => $industri  , 'url' => $url]);
        }
        public function cek_kategori($category, $url){
            return $this->db->get_where('category ', ['url' => $url]);
        }
        public function create_industri($industri=array()){
            $this->db->insert('industri', $industri);
            return $this->db->insert_id();
        }
        public function create_perusahaan($perusahaan=array()){
            $this->db->insert('perusahaan', $perusahaan); 
            return $this->db->insert_id();
        }
        public function create_kategori($category=array()){
            $this->db->insert('category', $category);
            return $this->db->insert_id();
        }
    }
?>