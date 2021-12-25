<?php
class M_pengumuman extends CI_Model{

	function get_all_pengumuman(){
		$hsl=$this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
		
	}
	function simpan_pengumuman($judul,$deskripsi){
		$hsl=$this->db->query("INSERT INTO tbl_pengumuman(pengumuman_judul,pengumuman_deskripsi) VALUES ('$judul','$deskripsi')");
		return $hsl;
	}
	function hapus_pengumuman($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengumuman where pengumuman_id='$kode'");
		return $hsl;
	}
	function update_pengumuman($kode,$judul,$deskripsi){
		$hsl=$this->db->query("UPDATE tbl_pengumuman SET pengumuman_judul='$judul',pengumuman_deskripsi='$deskripsi' where pengumuman_id='$kode'");
		return $hsl;
	}
}