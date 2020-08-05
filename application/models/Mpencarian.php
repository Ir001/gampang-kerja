<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Mpencarian extends CI_Model{
        public function get($limit=4, $offset=0){
            $this->db->select('loker.id, loker.title, loker.permalink, loker.description as loker_description, category_name, kabupaten.nama as nama_kabupaten, provinsi.nama as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            $this->db->where('isPublished', 1);
            $this->db->limit($limit, $offset); 
            $this->db->order_by('loker.posted_at DESC');
            return $this->db->get()->result_array();
        }
        public function getData($rowno, $rowperpage, $search="", $kota=""){
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.nama as nama_kabupaten, provinsi.nama as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($kota != '') {
                $this->db->like('kabupaten.nama', $kota);
                $this->db->or_like('provinsi.nama', $kota);
            }
            if ($search != '') {
                $this->db->or_like('loker.title', $search);
                $this->db->or_like('category_name', $search);
                $this->db->or_like('perusahaan.perusahaan_name', $search);
            }
            $this->db->where('isPublished', 1);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('category_name ASC, perusahaan_name DESC');
            return $this->db->get()->result_array();
        }
        public function getrecordCount($search="", $kota=""){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($kota != '') {
                $this->db->like('kabupaten.nama', $kota);
                $this->db->or_like('provinsi.nama', $kota);
            }
            if ($search != '') {
                $this->db->or_like('loker.title', $search);
                $this->db->or_like('perusahaan.perusahaan_name', $search);
            }
            $this->db->where('isPublished', 1);
            $query = $this->db->get();
            $result = $query->result_array();        
            return $result[0]['allcount'];
        }
        public function get_by_category($rowno, $rowperpage, $category){
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.nama as nama_kabupaten, provinsi.nama as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($category != '') {
                $this->db->like('category_name', $category);
            }
            $this->db->where('isPublished', 1);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('category_name ASC, perusahaan_name DESC');
            return $this->db->get()->result_array();
        }
        public function count_by_category($category){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($category != '') {
                $this->db->like('category_name', $category);
            }
            $this->db->where('isPublished', 1);
            $query = $this->db->get();
            $result = $query->result_array();        
            return $result[0]['allcount'];
        }
        public function get_by_perusahaan($rowno, $rowperpage, $perusahaan){
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.nama as nama_kabupaten, provinsi.nama as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($perusahaan != '') {
                $this->db->like('perusahaan_name', $perusahaan);
            }
            $this->db->where('isPublished', 1);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('category_name ASC, perusahaan_name DESC');
            return $this->db->get()->result_array();
        }
        public function count_by_perusahaan($perusahaan){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($perusahaan != '') {
                $this->db->like('perusahaan_name', $perusahaan);
            }
            $this->db->where('isPublished', 1);
            $query = $this->db->get();
            $result = $query->result_array();        
            return $result[0]['allcount'];
        }
        public function get_by_lokasi($rowno, $rowperpage, $lokasi){
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.nama as nama_kabupaten, provinsi.nama as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($lokasi != '') {
                $this->db->like('kabupaten.nama', $lokasi);
                $this->db->or_like('provinsi.nama', $lokasi);
            }
            $this->db->where('isPublished', 1);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('perusahaan_name ASC, nama_provinsi DESC');
            return $this->db->get()->result_array();
        }
        public function count_by_lokasi($lokasi){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id_kab');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id_prov');
            if ($lokasi != '') {
                $this->db->like('kabupaten.nama', $lokasi);
                $this->db->or_like('provinsi.nama', $lokasi);
            }
            $this->db->where('isPublished', 1);
            $query = $this->db->get();
            $result = $query->result_array();        
            return $result[0]['allcount'];
        }
        
    }
?>