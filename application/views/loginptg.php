<div class="login-box">
  <div>
   <p><?php echo $this->session->flashdata('msg');?></p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"> <img width="320px;" src="<?php echo base_url().'assets/images/mylogo.png'?>"></p><hr/>

    <form action="<?php echo site_url().'login/authptg'?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form><br>
    <div class="row">
        <div class="col-sm-6">
          <a href="<?php echo site_url().'login'?>" class="btn btn-success btn-block btn-flat">Nasabah</a>
        </div>
        <div class="col-sm-6">
          <a href="<?php echo site_url().'login/petugas'?>"  class="btn btn-default btn-block btn-flat">Petugas</a>
        </div>
        <!-- /.col -->
      </div>


    <!-- /.social-auth-links -->
    <hr/>
    <p><center>Copyright <?php echo date('Y');?> by Arfiansyah <br/> All Right Reserved</center></p>
  </div>
  <!-- /.login-box-body -->
</div>