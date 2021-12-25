<?php
class M_transaksi extends CI_Model{
	function simpan_transaksi($username,$nama_sampah,$berat){

		$hsl=$this->db->query("SELECT harga_sampah FROM tbl_sampah where jenis_sampah='$nama_sampah'");
		foreach ($hsl->result_array() as $row)
		{
		        $hsl1 = $row['harga_sampah'];

		}
			$total = $hsl1*$berat;
		$hsl=$this->db->query("INSERT INTO tbl_transaksi (username,nama_sampah,berat,harga) VALUES ('$username','$nama_sampah','$berat','$total')");
		

		}
		function get_dataterbaru(){
			$hsl=$this->db->query("SELECT harga FROM tbl_transaksi ORDER BY id_transaksi ASC ");
			foreach ($hsl->result_array() as $row)
		{
		        $hsl = $row['harga'];

		}
			return $hsl;
		}

		function simpan_buku($username,$nabung){
				$cek=$this->db->query("SELECT username FROM tbl_pembukuan where username='$username' ");
		foreach ($cek->result_array() as $row)
		{
		        $jumlah+=1;
		}
				if($jumlah==0){
				$hsl=$this->db->query("INSERT INTO tbl_pembukuan (username,kredit,saldo) VALUES ('$username','$nabung','$nabung')");
				}else{

				$saldosebelum=$this->db->query("SELECT saldo FROM tbl_pembukuan where username ='$username' ORDER BY tanggal ASC ");
			foreach ($saldosebelum->result_array() as $row)
		{
		        $hsl = $row['saldo'];

		}
		$tottabung=$hsl+$nabung;
					$hsl=$this->db->query("INSERT INTO tbl_pembukuan (username,kredit,saldo) VALUES ('$username','$nabung','$tottabung')");
					$hsl3=$this->db->query("UPDATE tbl_nasabah set saldo='$tottabung' WHERE username='$username'");
				}
				

					

		}
}