<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	class Theme{
		protected $_ci;
		function __construct(){ 
			$this->_ci=&get_instance();
        }
        function display_user($content, $tagline, $data=array()){
            $data['site_name'] = $this->_ci->config->item('site_name');
            $data['tagline'] = $tagline;    
            $data['content'] = $this->_ci->load->view($content, $data, true);
            $this->_ci->load->view('theme/user', $data);
        }
        function display_admin($content, $tagline, $data=array()){
            $data['menu'] = @$data['menu'] ? $data['menu'] : ['link' => '/manager', 'text' => 'Dashboard'];
            $data['submenu'] = @$data['submenu'] ? $data['submenu'] : [0 => 'Home'];
            $data['site_name'] = $this->_ci->config->item('site_name');
            $data['tagline'] = $tagline;    
            $data['content'] = $this->_ci->load->view($content, $data, true);
            $this->_ci->load->view('theme/admin', $data);
        }
    }
?>