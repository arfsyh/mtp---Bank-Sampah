<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $data = array('content'=>'loginnsb');
        $this->load->view('v_login',$data);
    }
    function petugas(){
        $data = array('content'=>'loginptg');
        $this->load->view('v_login',$data);

    }
    function authnsb(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->ceknasabah($u,$p);
        echo json_encode($cadmin);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         redirect('nasabah');

       }else{
         echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('login');
       }
   }

    function authptg(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p);
        echo json_encode($cadmin);
        if($cadmin->num_rows() > 0){
        $this->session->set_userdata('masuk',true);
        $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['level']=='1'){
            $this->session->set_userdata('akses','1');
           
            $user_nama=$xcadmin['username'];
            $this->session->set_userdata('nama',$user_nama);
            redirect('admin');
         }else{
             $this->session->set_userdata('akses','2');
             $user_nama=$xcadmin['username'];
             $this->session->set_userdata('nama',$user_nama);
             redirect('teller');
         }

       }else{
         echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
         redirect('login');
       }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
