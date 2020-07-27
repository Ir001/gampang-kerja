<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
    private $user;
	public function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('crud');
        $this->load->model('datatables_perusahaan', 'dp');
        $this->info_user();
	}
    public function info_user(){
        $data = $this->mlogin->detail($_SESSION['admin']);
        $this->user = $data;
    }
    public function tambah(){
        $data['perusahaan_name'] = $this->input->post('perusahaan_name', true);
        $data['logo'] = $this->input->post('perusahaan_name', true);
        $data['industri_id'] = $this->input->post('industri_id', true);
        $data['website'] = $this->input->post('situs', true);
        $data['fashion'] = $this->input->post('fashion', true);
        $data['bahasa'] = $this->input->post('bahasa', true);
        $data['tunjangan'] = $this->input->post('tunjangan', true);
        $data['waktu_kerja'] = $this->input->post('waktu_kerja', true);
        $data['ukuran_perusahaan'] = $this->input->post('ukuran', true);
        $data['description'] = $this->input->post('description');
        $data['why_join_us'] = $this->input->post('why_join_us');
        $response = $this->crud->insert('perusahaan', $data);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menambahkan perusahaan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menambahkan perusahaan';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function ubah(){
        $where['id'] = $this->input->post('id', true);
        $data['perusahaan_name'] = $this->input->post('perusahaan_name', true);
        $data['logo'] = $this->input->post('logo', true);
        $data['industri_id'] = $this->input->post('industri_id', true);
        $data['website'] = $this->input->post('situs', true);
        $data['fashion'] = $this->input->post('fashion', true);
        $data['bahasa'] = $this->input->post('bahasa', true);
        $data['tunjangan'] = $this->input->post('tunjangan', true);
        $data['waktu_kerja'] = $this->input->post('waktu_kerja', true);
        $data['ukuran_perusahaan'] = $this->input->post('ukuran', true);
        $data['description'] = $this->input->post('description');
        $data['why_join_us'] = $this->input->post('why_join_us');
        $response = $this->crud->update('perusahaan', $data, $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil mengubah perusahaan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal mengubah perusahaan';
        }
        header('Content-type:application/json');
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }
    public function get(){
        $where['id'] = $this->input->post('perusahaan_id', true);
        $response = $this->crud->detail('perusahaan', $where)->row_array();
        header('Content-type:application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    public function hapus(){
        $where['id'] = $this->input->post('perusahaan_id', true);
        $response = $this->crud->delete('perusahaan', $where);
        if ($response > 0) {
            $msg['status'] = true;
            $msg['message'] = 'Berhasil menghapus perusahaan';
        }else{
            $msg['status'] = false;
            $msg['message'] = 'Gagal menghapus perusahaan';
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
        $sql_total = $this->dp->count_all(); 
        $sql_data = $this->dp->filter($search, $limit, $start, $order_field, $order_ascdesc); 
        $sql_filter = $this->dp->count_filter($search); 
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