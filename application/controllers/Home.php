<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('crud');
		$this->load->model('mloker');
		$this->load->model('mpencarian');
	}
	public function index(){
        $data['result'] = $this->mpencarian->get();
        $data['terbaru'] = $this->mpencarian->get(8,4);
		$this->theme->display_user('user/landing', 'Lowongan Kerja', $data);
	}
	public function post($perusahaan=null, $permalink=null){
		$check = $this->crud->detail('loker', ['permalink'=> $permalink])->num_rows();
		if ($check >= 1) {
			// $data['post'] = $this->crud->detail('loker', ['permalink'=> $permalink])->row_array();
			$data['post'] = $this->mloker->get($permalink);
			$this->theme->display_user('user/single', $data['post']['title'], $data);
		}
		// echo $permalink;
	}
	public function category(){
		$this->theme->display_user('user/category', 'Kategori');
	}
	public function job(){
		$this->theme->display_user('user/list', 'Loker');
	}
	public function admin(){
		$this->theme->display_admin(NULL, 'Dashboard');
	}
}
