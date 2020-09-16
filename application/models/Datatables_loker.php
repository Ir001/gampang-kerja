<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Datatables_loker extends CI_Model{
        public function filter($search, $limit, $start, $order_field, $order_ascdesc){
            $this->db->select('loker.*, perusahaan.perusahaan_name, category.category_name, industri.industri_name, provinsi.provinsi_name');
            $this->db->join('perusahaan', 'perusahaan.id = loker.perusahaan_id');
            $this->db->join('category', 'category.id = loker.category_id');
            $this->db->join('industri', 'industri.id = perusahaan.industri_id');
            $this->db->join('provinsi', 'provinsi.id = loker.prov_id');
            $this->db->like('title', $search); 
            $this->db->or_like('permalink', $search);
            $this->db->order_by($order_field, $order_ascdesc); 
            $this->db->limit($limit, $start); 
            return $this->db->get('loker')->result_array();
        }
        public function count_all(){
            return $this->db->count_all('loker');
        }
        public function count_filter($search){
            $this->db->select('loker.*, perusahaan.perusahaan_name, category.category_name, industri.industri_name, provinsi.provinsi_name');
            $this->db->join('perusahaan', 'perusahaan.id = loker.perusahaan_id');
            $this->db->join('category', 'category.id = loker.category_id');
            $this->db->join('industri', 'industri.id = perusahaan.industri_id');
            $this->db->join('provinsi', 'provinsi.id = loker.prov_id');
            $this->db->like('title', $search); 
            $this->db->or_like('permalink', $search);
            return $this->db->get('loker')->num_rows();
        }

    }
?>