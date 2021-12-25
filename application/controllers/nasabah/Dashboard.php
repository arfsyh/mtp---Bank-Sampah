<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('akses','2') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_tulisan');
		
	}
	function index(){
		$jum=$this->m_tulisan->berita();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=5;
        $config['base_url'] = base_url() . 'nasabah/Dashboard/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
		$this->pagination->initialize($config);
            $x['page'] =$this->pagination->create_links();
						$x['data']=$this->m_tulisan->berita_perpage($offset,$limit);
						
			$this->load->view('nasabah/v_dashboard',$x);
	
	}
	
}