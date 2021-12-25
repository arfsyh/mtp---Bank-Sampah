<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
	}


	function index(){
		$x['data']=$this->m_pengguna->get_all_pengguna();
		$this->load->view('admin/v_pengguna',$x);
	}
	function simpan_pengguna(){
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
					$level=$this->input->post('xlevel');
					$this->m_pengguna->simpan_pengguna($username,$password,$level);
					redirect('admin/pengguna');
	}
	function hapus_pengguna(){
		$kode=strip_tags($this->input->post('kode'));
		$this->m_pengguna->hapus_pengguna($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/pengguna');
	}
	function update_pengguna(){
	            	
	               	$username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
	                $level=$this->input->post('xlevel');
	                $this->m_pengguna->update_pengguna($username,$password,$level);
					redirect('admin/pengguna');
	          
	            } 

	
}