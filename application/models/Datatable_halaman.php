<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Datatable_halaman extends CI_Model{
        public function filter($search, $limit, $start, $order_field, $order_ascdesc){
            $this->db->like('title', $search); 
            $this->db->order_by($order_field, $order_ascdesc); 
            $this->db->limit($limit, $start); 
            return $this->db->get('page')->result_array();
        }
        public function count_all(){
            return $this->db->count_all('page');
        }
        public function count_filter($search){
            $this->db->like('title', $search);
            return $this->db->get('page')->num_rows();
        }

    }
?>