<?php
class Penarikan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_penarikan');
		
	}
	function index(){
			$this->load->view('teller/v_penarikan');
	
	}
	function pindah(){
		$username=$this->input->post('username');;
		$x['data']=$this->m_penarikan->tampil_nasabah($username);
			$this->load->view('teller/v_penarikan2',$x);
	
	}

	function updatesaldo(){
		$username=$this->input->post('kode1');
	    $saldo=$this->input->post('kode2');
	    $tarik=$this->input->post('xtarik');
	    	$this->m_penarikan->updatesaldo($username,$tarik);
	    	$x['data']=$this->m_penarikan->tampil_nasabah($username);
			$this->load->view('teller/v_penarikan2',$x);
	   
	}

	
	
}