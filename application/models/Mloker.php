<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Mloker extends CI_Model{
        public function get($permalink){
            $this->db->select('loker.*, loker.description as loker_description,category_name, industri_name,perusahaan.*, perusahaan.description as perusahaan_description');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            $this->db->where(['permalink' => $permalink]);
            return $this->db->get()->row_array();
        }
    }
?>