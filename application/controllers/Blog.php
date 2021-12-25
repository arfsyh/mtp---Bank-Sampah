<?php
class Blog extends CI_Controller{
	function __construct(){
		parent::__construct();
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
        $config['base_url'] = base_url() . 'blog/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
						//Tambahan untuk styling
	          $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	          $config['full_tag_close']   = '</ul></nav></div>';
	          $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['num_tag_close']    = '</span></li>';
	          $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	          $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	          $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['prev_tagl_close']  = '</span>Next</li>';
	          $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	          $config['first_tagl_close'] = '</span></li>';
	          $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['last_tagl_close']  = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
            $x['page'] =$this->pagination->create_links();
						$x['data']=$this->m_tulisan->berita_perpage($offset,$limit);
						$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY views_tulisan DESC LIMIT 5");
						$this->load->view('depan/v_blog',$x);
	}
	function detail($slugs){
		$slug=htmlspecialchars($slugs,ENT_QUOTES);
		$query = $this->db->get_where('tbl_tulisan', array('slug_tulisan' => $slug));
		if($query->num_rows() > 0){
			$b=$query->row_array();
			$kode=$b['id_tulisan'];
			$this->db->query("UPDATE tbl_tulisan SET views_tulisan=views_tulisan+1 WHERE id_tulisan='$kode'");
			$data=$this->m_tulisan->get_berita_by_kode($kode);
			$row=$data->row_array();
			$x['id']=$row['id_tulisan'];
			$x['title']=$row['judul_tulisan'];
			$x['image']=$row['gambar_tulisan'];
			$x['blog'] =$row['isi_tulisan'];
			$x['tanggal']=$row['tanggal'];
			$x['author']=$row['author_tulisan'];
			$x['slug']=$row['slug_tulisan'];
			$x['show_komentar']=$this->m_tulisan->show_komentar_by_tulisan_id($kode);
			$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY views_tulisan DESC LIMIT 5");
			$this->load->view('depan/v_blog_detail',$x);
		}else{
			redirect('artikel');
		}
	}

	

    function search(){
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_tulisan->cari_berita($keyword);
				if($query->num_rows() > 0){
					$x['data']=$query;
					$x['category']=$this->db->get('tbl_kategori');
  				$x['populer']=$this->db->query("SELECT * FROM tbl_tulisan ORDER BY views_tulisan DESC LIMIT 5");
          $this->load->view('depan/v_blog',$x);
	 		 }else{
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan artikel dengan kata kunci <b>'.$keyword.'</b></div>');
				 redirect('artikel');
			 }
    }

		function komentar(){
				$kode = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
				$data=$this->m_tulisan->get_berita_by_kode($kode);
				$row=$data->row_array();
				$slug=$row['tulisan_slug'];
				$nama = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
				$email = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
				$komentar = nl2br(htmlspecialchars($this->input->post('komentar',TRUE),ENT_QUOTES));
				if(empty($nama) || empty($email)){
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Masukkan input dengan benar.</div>');
					redirect('artikel/'.$slug);
				}else{
					$data = array(
			        'komentar_nama' 			=> $nama,
			        'komentar_email' 			=> $email,
			        'komentar_isi' 				=> $komentar,
							'komentar_status' 		=> 0,
							'komentar_tulisan_id' => $kode
					);

					$this->db->insert('tbl_komentar', $data);
					$this->session->set_flashdata('msg','<div class="alert alert-info">Komentar Anda akan tampil setelah moderasi.</div>');
					redirect('artikel/'.$slug);
				}
		}

}
