<?php
class M_pengguna extends CI_Model{

	function get_all_pengguna(){
		$hsl=$this->db->query("SELECT * FROM tbl_pengguna");
		return $hsl;	
	}

	function simpan_pengguna($username,$password,$level){
		$hsl=$this->db->query("INSERT INTO tbl_pengguna (username,password,level) VALUES ('$username','$password','$level')");
		return $hsl;
	}
function hapus_pengguna($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengguna where username='$kode'");
		return $hsl;
	}
	
function update_pengguna($username,$password,$level){
		$hsl=$this->db->query("UPDATE tbl_pengguna set password='$password',level='$level' where username='$username'");
		return $hsl;
	}

	//END UPDATE PENGGUNA//
/*
	function hapus_pengguna($kode){
		$hsl=$this->db->query("DELETE FROM tbl_pengguna where pengguna_id='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM tbl_pengguna where pengguna_id='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE tbl_pengguna set pengguna_password=md5('$pass') where pengguna_id='$id'");
		return $hsl;
	}
*/
	function get_pengguna_login($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_pengguna where username='$kode'");
		return $hsl;
	}


}