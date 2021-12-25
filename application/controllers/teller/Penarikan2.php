<?php
class Penarikan2 extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_penarikan');
		
	}
	function index(){

	}
	function updatesaldo(){
		$username=$this->input->post('kode1');
	    $saldo=$this->input->post('kode2');
	    $tarik=$this->input->post('xtarik');

	    	$this->m_penarikan->updatesaldo($username,$tarik);
	    	
	   
	}
	
}