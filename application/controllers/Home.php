<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->theme->display_user('user/landing', 'Lowongan Kerja');
	}
	public function post(){
		$this->theme->display_user('user/single', 'Single Post');
	}
	public function category(){
		$this->theme->display_user('user/category', 'Kategori');
	}
	public function admin(){
		$this->theme->display_admin(NULL, 'Dashboard');
	}
}
