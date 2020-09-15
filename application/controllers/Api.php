<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('mapi');
        $this->load->model('crud');
    }
    public function index_get(){
        $data = array();
        $this->output->set_status_header('404');
        $this->theme->display_user('user/404', 'Halaman tidak ditemukan', $data);
    }
    public function lowongan_post(){
        $kategori = $this->post('kategori');
        $perusahaan['perusahaan_name'] = $this->post('perusahaan');
        $perusahaan['industri'] = $this->post('industri');
        $perusahaan['logo'] = $this->post('logo');
        $perusahaan['alamat_perusahaan'] = $this->post('alamat_perusahaan');
        $perusahaan['description'] = $this->post('detail_perusahaan');
        $perusahaan['why_join_us'] = $this->post('why_join_us');
        $data['perusahaan_id'] = $this->check_perusahaan($perusahaan);
        $data['category_id'] = $this->check_category($kategori);
        $data['apply_job'] = $this->post('apply_job');
        $data['title'] = $this->post('judul');
        $data['permalink'] = $this->pretty_url($data['title']);
        $data['description'] = $this->post('deskripsi_pekerjaan');
        $data['alamat'] = $this->post('alamat_kerja');
        $data['deadline'] = $this->post('deadline');
        $data['posted_at'] = date('Y-m-d H:i:s');
        $data['isPublished'] = 1;
        $cek = $this->check_postingan($data['perusahaan_id'], $data['permalink']);
        if($cek){
            $lokasi = $perusahaan['alamat_perusahaan'] != null ? $this->filter_kota($perusahaan['alamat_perusahaan']) : $data['alamat'];
            $data['kab_id'] = $lokasi['kab_id'];
            $data['prov_id'] = $lokasi['prov_id'];
            $insert = $this->crud->insert('loker', $data);
            $response['status'] = true;
            $response['message'] = 'Lowongan berhasil diposting!';
        }else{
            $response['status'] = false;
            $response['message'] = 'Lowongan sudah pernah diposting!';
        }
        $this->response( $response, 200 );        
    }
    public function check_postingan($perusahaan_id, $permalink){
        $cek = $this->crud->detail('loker', ['perusahaan_id' => $perusahaan_id, 'permalink' => $permalink])->num_rows();
        if($cek>=1){
            return false;
        }else{
            return true;
        }
    }
    public function check_perusahaan($perusahaan=array()){
        $name = $perusahaan['perusahaan_name'];
        $perusahaan['url'] = $this->pretty_url($perusahaan['perusahaan_name']);
        $check_name = $this->mapi->cek_perusahaan($name, $perusahaan['url']);
        if($check_name->num_rows() >= 1){
            $data = $check_name->row_array();
            $id = $data['id'];
        }else{
            $industri = $perusahaan['industri'];
            $industri_url = $this->pretty_url($industri);
            $check_industri = $this->mapi->cek_industri($industri, $industri_url);
            if($check_industri->num_rows() >= 1){
                $data_industri = $check_industri->row_array();
                $industri_id = $data_industri['id'];
            }else{
                $data_industri['industri_name'] = $industri;
                $data_industri['url'] = $industri_url;
                $industri_id = $this->mapi->create_industri($data_industri);
            }
            unset($perusahaan['industri']);
            $id = $this->mapi->create_perusahaan($perusahaan);
        }
        return $id;
    }
    public function check_category($kategori){
        $url = $this->pretty_url($kategori);
        $check = $this->mapi->cek_kategori($kategori, $url);
        if($check->num_rows() >= 1){
            $data = $check->row_array();
            return $data['id'];
        }else{
            $category['category_name'] = $kategori;
            $category['url'] = $url;
            $category['icon'] = 'fas fa-building';
            return $this->mapi->create_kategori($category);
        }
    }
    public function pretty_url($str){
        $str = strtolower($str);
        $str = trim($str);
        $str = str_replace(' ','-', $str);
        $str = str_replace('/','', $str);
        $str = str_replace('(','', $str);
        $str = str_replace(')','', $str);
        $str = str_replace('--','-', $str);
        $str = str_replace('---','-', $str);
        $str = str_replace('.','', $str);
        $str = str_replace(',','', $str);
        $str = str_replace('_','', $str);
        $str = str_replace('?','', $str);
        $str = str_replace(';','', $str);
        $str = str_replace('`','', $str);
        $str = str_replace('*','', $str);
        $str = str_replace('&','', $str);
        $str = str_replace('%','', $str);
        $str = str_replace('#','', $str);
        $str = str_replace('@','', $str);
        $str = str_replace('!','', $str);
        return $str;
    }
    public function filter_kota($lokasi){
        $kota = $this->crud->get('kabupaten_new')->result_array(); /* Importan to Change */
        foreach ($kota as $data) {
            if(preg_match_all("/{$data['kabupaten_name']}/i", $lokasi,$out)){
                $response['kab_id'] = $data['id'];
                $response['prov_id'] = $data['provinsi_id'];
            }
            if(preg_match_all("/{$data['kabupaten_name']}/i", "kota ".$lokasi,$out)){
                $response['kab_id'] = $data['id'];
                $response['prov_id'] = $data['provinsi_id'];
            }

        }
        // if(empty($response)){
        //     $response['kab_id'] = 3173;
        //     $response['prov_id'] = 31;
        // }
        return $response;
    }
}