<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('mlogin');
        }
        public function login(){
            $data = ['site_name' => $this->config->item('site_name')];
            $this->load->view('theme/login', $data);
        }
        public function do_login(){
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $is_valid = $this->mlogin->is_valid($email)->num_rows();
            if ($is_valid >= 1) {
                $admin = $this->mlogin->is_valid($email)->row_array();
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['admin'] = $admin['id'];
                    $this->mlogin->log($email);
                    $msg['status'] = true;
                    $msg['message'] = 'Berhasil login';
                }else{
                    $msg['status'] = false;
                    $msg['message'] = 'Password salah!';
                }
            }else{
                $msg['status'] = false;
                $msg['message'] = 'Email tidak terdaftar!';
            }
            header('Content-type:application/json');
            echo json_encode($msg, JSON_PRETTY_PRINT);
        }
    }
?>