<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Industri extends CI_Controller {
    private $user;
	public function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('crud');
        // $this->load->model('datatables_kategori', 'dk');
        $this->load->model('datatables_industri', 'di');
        $this->info_user();
	}
    public function info_user(){
        $data = $this->mlogin->detail($_SESSION['admin']);
        $this->user = $data;
    }
    public function tambah(){
        $data['industri_name'] = $this->input->post('industri_name', true);
        $data['url'] = $this->input->post('url', true);
        $response = $this->crud->insert('industri', $data);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menambahkan industri';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menambahkan industri';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function ubah(){
        $where['id'] = $this->input->post('id', true);
        $data['industri_name'] = $this->input->post('industri_name', true);
        $data['url'] = $this->input->post('url', true);
        $response = $this->crud->update('industri', $data, $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil mengubah industri';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal mengubah industri';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function get(){
        $where['id'] = $this->input->post('industri_id', true);
        $response = $this->crud->detail('industri', $where)->row_array();
        header('Content-type:application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    public function hapus(){
        $where['id'] = $this->input->post('industri_id', true);
        $response = $this->crud->delete('industri', $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menghapus industri';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menghapus industri';
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
        $sql_total = $this->di->count_all(); 
        $sql_data = $this->di->filter($search, $limit, $start, $order_field, $order_ascdesc); 
        $sql_filter = $this->di->count_filter($search); 
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