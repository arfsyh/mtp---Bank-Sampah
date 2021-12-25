<?php
class M_nasabah extends CI_Model{
	
	function get_all_nasabah(){
		$hsl=$this->db->query("SELECT * FROM tbl_nasabah");
		return $hsl;	
	}

	function simpan_nasabah($username,$password,$nama,$alamat,$nohp,$jk){
		$hsl=$this->db->query("INSERT INTO tbl_nasabah (username,password,nama,alamat,no_hp,jk,saldo) VALUES ('$username','$password','$nama','$alamat','$nohp','$jk',0)");
		return $hsl;
	}
	function hapus_nasabah($kode){
		$hsl=$this->db->query("DELETE FROM tbl_nasabah where username='$kode'");
		return $hsl;
	}
	function update_nasabah($username,$password,$nama,$alamat,$nohp,$jk){
		$hsl=$this->db->query("UPDATE tbl_nasabah set password='$password',nama='$nama',alamat='$alamat',no_hp='$nohp',jk='$jk' where username='$username'");
		return $hsl;
	}
}