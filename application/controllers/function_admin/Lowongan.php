<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {
    private $user;
	public function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('crud');
        $this->load->model('datatables_loker', 'dl');
        $this->info_user();
    }
    public function hapus(){
        $where['id'] = $this->input->post('loker_id', true);
        $response = $this->crud->delete('loker', $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menghapus lowongan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menghapus lowongan';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
	public function tambah(){
        $data['category_id'] = $this->input->post('category_id', true);
		$data['perusahaan_id'] = $this->input->post('perusahaan_id', true);
		$data['kab_id'] = $this->input->post('kab_id', true);
		$data['prov_id'] = $this->input->post('prov_id', true);
		$data['permalink'] = $this->input->post('permalink', true);
		$data['title'] = $this->input->post('judul', true);
		$data['alamat'] = $this->input->post('alamat', true);
        $data['description'] = $this->input->post('description', true);
        $data['isPublished'] = $this->input->post('status', true);
		$data['deadline'] = $this->input->post('deadline', true);
		$data['posted_at'] = date('Y-m-d H:i:s');
        $response = $this->crud->insert('loker', $data);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Lowongan Kerja berhasil ditambahkan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Lowongan Kerja gagal ditambahkan';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function edit(){
        $where['id'] = $this->input->post('id', true);
        $data['category_id'] = $this->input->post('category_id', true);
		$data['perusahaan_id'] = $this->input->post('perusahaan_id', true);
		$data['kab_id'] = $this->input->post('kab_id', true);
		$data['prov_id'] = $this->input->post('prov_id', true);
		$data['permalink'] = $this->input->post('permalink', true);
		$data['title'] = $this->input->post('judul', true);
		$data['alamat'] = $this->input->post('alamat', true);
        $data['description'] = $this->input->post('description', true);
        $data['isPublished'] = $this->input->post('status', true);
		$data['deadline'] = $this->input->post('deadline', true);
		$data['posted_at'] = date('Y-m-d H:i:s');
        $response = $this->crud->update('loker', $data, $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Lowongan Kerja berhasil diubah';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Lowongan Kerja gagal diubah';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function info_user(){
        $data = $this->mlogin->detail($_SESSION['admin']);
        $this->user = $data;
    }
    public function datatable(){ 
        $search = $_POST['search']['value']; 
        $limit = $_POST['length']; 
        $start = $_POST['start']; 
        $order_index = $_POST['order'][0]['column'];
        $order_field = $_POST['columns'][$order_index]['data']; 
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $sql_total = $this->dl->count_all(); 
        $sql_data = $this->dl->filter($search, $limit, $start, $order_field, $order_ascdesc); 
        $sql_filter = $this->dl->count_filter($search); 
        $callback = array(
            'draw'=>$_POST['draw'], 
            'recordsTotal'=>$sql_total,
            'recordsFiltered'=>$sql_filter,
            'data'=>$sql_data
        );
        header('Content-Type: application/json');
        echo json_encode($callback, JSON_PRETTY_PRINT);
    }

}
?>