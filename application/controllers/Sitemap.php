<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('msitemap');
    }
    public function index(){
        $data['post'] = $this->msitemap->post(20000,0);
		$this->theme->display_user('user/sitemap', 'Sitemap', $data);
    }
	public function post(){
        $data['post'] = $this->msitemap->post(20000,0);
        header('Content-type:application/xml');
        $this->load->view('sitemap/post', $data);
    }
    public function kategori(){
        $data = array();
        header('Content-type:application/xml');
        $this->load->view('sitemap/kategori', $data);
    }
}
