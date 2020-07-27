<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
    private $user;
	public function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('crud');
        $this->info_user();
	}
	public function index(){
		$this->theme->display_admin('admin/dashboard', 'Dashboard');
    }
    public function perusahaan(){
        $data['menu'] = array('link' => '/manager', 'text' => 'User Management');
        $data['submenu'] = array(0 => 'Perusahaan');
        $data['industri'] = $this->crud->get('industri')->result_array();
        $this->theme->display_admin('admin/management_perusahaan', 'Management Perusahaan', $data); 
    }
    public function loker($page = NULL, $id = NULL){
		if($page == 'new'){
            $data['menu'] = array('link' => '/manager', 'text' => 'Postingan');
            $data['submenu'] = array(0 => 'Kelola Lowongan', 1 => 'Lowongan Baru');
            $data['perusahaan'] = $this->crud->get('perusahaan')->result_array();
            $data['provinsi'] = $this->crud->get('provinsi')->result_array();
            $data['kabupaten'] = $this->crud->get('kabupaten')->result_array();
            $data['kategori'] = $this->crud->get('category')->result_array();
            $data['industri'] = $this->crud->get('industri')->result_array();
            $this->theme->display_admin('admin/post_lowongan', 'Lowongan Kerja Baru', $data);
        }elseif($page == 'edit' && $id != NULL){
            $data['menu'] = array('link' => '/manager', 'text' => 'Postingan');
            $data['submenu'] = array(0 => 'Kelola Lowongan', 1 => 'Edit Lowongan');
            $data['postingan'] = $this->crud->detail('loker', ['id'=>$id])->row_array();
            $data['perusahaan'] = $this->crud->get('perusahaan')->result_array();
            $data['provinsi'] = $this->crud->get('provinsi')->result_array();
            $data['kabupaten'] = $this->crud->get('kabupaten')->result_array();
            $data['kategori'] = $this->crud->get('category')->result_array();
            $data['industri'] = $this->crud->get('industri')->result_array();
            $this->theme->display_admin('admin/edit_lowongan', 'Edit Lowongan Kerja', $data);
        }else{
            $data['menu'] = array('link' => '/manager', 'text' => 'Postingan');
            $data['submenu'] = array(0 => 'Kelola Lowongan');
            $this->theme->display_admin('admin/management_lowongan', 'Management Lowongan Kerja', $data);
        }
    }
    public function kategori(){
        $data['menu'] = array('link' => '/manager', 'text' => 'Postingan');
        $data['submenu'] = array(0 => 'Kelola Kategori');
        $this->theme->display_admin('admin/management_kategori', 'Management Kategori Loker', $data);
    }
    
    public function industri(){
        $data['menu'] = array('link' => '/manager', 'text' => 'Postingan');
        $data['submenu'] = array(0 => 'Kelola Industri');
        $this->theme->display_admin('admin/management_industri', 'Management Industri Loker', $data);
    }
    public function iklan(){
        $data['menu'] = array('link' => '/manager/iklan', 'text' => 'Iklan');
        $data['submenu'] = array(0 => 'Kelola Iklan');
        $this->theme->display_admin('admin/management_iklan', 'Management Iklan', $data);
    }
    public function halaman(){
        $data['menu'] = array('link' => '/manager/halaman', 'text' => 'Halaman');
        $data['submenu'] = array(0 => 'Halaman');
        $this->theme->display_admin('admin/management_halaman', 'Management Page', $data);
    }
    public function info_user(){
        $data = $this->mlogin->detail($_SESSION['admin']);
        $this->user = $data;
    }
    // pub
    public function logout(){
        unset($_SESSION['admin']);
        redirect('/admin/login');
    }
}
