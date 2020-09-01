<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('msitemap');
    }
    public function index(){
        header('Content-type:application/xml');
        $this->load->view('sitemap/sitemap');
    }
    public function page(){
        header('Content-type:application/xml');
        $this->load->view('sitemap/page');
    }
	public function post($page=1){
        $limit = 49000; 
        $offset = ($page > 1) ? ($page*$limit) - $page:0;
        $data['post'] = $this->msitemap->post($limit,$offset);
        header('Content-type:application/xml');
        $this->load->view('sitemap/post', $data);
    }
    public function kategori(){
        $data['post'] = $this->msitemap->kategori(40000,0);
        header('Content-type:application/xml');
        $this->load->view('sitemap/category', $data);
    }
    public function perusahaan($page=1){
        $limit = 49000; 
        $offset = ($page > 1) ? ($page*$limit) - $page:0;
        $data['post'] = $this->msitemap->perusahaan($limit,$offset);
        header('Content-type:application/xml');
        $this->load->view('sitemap/perusahaan', $data);
    }
}
