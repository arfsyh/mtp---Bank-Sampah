<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->model('m_sampah');
		
	}
	function index(){

		$x['data']=$this->m_sampah->get_all_sampah();
		$this->load->view('teller/v_dashboard',$x);
	
	}
	function tabung(){
					$nabung=0;
					for($x=1;$x<=100;$x++){
						if($berat=$this->input->post('berat'.$x)!=0){
					$username=$this->input->post('username');
	                $nama_sampah=$this->input->post('jenis'.$x);
	                $berat=$this->input->post('berat'.$x);

					$this->m_transaksi->simpan_transaksi($username,$nama_sampah,$berat);
					$ale=$this->m_transaksi->get_dataterbaru();
	                $nabung+=$ale;
					}
						}

						$this->m_transaksi->simpan_buku($username,$nabung);
					redirect('teller/Dashboard');
				
	}
}