<?php
class M_login extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("SELECT * FROM tbl_pengguna WHERE username='$u' AND password='$p'");
        return $hasil;
    }
     function ceknasabah($u,$p){
        $hasil=$this->db->query("SELECT * FROM tbl_nasabah WHERE username='$u' AND password='$p'");
        return $hasil;
    }

}
