<?php
class Detail extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('akses','2') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };

        $this->load->model('m_tampilbuku');
	}
	function index(){
		$x['data']=$this->m_tampilbuku->get_all_data();
		
			$this->load->view('nasabah/v_detail',$x);
	
	}
	
}