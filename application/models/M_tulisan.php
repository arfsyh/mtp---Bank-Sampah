<?php
class M_tulisan extends CI_Model{

	function get_all_tulisan(){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY id_tulisan DESC");
		return $hsl;
	}
	function simpan_tulisan($judul,$isi,$imgslider,$username,$gambar,$slug){
		$hsl=$this->db->query("insert into tbl_tulisan(judul_tulisan,isi_tulisan,img_slider_tulisan,author_tulisan,gambar_tulisan,slug_tulisan) values ('$judul','$isi','$imgslider','$username','$gambar','$slug')");
		return $hsl;}
	function get_tulisan_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanbggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where id_tulisan='$kode'");
		return $hsl;
	}
	function update_tulisan($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$username,$gambar,$slug){
		$hsl=$this->db->query("update tbl_tulisan set judul_tulisan='$judul',isi_tulisan='$isi',img_slider_tulisan='$imgslider',author_tulisan='$username',gambar_tulisan='$gambar',slug_tulisan='$slug' where id_tulisan='$tulisan_id'");
		return $hsl;
	}
	function update_tulisan_tanpa_img($tulisan_id,$judul,$isi,$kategori_id,$kategori_nama,$imgslider,$username,$slug){
		$hsl=$this->db->query("update tbl_tulisan set judul_tulisan='$judul',isi_tulisan='$isi',img_slider_tulisan='$imgslider',author_tulisan='$username',slug_tulisan='$slug' where id_tulisan='$tulisan_id'");
		return $hsl;
	}
	function hapus_tulisan($kode){
		$hsl=$this->db->query("delete from tbl_tulisan where id_tulisan='$kode'");
		return $hsl;
	}

	//Front-End
	function get_berita_slider(){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where img_slider_tulisan='1' ORDER BY id_tulisan DESC");
		return $hsl;
	}
	function get_berita_home(){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY id_tulisan DESC limit 4");
		return $hsl;
	}

	function berita_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY id_tulisan DESC limit $offset,$limit");
		return $hsl;	}

	function berita(){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY id_tulisan DESC");
		return $hsl;
	}
	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where id_tulisan='$kode'");
		return $hsl;
	}

	function cari_berita($keyword){
		$hsl=$this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tanggal_tulisan,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE judul_tulisan LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function show_komentar_by_tulisan_id($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_tulisan_id='$kode' AND komentar_status='1' AND komentar_parent='0'");
		return $hsl;
	}


}
