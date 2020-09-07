<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorpage extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('crud');

	}
	public function index(){
        $this->output->set_status_header('404');
        $data = array();
		$this->theme->display_user('user/404', 'Halaman tidak ditemukan', $data);
	}
	public function mt(){
		$kategori = $this->crud->get('category')->result_array();
		foreach($kategori as $cat):
			$permalink = $this->permalink($cat['category_name']);
			$data['url'] = $permalink;
			$res = $this->crud->update('category', $data, ['id' => $cat['id']]);
			$status = $res == true ? 'Berhasil' : 'Gagal';
			echo $cat['category_name'].' -> '.$permalink.' => '.$status.'<br>';
			unset($data['url']);
		endforeach;
	}
	public function ph(){
		$kategori = $this->crud->get('perusahaan')->result_array();
		foreach($kategori as $cat):
			$permalink = $this->permalink($cat['perusahaan_name']);
			$data['url'] = $permalink;
			$res = $this->crud->update('perusahaan', $data, ['id' => $cat['id']]);
			$status = $res == true ? 'Berhasil' : 'Gagal';
			echo $cat['perusahaan_name'].' -> '.$permalink.' => '.$status.'<br>';
			unset($data['url']);
		endforeach;
	}
	public function id(){
		$kategori = $this->crud->get('industri')->result_array();
		foreach($kategori as $cat):
			$permalink = $this->permalink($cat['industri_name']);
			$data['url'] = $permalink;
			$res = $this->crud->update('industri', $data, ['id' => $cat['id']]);
			$status = $res == true ? 'Berhasil' : 'Gagal';
			echo $cat['industri_name'].' -> '.$permalink.' => '.$status.'<br>';
			unset($data['url']);
		endforeach;
	}
	public function kab(){
		$kategori = $this->crud->get('kabupaten')->result_array();
		foreach($kategori as $cat):
			$permalink = $this->permalink($cat['nama']);
			$data['url'] = $permalink;
			$res = $this->crud->update('kabupaten', $data, ['id_kab' => $cat['id_kab']]);
			$status = $res == true ? 'Berhasil' : 'Gagal';
			echo $cat['nama'].' -> '.$permalink.' => '.$status.'<br>';
			unset($data['url']);
		endforeach;
	}
	public function prov(){
		$kategori = $this->crud->get('provinsi')->result_array();
		foreach($kategori as $cat):
			$permalink = $this->permalink($cat['nama']);
			$data['url'] = $permalink;
			$res = $this->crud->update('provinsi', $data, ['id_prov' => $cat['id_prov']]);
			$status = $res == true ? 'Berhasil' : 'Gagal';
			echo $cat['nama'].' -> '.$permalink.' => '.$status.'<br>';
			unset($data['url']);
		endforeach;
	}
	public function permalink($str){
		$str = strtolower($str);
		$str = trim($str);
		$str = str_replace(' ', '-', $str);
		$str = str_replace('.', '', $str);
		$str = str_replace('/', '', $str);
		return $str;
	}
}