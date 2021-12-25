<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_tulisan');
		
	}
	function index(){
		
			$this->load->view('admin/v_tulisan');
	
	}
	
}