<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Mloker extends CI_Model{
        public function get($perusahaan, $permalink){
            $this->db->select('loker.*, loker.description as loker_description,category_name, industri_name,perusahaan.*,kabupaten.nama as kabupaten, provinsi.nama as provinsi, perusahaan.description as perusahaan_description');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            $this->db->where(['loker.permalink' => $permalink, 'perusahaan.url' => $perusahaan]);
            return $this->db->get()->row_array();
        }
        public function check_post($perusahaan, $permalink){
            $this->db->select('perusahaan.url, loker.permalink');
            $this->db->from('loker');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->where(['permalink' => $permalink, 'url' => $perusahaan]);
            return $this->db->get()->num_rows();
        }
        public function get_page($permalink){
            return $this->db->get_where('page', ['permalink' => $permalink, 'status' => 1])->row_array();
        }
        public function get_page_num($permalink){
            return $this->db->get_where('page', ['permalink' => $permalink, 'status' => 1])->num_rows();
        }
        public function get_by_category($category){
            $this->db->select('loker.*, loker.description as loker_description,category_name, industri_name,perusahaan.*,kabupaten.nama as kabupaten, provinsi.nama as provinsi, perusahaan.description as perusahaan_description');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            $this->db->where(['category_name' => $category]);
            $this->db->limit(5,0);
            $this->db->order_by('loker.posted_at', 'ASC');
            return $this->db->get()->result_array();
        }
        public function popular_category($jumlah=8){
            $this->db->select('category_name, icon, count(loker.category_id) as total');
            $this->db->from('loker');
            $this->db->join('category', 'category.id = loker.category_id');
            $this->db->limit($jumlah, 0);
            $this->db->group_by('category_id');
            $this->db->order_by('total','DESC');
            return $this->db->get()->result_array();
        }
    }
?>