<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorpage extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('crud');
		$this->load->model('mloker');
		$this->load->model('mpencarian');
        $this->load->library('pagination');

	}
	public function index(){
        $this->output->set_status_header('404');
        $data = array();
		$this->theme->display_user('user/404', 'Halaman tidak ditemukan', $data);
    }
}