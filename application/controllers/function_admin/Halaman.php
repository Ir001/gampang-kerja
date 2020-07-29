<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {
    private $user;
	public function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('crud');
        $this->load->model('datatable_halaman', 'dh');
        $this->info_user();
	}
    public function info_user(){
        $data = $this->mlogin->detail($_SESSION['admin']);
        $this->user = $data;
    }
    public function tambah(){
        $data['title'] = $this->input->post('judul', true);
        $data['permalink'] = $this->input->post('permalink', true);
        $data['status'] = @$this->input->post('status', true) ? $this->input->post('status', true) : 0;
        $data['content'] = $this->input->post('content', true);
        $response = $this->crud->insert('page', $data);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menambahkan halaman';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menambahkan halaman';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function ubah(){
        $where['id'] = $this->input->post('id', true);
        $data['title'] = $this->input->post('judul', true);
        $data['permalink'] = $this->input->post('permalink', true); 
        $data['status'] = @$this->input->post('status', true) ? $this->input->post('status', true) : 0;
        $data['content'] = $this->input->post('content', true);
        $response = $this->crud->update('page', $data, $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil mengubah halaman';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal mengubah halaman';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function get(){
        $where['id'] = $this->input->post('halaman_id', true);
        $response = $this->crud->detail('page', $where)->row_array();
        header('Content-type:application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    public function hapus(){
        $where['id'] = $this->input->post('halaman_id', true);
        $response = $this->crud->delete('page', $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menghapus halaman';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menghapus halaman';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    // Datatables
    public function datatable(){
        $search = $_POST['search']['value']; 
        $limit = $_POST['length']; 
        $start = $_POST['start']; 
        $order_index = $_POST['order'][0]['column'];
        $order_field = $_POST['columns'][$order_index]['data']; 
        $order_ascdesc = $_POST['order'][0]['dir']; 
        $sql_total = $this->dh->count_all(); 
        $sql_data = $this->dh->filter($search, $limit, $start, $order_field, $order_ascdesc); 
        $sql_filter = $this->dh->count_filter($search); 
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