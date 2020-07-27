<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Datatable_iklan extends CI_Model{
        public function filter($search, $limit, $start, $order_field, $order_ascdesc){
            $this->db->like('posisi', $search); 
            $this->db->or_like('nama', $search); 
            $this->db->order_by($order_field, $order_ascdesc); 
            $this->db->limit($limit, $start); 
            return $this->db->get('iklan')->result_array();
        }
        public function count_all(){
            return $this->db->count_all('iklan');
        }
        public function count_filter($search){
            $this->db->like('posisi', $search); 
            $this->db->or_like('nama', $search); 
            return $this->db->get('iklan')->num_rows();
        }

    }
?>