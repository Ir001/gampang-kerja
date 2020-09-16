<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Mpencarian extends CI_Model{
        public function get($limit=4, $offset=0){ 
            $this->db->select('loker.id, loker.title, loker.permalink, loker.description as loker_description, category_name, kabupaten.kabupaten_name as nama_kabupaten, provinsi.provinsi_name as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo, perusahaan.url, category.url as category_url, kabupaten.url as kabupaten_url, provinsi.url as provinsi_url');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            $this->db->where('isPublished', 1);
            $this->db->order_by('loker.id DESC');
            $this->db->limit($limit, $offset); 
            return $this->db->get()->result_array();
        }
        public function getData($rowno, $rowperpage, $search="", $kota=""){
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.kabupaten_name as nama_kabupaten, provinsi.provinsi_name as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo, perusahaan.url, category.url as category_url, kabupaten.url as kabupaten_url, provinsi.url as provinsi_url');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            if ($kota != '') {
                $this->db->like('kabupaten.kabupaten_name', $kota);
                $this->db->or_like('provinsi.provinsi_name', $kota);
            }
            if ($search != '') {
                $this->db->or_like('loker.title', $search);
                $this->db->or_like('category_name', $search);
                $this->db->or_like('perusahaan.perusahaan_name', $search);
            }
            $this->db->where('isPublished', 1);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('loker.posted_at DESC');
            return $this->db->get()->result_array();
        }
        public function getrecordCount($search="", $kota=""){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            if ($kota != '') {
                $this->db->like('kabupaten.kabupaten_name', $kota);
                $this->db->or_like('provinsi.provinsi_name', $kota);
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
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.kabupaten_name as nama_kabupaten, provinsi.provinsi_name as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo, perusahaan.url, category.url as category_url, kabupaten.url as kabupaten_url, provinsi.url as provinsi_url');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            $this->db->where(['category.url' => $category, 'isPublished' => 1]);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('posted_at DESC');
            return $this->db->get()->result_array();
        }
        public function count_by_category($category){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            $this->db->where(['category.url' => $category, 'isPublished' => 1]);
            $query = $this->db->get();
            $result = $query->result_array();        
            return $result[0]['allcount'];
        }
        public function get_by_perusahaan($rowno, $rowperpage, $perusahaan){
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.kabupaten_name as nama_kabupaten, provinsi.provinsi_name as nama_provinsi, industri.industri_name, perusahaan_name, perusahaan.logo, perusahaan.url, category.url as category_url, kabupaten.url as kabupaten_url, provinsi.url as provinsi_url');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            $this->db->where(['perusahaan.url' => $perusahaan, 'isPublished' => 1]);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('posted_at DESC');
            return $this->db->get()->result_array();
        }
        public function count_by_perusahaan($perusahaan){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            $this->db->where(['perusahaan.url' => $perusahaan, 'isPublished' => 1]);
            $query = $this->db->get();
            $result = $query->result_array();        
            return $result[0]['allcount'];
        }
        public function get_by_lokasi($rowno, $rowperpage, $lokasi){
            $this->db->select('loker.id, loker.permalink, loker.title, category_name, kabupaten.kabupaten_name as nama_kabupaten, provinsi.provinsi_name as nama_provinsi, industri_name, perusahaan_name, perusahaan.logo, perusahaan.url, category.url as category_url, kabupaten.url as kabupaten_url, provinsi.url as provinsi_url');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            $this->db->where('kabupaten.url', $lokasi);
            $this->db->or_where('provinsi.url', $lokasi);
            $this->db->where('isPublished', 1);
            $this->db->limit($rowperpage, $rowno); 
            $this->db->order_by('posted_at DESC');
            return $this->db->get()->result_array();
        }
        public function count_by_lokasi($lokasi){
            $this->db->select('count(*) as allcount');
            $this->db->from('loker');
            $this->db->join('category', 'loker.category_id = category.id');
            $this->db->join('perusahaan', 'loker.perusahaan_id = perusahaan.id');
            $this->db->join('industri', 'perusahaan.industri_id = industri.id');
            $this->db->join('kabupaten', 'loker.kab_id = kabupaten.id');
            $this->db->join('provinsi', 'loker.prov_id = provinsi.id');
            $this->db->where('kabupaten.url', $lokasi);
            $this->db->or_where('provinsi.url', $lokasi);
            $query = $this->db->get();
            $result = $query->result_array();        
            return $result[0]['allcount'];
        }
        
    }
?>