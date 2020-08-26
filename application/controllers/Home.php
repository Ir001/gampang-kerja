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
		$this->load->library('Tanggal');
		$check = $this->crud->detail('loker', ['permalink'=> $permalink])->num_rows();
		if ($check >= 1) {
			// $data['post'] = $this->crud->detail('loker', ['permalink'=> $permalink])->row_array();
			
			$data['post'] = $this->mloker->get($permalink);
			$data['post']['posted_text'] = $this->tanggal->to_indonesia($data['post']['posted_at']);
			$data['post']['deadline_text'] = $this->tanggal->to_indonesia($data['post']['deadline']);
			$data['post']['expired'] = new DateTime() > new DateTime($data['post']['deadline']) ? true:false;
			$data['sejenis'] = $this->mloker->get_by_category($data['post']['category_name']);
			$data['description'] = 'Lowongan Kerja '.$data['post']['title'].' di '.$data['post']['perusahaan_name'].' ('.$data['post']['kabupaten'].') '.substr(strip_tags($data['post']['loker_description']), 0, 120);
			$data['keyword'] = 'Lowongan Kerja '.$data['post']['title'].' di '.$data['post']['perusahaan_name'].', Lowongan '.$data['post']['category_name'].', Lowongan kerja '.$data['post']['kabupaten'].', '.$this->config->item('keyword');
			$this->theme->display_user('user/single', 'Lowongan '.$data['post']['title'].' di '.$data['post']['perusahaan_name'], $data);
		} 
		// echo $permalink;
	}
	public function category($category=null, $rowno=0){
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
        $data['description'] = $category == null ? 'Informasi Lowongan Kerja diberbagai sektor industri di Indonesia' : 'Daftar Lowongan Kerja Disektor '.ucwords($category);
		$data['keyword'] = $data['description'].$this->config->item('keyword');
		$data['title'] = $category == null ? 'Info Loker Diberbagai Sektor Industri' : 'Lowongan '.ucwords($category);
		$this->theme->display_user('user/category', $data['title'], $data);
	}
	public function perusahaan($perusahaan=null, $rowno=0){
		$permalink = $perusahaan;
		$perusahaan = str_replace('-', ' ', $perusahaan);
		// Row per page
		$rowperpage = 5;
		// Row position
		if($rowno != 0){
				$rowno = ($rowno-1) * $rowperpage;
		}                
		// All records count
		$allcount = $this->mpencarian->count_by_perusahaan($perusahaan);

		// Get records
		$users_record = $this->mpencarian->get_by_perusahaan($rowno,$rowperpage,$perusahaan);
		
		// Pagination Configuration
		$config['base_url'] = base_url('perusahaan/'.$permalink);
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
		$data['perusahaan_name'] = $perusahaan;
		$data['terbaru'] = $this->mpencarian->get();
		$data['category'] = $this->mloker->popular_category();
		$data['description'] = 'Info Lowongan Kerja '.strtoupper($perusahaan).' terbaru.';
		$data['keyword'] = 'Lowongan Kerja '.$perusahaan.', '.$this->config->item('site_name');
		$this->theme->display_user('user/perusahaan', 'Lowongan Kerja di '.strtoupper($perusahaan), $data);
	}
	public function lokasi($lokasi=null, $rowno=0){
		$permalink = $lokasi;
		$lokasi = str_replace('-', ' ', $lokasi);
		// Row per page
		$rowperpage = 5;
		// Row position
		if($rowno != 0){
				$rowno = ($rowno-1) * $rowperpage;
		}                
		// All records count
		$allcount = $this->mpencarian->count_by_lokasi($lokasi);

		// Get records
		$users_record = $this->mpencarian->get_by_lokasi($rowno,$rowperpage,$lokasi);
		
		// Pagination Configuration
		$config['base_url'] = base_url('lokasi/'.$permalink);
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
		$data['lokasi'] = $lokasi;
		$data['terbaru'] = $this->mpencarian->get();
		$data['category'] = $this->mloker->popular_category();
		$data['description'] = $lokasi == null ? 'Informasi Lowongan Kerja diberbagai lokasi di Indonesia' : 'Daftar Lowongan Kerja di '.ucwords($lokasi);
		$data['keyword'] = 'Loker '.$lokasi.', Lowongan Kerja '.$lokasi.'Info loker '.$lokasi.', '.$data['description'];
		$this->theme->display_user('user/lokasi', 'Lowongan Kerja di '.ucwords($lokasi), $data);
	}
	public function page($permalink){
		$permalink = htmlspecialchars($permalink);
		$check = $this->mloker->get_page_num($permalink);
		if($check > 0){
			$data['post'] = $this->mloker->get_page($permalink);
			$data['sejenis'] = $this->mpencarian->get();
			$data['description'] = substr(strip_tags($data['post']['content']),0,120);
			$data['keyword'] = $data['post']['title'].' '.$this->config->item('site_name');
			$this->theme->display_user('user/page', ucwords($data['post']['title']), $data);
		}else{
			redirect(base_url());
		}
	}
	public function clear(){
		$confirm = $this->input->post('confirm', true);
		if($confirm == 1){
			unset($_SESSION['q']);
			unset($_SESSION['kota']);
		}
		header('Content-type:application/json');
		echo json_encode(['status' => true, 'message' => 'Riwayat berhasil dihapus!'], JSON_PRETTY_PRINT);
	}
	public function job(){
		$this->theme->display_user('user/list', 'Loker');
	}
	public function admin(){
		$this->theme->display_admin(NULL, 'Dashboard');
	}
}
