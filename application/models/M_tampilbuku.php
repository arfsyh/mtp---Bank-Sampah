<?php
class M_tampilbuku extends CI_Model{

	function get_all_data(){
		$hsl=$this->db->query("SELECT * FROM tbl_pembukuan where username='luthfiantoro'");
		return $hsl;	
	}
	
}