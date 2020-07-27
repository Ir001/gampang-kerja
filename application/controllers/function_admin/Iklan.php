<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller {
    private $user;
	public function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('crud');
        $this->load->model('datatable_iklan', 'di');
        $this->info_user();
	}
    public function info_user(){
        $data = $this->mlogin->detail($_SESSION['admin']);
        $this->user = $data;
    }
    public function tambah(){
        $data['nama'] = $this->input->post('nama', true);
        $data['posisi'] = $this->input->post('posisi', true);
        $data['status'] = $this->input->post('status', true);
        $data['code'] = $this->input->post('code', true);
        $response = $this->crud->insert('iklan', $data);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menambahkan iklan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menambahkan iklan';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function ubah(){
        $where['id'] = $this->input->post('id', true);
        $data['nama'] = $this->input->post('nama', true);
        $data['posisi'] = $this->input->post('posisi', true);
        $data['status'] = $this->input->post('status', true);
        $data['code'] = $this->input->post('code', true);
        $response = $this->crud->update('iklan', $data, $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil mengubah iklan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal mengubah iklan';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function get(){
        $where['id'] = $this->input->post('iklan_id', true);
        $response = $this->crud->detail('iklan', $where)->row_array();
        header('Content-type:application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    public function hapus(){
        $where['id'] = $this->input->post('iklan_id', true);
        $response = $this->crud->delete('iklan', $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menghapus iklan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menghapus iklan';
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