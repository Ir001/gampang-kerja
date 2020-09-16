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
		$data['canonical'] = base_url();
        $data['result'] = $this->mpencarian->get(); 
        $data['terbaru'] = $this->mpencarian->get(8,4);
        $data['category'] = $this->mloker->popular_category();
		$this->theme->display_user('user/landing', 'Info Lowongan Kerja Terbaru di Indonesia', $data);
	}
	public function post($perusahaan=null, $permalink=null){
		$this->load->library('Tanggal');
		$perusahaan = trim(strip_tags($perusahaan));
		$permalink = trim(strip_tags($permalink));
		$check = $this->mloker->check_post($perusahaan, $permalink);
		if ($check->num_rows() >= 1) {
			$data_post = $check->row_array();
			$path = base_url(uri_string());
			if(!isset($_SESSION['viewed'][$path])){
				$_SESSION['viewed'][$path] = 1;
				$this->mloker->viewed($data_post['loker_id']);			
			}
			$data['post'] = $this->mloker->get($perusahaan, $permalink);
			$data['post']['posted_text'] = $this->tanggal->to_indonesia($data['post']['posted_at']);
			$data['post']['deadline_text'] = $this->tanggal->to_indonesia($data['post']['deadline']);
			$data['post']['expired'] = new DateTime() > new DateTime($data['post']['deadline']) ? true:false;
			$data['sejenis'] = $this->mloker->get_by_category($data['post']['category_name']);
			$data['description'] = 'Lowongan kerja '.$data['post']['title'].' di '.$data['post']['perusahaan_name'].' ('.$data['post']['kabupaten'].') '.substr(strip_tags($data['post']['loker_description']), 0, 75);
			$data['keyword'] = 'Lowongan Kerja '.$data['post']['title'].' di '.$data['post']['perusahaan_name'].', Lowongan '.$data['post']['category_name'].', Lowongan kerja '.$data['post']['kabupaten'].', '.$this->config->item('keyword');
			$this->theme->display_user('user/single', 'Lowongan '.$data['post']['title'], $data);
		}elseif($perusahaan != null && $permalink == null){
			redirect(base_url('perusahaan/'.$perusahaan));
		}else{
			$data = array();
			$this->output->set_status_header('404');
			$this->theme->display_user('user/404', 'Halaman tidak ditemukan', $data);
		}
	}
	public function category($category=null, $rowno=0){
		if($category == null):
			$data['canonical'] = base_url('kategori');
			$data['terbaru'] = $this->mpencarian->get();
			$data['category'] = $this->mloker->popular_category();
			$data['description'] = 'Informasi Lowongan Kerja diberbagai sektor industri di Indonesia. Info loker ini kami sajikan dari sumber yang terpercaya dan terbaru. Cari impian kerja Anda disini.';
			$data['keyword'] = $data['description'].$this->config->item('keyword');
			$data['title'] = 'Info Loker Diberbagai Sektor Industri';
			$this->theme->display_user('user/category', $data['title'], $data);
		else:
			$permalink = strtolower(strip_tags($category));
			$category = str_replace('-', ' ', $category);
			// Row per page
			$rowperpage = 5;
			// Row position
			if($rowno != 0){
				$rowno = ($rowno-1) * $rowperpage;
			}                
			// All records count
			$allcount = $this->mpencarian->count_by_category($permalink);
			if($allcount == 0):
				$data = array();
				$this->output->set_status_header('404');
				$this->theme->display_user('user/404', 'Halaman tidak ditemukan', $data);
			else:
				// Get records
				$users_record = $this->mpencarian->get_by_category($rowno,$rowperpage,$permalink);
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
				$data['canonical'] = base_url('kategori/'.$permalink);                
				$data['pagination'] = $this->pagination->create_links();
				$data['result'] = $users_record;
				$data['row'] = $rowno;
				$data['category_name'] = $category;
				$data['terbaru'] = $this->mpencarian->get();
				$data['category'] = $this->mloker->popular_category();
				// $data['description'] = $category == null ? 'Informasi Lowongan Kerja diberbagai sektor industri di Indonesia' : 'Daftar Lowongan Kerja Disektor '.ucwords($category);
				$data['description'] = $category == null ? 'Informasi Lowongan Kerja diberbagai sektor industri di Indonesia' : 'Berikut daftar lowongan kerja '.ucwords($category).' terbaru yang ada di Indonesia. Info loker ini kami sajikan dari sumber yang terpercaya dan terbaru. Cari impian kerja Anda disini.';
				$data['keyword'] = $data['description'].$this->config->item('keyword');
				$data['title'] = $category == null ? 'Info Loker Diberbagai Sektor Industri' : 'Lowongan '.ucwords($category);
				$this->theme->display_user('user/category', $data['title'], $data);
			endif;
		endif;
		
	}
	public function perusahaan($perusahaan=null, $rowno=0){
		$permalink = strtolower(strip_tags($perusahaan));
		$perusahaan = str_replace('-', ' ', $perusahaan);
		// Row per page
		$rowperpage = 5;
		// Row position
		if($rowno != 0){
				$rowno = ($rowno-1) * $rowperpage;
		}                
		// All records count
		$allcount = $this->mpencarian->count_by_perusahaan($permalink);
		if($allcount == 0):
			$data = array();
			$this->output->set_status_header('404');
			$this->theme->display_user('user/404', 'Halaman tidak ditemukan', $data);
		else:
			// Get records
			$users_record = $this->mpencarian->get_by_perusahaan($rowno,$rowperpage,$permalink);
			$industri = @$users_record[0]['industri_name'];
			
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
			$data['canonical'] = base_url('perusahaan/'.$permalink);                    
			$data['pagination'] = $this->pagination->create_links();
			$data['result'] = $users_record;
			$data['row'] = $rowno;
			$data['perusahaan_name'] = $perusahaan;
			$data['perusahaan'] = $this->crud->detail('perusahaan', ['url' => $permalink])->row_array();
			$data['terbaru'] = $this->mpencarian->get();
			$data['category'] = $this->mloker->popular_category();
			// $data['description'] = 'Info Lowongan Kerja '.strtoupper($perusahaan).' terbaru.';
			$data['description'] = 'Berikut info lowongan kerja di '.strtoupper($perusahaan).' terdapat banyak lowongan diberbagai posisi. Temukan impian karir Anda disini.';
			$data['keyword'] = 'Lowongan Kerja '.$perusahaan.', '.$this->config->item('site_name');
			$this->theme->display_user('user/perusahaan', 'Lowongan Kerja di '.strtoupper($perusahaan), $data);
		endif;
	}
	public function lokasi($lokasi=null, $rowno=0){
		$permalink = strtolower(strip_tags($lokasi));
		$lokasi = str_replace('-', ' ', $lokasi);
		// Row per page
		$rowperpage = 5;
		// Row position
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}                
		// All records count
		$allcount = $this->mpencarian->count_by_lokasi($permalink);
		if($allcount == 0):
			$data = array();
			$this->output->set_status_header('404');
			$this->theme->display_user('user/404', 'Halaman tidak ditemukan', $data);
		else:
			// Get records
			$users_record = $this->mpencarian->get_by_lokasi($rowno,$rowperpage,$permalink);
			
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
			$data['canonical'] = base_url('lokasi/'.$permalink);                    
			$data['pagination'] = $this->pagination->create_links();
			$data['result'] = $users_record;
			$data['row'] = $rowno;
			$data['lokasi'] = $lokasi;
			$data['terbaru'] = $this->mpencarian->get();
			$data['category'] = $this->mloker->popular_category();
			$data['description'] = $lokasi == null ? 'Informasi Lowongan Kerja diberbagai lokasi di Indonesia' : 'Informasi lowongan kerja '.ucwords($lokasi).' terbaru. Ada banyak info loker yang tersedia dari berbagai perusahaan industri yang ada di Indoensia.';
			$data['keyword'] = 'Loker '.$lokasi.', Lowongan Kerja '.$lokasi.'Info loker '.$lokasi.', '.$data['description'];
			$this->theme->display_user('user/lokasi', 'Lowongan Kerja di '.ucwords($lokasi), $data);
		endif;
	}
	public function page($permalink){
		$permalink = htmlspecialchars(strip_tags($permalink));
		$check = $this->mloker->get_page_num($permalink);
		if($check > 0){
			$data['canonical'] = base_url('page/'.$permalink);    
			$data['post'] = $this->mloker->get_page($permalink);
			$data['sejenis'] = $this->mpencarian->get();
			$data['description'] = substr(strip_tags($data['post']['content']),0,90);
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
}
