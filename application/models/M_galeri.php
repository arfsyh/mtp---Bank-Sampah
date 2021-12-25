<?php
class M_galeri extends CI_Model{

	function get_all_galeri(){
		$hsl=$this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_galeri ORDER BY galeri_id DESC");
		return $hsl;
	}
	function simpan_galeri($gambar){
		$this->db->trans_start();
            $this->db->query("insert into tbl_galeri(galeri_gambar) values ('$gambar')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_galeri($galeri_id,$gambar){
		$hsl=$this->db->query("update tbl_galeri set galeri_gambar='$gambar' where galeri_id='$galeri_id'");
		return $hsl;
	}
	function hapus_galeri($kode){
		$this->db->trans_start();
            $this->db->query("delete from tbl_galeri where galeri_id='$kode'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//Front-End
	function get_galeri_home(){
		$hsl=$this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_galeri ORDER BY galeri_id DESC limit 10");
		return $hsl;
	}

	

}