
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resik Becik | Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

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
        <li>
          <a href="<?php echo base_url().'admin'?>">
            <i class="fa fa-newspaper-o"></i> <span> List Berita</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/tulisan/add_tulisan'?>">
            <i class="fa fa-thumb-tack"></i> <span> Post Berita</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>


        <li  class="active">
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-users"></i> <span> Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/pengumuman'?>">
            <i class="fa fa-volume-up"></i> <span> Pengumuman</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/galeri'?>">
            <i class="fa fa-camera"></i> <span> Photos</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>



        <li class="treeview">
          <a href="<?php echo base_url().'admin/Nasabah'?>">
            <i class="fa fa-user"></i>
            <span> Nasabah</span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url().'admin/Sampah'?>">
            <i class="fa fa-btc"></i>
            <span> Harga Sampah</span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'administrator/logout'?>">
            <i class="fa fa-sign-out"></i> <span> Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Header (Page header) -->
   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengguna
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengguna</a></li>
        <li class="active">Data Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Add Pengguna</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                  
                    <th>username</th>
                    <th>password</th>
                    <th>level</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php foreach ($data->result_array() as $i) :                    
                       $username=$i['username'];
                       $password=$i['password'];
                       $level=$i['level'];  
                    ?>
                <tr>
                  <td><?php echo $username;?></td>
                  <td><?php echo $password;?></td>
                  <?php if($level=='1'):?>
                        <td>Administrator</td>
                  <?php elseif($level=='2'):?>
                        <td>Manager</td>
                  <?php elseif($level=='3'):?>
                        <td>Teller</td>
                  <?php elseif($level=='4'):?>
                        <td>Nasabah</td>
                  <?php endif;?>

                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $username;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $username;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
        <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




</div>
<!-- ./wrapper -->
<!-- Modal Buat tambah data -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xpassword" class="form-control" id="inputPassword" placeholder="Password" required>
                                        </div>
                                    </div>                             
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
                                                <option value="1">Administrator</option>
                                                <option value="2">Manager</option>
                                                <option value="3">Teller</option>
                                            </select>
                                        </div>
                                    </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
          <?php foreach ($data->result_array() as $i) :
              $username=$i['username'];
              $password=$i['password'];
              $level=$i['level'];
             
            ?>
  <!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $username;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="xusername" value="<?php echo $username;?>"/>
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername1" disabled class="form-control" value="<?php echo $username;?>" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xpassword" class="form-control" value="<?php echo $password;?>"id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
                      <?php if($level=='1'):?>
                                                <option value="1" selected>Administrator</option>
                                                <option value="2">Manager</option>
                                                <option value="3">Teller</option>
                      <?php elseif($level=='2'):?>
                                                <option value="1">Administrator</option>
                                                <option value="2" selected>Manager</option>
                                                <option value="3">Teller</option>
                      <?php else:?>
                                                <option value="1">Administrator</option>
                                                <option value="2">Manager</option>
                                                <option value="3" selected="">Teller</option>
                      <?php endif;?>
                                            </select>
                                        </div>
                                    </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>

<?php foreach ($data->result_array() as $i) :
              $username=$i['username'];
              $password=$i['password'];
              $level=$i['level'];
              
            ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $username;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $username;?>"/>
                            <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $username;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
