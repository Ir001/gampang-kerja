<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('crud');
        $this->load->model('mpencarian');
        $this->load->library('pagination');
	}
	public function index($rowno=0){
                $q = htmlspecialchars($this->input->post('q', true) != null ? $this->input->post('q', true) : @$_SESSION['q']);
                $kota = htmlspecialchars($this->input->post('kota', true) != null ? $this->input->post('kota', true) : @$_SESSION['kota']);
                $_SESSION['q'] = $q;
                $_SESSION['kota'] = $kota;
                // Row per page
                $rowperpage = 5;
                // Row position
                if($rowno != 0){
                        $rowno = ($rowno-1) * $rowperpage;
                }                
                // All records count
                $allcount = $this->mpencarian->getrecordCount($q, $kota);

                // Get records
                $users_record = $this->mpencarian->getData($rowno,$rowperpage,$q, $kota);
                
                // Pagination Configuration
                $config['base_url'] = base_url('job');
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
                $data['search'] = $q;
                $data['kota'] = $kota;
                $data['terbaru'] = $this->mpencarian->get();
                // Load view
                $this->theme->display_user('user/list', 'Hasil Pencarian '.$q. 'di Kota '.$kota, $data);
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
