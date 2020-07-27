<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    private $user;
	public function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('crud');
        $this->load->model('datatables_kategori', 'dk');
        $this->info_user();
	}
    public function info_user(){
        $data = $this->mlogin->detail($_SESSION['admin']);
        $this->user = $data;
    }
    public function tambah(){
        $data['category_name'] = $this->input->post('kategori', true);
        $response = $this->crud->insert('category', $data);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menambahkan kategori';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menambahkan kategori';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function ubah(){
        $where['id'] = $this->input->post('id', true);
        $data['category_name'] = $this->input->post('kategori', true);
        $response = $this->crud->update('category', $data, $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil mengubah kategori';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal mengubah kategori';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function get(){
        $where['id'] = $this->input->post('kategori_id', true);
        $response = $this->crud->detail('category', $where)->row_array();
        header('Content-type:application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    public function hapus(){
        $where['id'] = $this->input->post('kategori_id', true);
        $response = $this->crud->delete('category', $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menghapus kategori';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menghapus kategori';
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
        $sql_total = $this->dk->count_all(); 
        $sql_data = $this->dk->filter($search, $limit, $start, $order_field, $order_ascdesc); 
        $sql_filter = $this->dk->count_filter($search); 
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