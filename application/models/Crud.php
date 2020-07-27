<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Crud extends CI_Model{
        public function get($table){
            return $this->db->get($table);
        }
        public function detail($table, $where){
            return $this->db->get_where($table, $where);
        }
        public function insert($table,$data){ 
            $this->db->insert($table, $data);
            return $this->db->affected_rows();
        }
        public function update($table, $data, $where){
            $this->db->where($where);
            $this->db->update($table, $data);
            return $this->db->affected_rows();
        }
        public function delete($table, $where){
            $this->db->where($where);
            $this->db->delete($table);
            return $this->db->affected_rows();
        }
    }
?>