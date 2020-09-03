<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('majax');
    }
    public function industri(){
        $q = $this->input->get('q');
        if($q == null):
            $industri = array();
        else:
            $industri = $this->majax->industri($q);
        endif;        
        $this->print_json($industri);        
    }
    public function perusahaan(){
        $q = $this->input->get('q');
        if($q == null):
            $perusahaan = array();
        else:
            $perusahaan = $this->majax->perusahaan($q);
        endif;        
        $this->print_json($perusahaan);        
    }
    public function kategori(){
        $q = $this->input->get('q');
        if($q == null):
            $kategori = array();
        else:
            $kategori = $this->majax->kategori($q);
        endif;        
        $this->print_json($kategori);        
    }
    public function print_json($data=array()){
        header('Content-type:application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}