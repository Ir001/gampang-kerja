<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Datatables_kategori extends CI_Model{
        public function filter($search, $limit, $start, $order_field, $order_ascdesc){
            $this->db->like('category_name', $search); 
            $this->db->order_by($order_field, $order_ascdesc); 
            $this->db->limit($limit, $start); 
            return $this->db->get('category')->result_array();
        }
        public function count_all(){
            return $this->db->count_all('category');
        }
        public function count_filter($search){
            $this->db->like('category_name', $search); 
            return $this->db->get('category')->num_rows();
        }

    }
?>