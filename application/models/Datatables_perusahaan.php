<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Datatables_perusahaan extends CI_Model{
        public function filter($search, $limit, $start, $order_field, $order_ascdesc){
            $this->db->like('perusahaan_name', $search); 
            $this->db->or_like('website', $search);
            $this->db->order_by($order_field, $order_ascdesc); 
            $this->db->limit($limit, $start); 
            return $this->db->get('perusahaan')->result_array();
        }
        public function count_all(){
            return $this->db->count_all('perusahaan');
        }
        public function count_filter($search){
            $this->db->like('perusahaan_name', $search); 
            $this->db->or_like('website', $search); 
            return $this->db->get('perusahaan')->num_rows();
        }

    }
?>