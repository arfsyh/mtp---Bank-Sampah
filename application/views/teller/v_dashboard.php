
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resik Becik | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!--Header-->
  <?php
    $this->load->view('admin/v_header');
  ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li class="active">
          <a href="<?php echo base_url().'teller/dashboard'?>">
            <i class="fa fa-newspaper-o"></i> <span> Penabungan</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'teller/penarikan'?>">
            <i class="fa fa-newspaper-o"></i> <span> Penarikan</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penabungan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Penabungan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->

          <div class="box box-danger">
      <div class="box box-default">
        <div class="container">

            <div class="box-header"></div>

    <form action="<?php echo base_url().'teller/dashboard/tabung'?>" method="post" >

        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group row">
              <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3"> Username</label>
            <div class="col-md-6">
              <input type="text" name="username" class="form-control" placeholder="Masukan Username" required/>
            </div>
            <!-- /.col -->
          </div>
        </div>
        <div class="col-md-6"></div></div>

          <!-- -->
         
          
          <!-- /.row -->
          
      </div>
      </div> 


      <div class="box-body">
        <div class="container">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                    <th>Jenis Sampah</th>
                    <th>Berat /kg</th>
                </tr>
                </thead>
                <tbody>

        <?php 
        $anu=0;
        foreach ($data->result_array() as $i) : 
                       $jenis=$i['jenis_sampah'];
                       $anu+=1;
                    ?>
                <tr>
                <td>
                  <input type="hidden" name="<?php echo "jenis".$anu;?>" value="<?php echo $jenis;?>"/>
                  <label name="a"><?php echo $jenis?></label> </td>
                  <td><input type="number" name="<?php echo "berat".$anu;?>"></td>
                </tr>
        <?php endforeach;?>
                </tbody>
              </table>
            </div>
          <div class="col-md-12">
            <input type="submit" name="submit" class="btn btn-success btn-flat pull-right" value="Submit">
          </div>
        </div>
        <!-- /.box-body -->
    </form>
      <!-- /.box -->

 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</div>
  <!-- /.content-wrapper -->




</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>


</body>
</html>
