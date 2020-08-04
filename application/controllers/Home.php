<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('crud');
		$this->load->model('mloker');
		$this->load->model('mpencarian');
        $this->load->library('pagination');

	}
	public function index(){
        $data['result'] = $this->mpencarian->get();
        $data['terbaru'] = $this->mpencarian->get(8,4);
        $data['category'] = $this->mloker->popular_category();
		$this->theme->display_user('user/landing', 'Info Lowongan Kerja di Indonesia', $data);
	}
	public function post($perusahaan=null, $permalink=null){
		$check = $this->crud->detail('loker', ['permalink'=> $permalink])->num_rows();
		if ($check >= 1) {
			// $data['post'] = $this->crud->detail('loker', ['permalink'=> $permalink])->row_array();
			$data['post'] = $this->mloker->get($permalink);
			$data['sejenis'] = $this->mloker->get_by_category($data['post']['category_name']);
			$this->theme->display_user('user/single', $data['post']['title'].' '.$data['post']['perusahaan_name'], $data);
		} 
		// echo $permalink;
	}
	public function category($category, $rowno=0){
		$permalink = $category;
		$category = str_replace('-', ' ', $category);
		// Row per page
		$rowperpage = 5;
		// Row position
		if($rowno != 0){
				$rowno = ($rowno-1) * $rowperpage;
		}                
		// All records count
		$allcount = $this->mpencarian->count_by_category($category);

		// Get records
		$users_record = $this->mpencarian->get_by_category($rowno,$rowperpage,$category);
		
		// Pagination Configuration
		$config['base_url'] = base_url('kategori/'.$permalink);
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-sm justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		// Initialize
		$this->pagination->initialize($config);
		// Data                
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;
		$data['category_name'] = $category;
		$data['terbaru'] = $this->mpencarian->get();
        $data['category'] = $this->mloker->popular_category();
		$this->theme->display_user('user/category', 'Kategori Lowongan Kerja', $data);
	}
	public function job(){
		$this->theme->display_user('user/list', 'Loker');
	}
	public function admin(){
		$this->theme->display_admin(NULL, 'Dashboard');
	}
}
