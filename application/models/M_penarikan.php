<?php
class M_penarikan extends CI_Model{
	function tampil_nasabah($username){
		$hsl=$this->db->query("SELECT * FROM tbl_nasabah where username='$username'");
		return $hsl;
	}

	function updatesaldo($username,$tarik){

				$saldosebelum=$this->db->query("SELECT saldo FROM tbl_pembukuan where username ='$username' ORDER BY tanggal ASC ");
			foreach ($saldosebelum->result_array() as $row)
		{
		        $saldosebelum = $row['saldo'];

		}
		$tottabung=$saldosebelum-$tarik;
					$hsl=$this->db->query("INSERT INTO tbl_pembukuan (username,debit,saldo) VALUES ('$username','$tarik','$tottabung')");
					$hsl3=$this->db->query("UPDATE tbl_nasabah set saldo='$tottabung' WHERE username='$username'");
					
				}
				

					

		
}