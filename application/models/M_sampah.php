<?php
class M_sampah extends CI_Model{

	function get_all_sampah(){
		$hsl=$this->db->query("SELECT * FROM tbl_sampah");
		return $hsl;	
	}
	function simpan_sampah($jenis,$harga){
		$hsl=$this->db->query("INSERT INTO tbl_sampah (jenis_sampah,harga_sampah) VALUES ('$jenis','$harga')");
		return $hsl;
	}
	function hapus_sampah($kode){
		$hsl=$this->db->query("DELETE FROM tbl_sampah where id_sampah='$kode'");
		return $hsl;
	}
	function update_sampah($kode,$harga){
		$hsl=$this->db->query("UPDATE tbl_sampah set harga_sampah='$harga' where id_sampah='$kode'");
		return $hsl;
	}
}