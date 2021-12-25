<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_galeri');
	}
	function index(){
			$x['berita']=$this->m_tulisan->get_berita_home();
			$this->load->view('depan/v_home',$x);
	}

}
