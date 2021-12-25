<?php
class Sampah extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('akses','1') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_sampah');
	}


	function index(){
		$x['data']=$this->m_sampah->get_all_sampah();
		$this->load->view('admin/v_sampah',$x);
	}
	function simpan_sampah(){
	                $jenis=$this->input->post('xjenis');
	                $harga=$this->input->post('xharga');
					$this->m_sampah->simpan_sampah($jenis,$harga);
					redirect('admin/sampah');
	}
	function hapus_sampah(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_sampah->hapus_sampah($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/sampah');
	}
	function update_sampah(){
		$kode=strip_tags($this->input->post('kode'));
		$harga=strip_tags($this->input->post('xharga'));
		$this->m_sampah->update_sampah($kode,$harga);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/sampah');
	}
	
}