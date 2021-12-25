<?php
class Nasabah extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_nasabah');
	}


	function index(){
		$x['data']=$this->m_nasabah->get_all_nasabah();
		$this->load->view('admin/v_nasabah',$x);
	}
	function simpan_nasabah(){
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
	                $nama=$this->input->post('xnama');
	                $alamat=$this->input->post('xalamat');
	                $nohp=$this->input->post('xno');
					$jk=$this->input->post('xjk');
					$this->m_nasabah->simpan_nasabah($username,$password,$nama,$alamat,$nohp,$jk);
					redirect('admin/nasabah');
	}
	function hapus_nasabah(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_nasabah->hapus_nasabah($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/nasabah');
	}
	function update_nasabah(){
	            	 $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
	                $nama=$this->input->post('xnama');
	                $alamat=$this->input->post('xalamat');
	                $nohp=$this->input->post('xno');
					$jk=$this->input->post('xjk');
					$this->m_nasabah->update_nasabah($username,$password,$nama,$alamat,$nohp,$jk);
					redirect('admin/nasabah');
	            } 
}