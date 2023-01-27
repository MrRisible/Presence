<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presence | Developers</title>

  
  <style>
    .out, .in{
      margin-left: 20px;
    }
  </style>
</head>
<?php
include "../connect/style.php";
require '../login2/test.php';

if(empty($_SESSION["id"])){
  header("Location: ../login2/logout.php");
}

?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item">
        <a href="developers.php" class="nav-link" role="button">Developers</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="../login2/logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar Menu -->
      <?php $page='';echo require_once("../connect/navbar.php");?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Developers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Developers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <!-- Person 1 -->
                    <div class="col-12 col-sm-6">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Project Manager
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Josiah Daniel Vasquez</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Leader / Workaholic / President / Visionary </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/Presence/asset/img/jd.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-primary">
                      <i class="fa fa-facebook-official"></i> Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
                    <!-- /Person 1-->
                    <!-- Person 2 -->
                    <div class="col-12 col-sm-6">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  System Analyst
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Jose Miguel Gutierrez</b></h2>
                      <p class="text-muted text-sm"><b>About: </b>  Valorant / Pogi / Gwapo / Loyal </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/Presence/asset/img/miggy.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="#" class="btn btn-primary">
                      <i class="fa fa-facebook-official"></i> Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
                    <!-- /Person 2-->
                    <!-- Person 3 -->
                    <div class="col-12 col-sm-6">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Programmer
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Christian Marc Nico Alingasa</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> 10INCH / 161CM / 65KG / DOTA PLAYER </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Villa Salvacion, Poblacion 2, Sagay City, Negros Occ.</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +63 945 147 9010</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/Presence/asset/img/master.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="https://www.facebook.com/autistnic" title="https://www.facebook.com/autistnic" target="_blank" class="btn btn-primary">
                      <i class="fa fa-facebook-official"></i> Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
                    <!-- /Person 3-->
                    <!-- Person 4 -->
                    <div class="col-12 col-sm-6">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Assistant Programmer
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Raymond John Managuit</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> 12INCH / 171CM / 73KG / ML PLAYER </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Prk. Diwata, Brgy. Tapi, Kabankalan City, Negros Occ.</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +63 956 740 3710</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/Presence/asset/img/rjm.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="https://www.facebook.com/raymoaned" title="https://www.facebook.com/raymoaned" target="_blank" class="btn btn-primary">
                      <i class="fa fa-facebook-official"></i> Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
                    <!-- /Person 4-->
                </div>
            </div>  
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PRESENCE</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    <a href="#"><i title="Help" class="fa fa-question-circle" aria-hidden="true"></i></a><b> System</b> Help
    
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
include "../connect/scripts.php";
?>
</body>
<div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">System Help</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <h3>Dashboard</h3>
            <img id="myImg" src="../presence/systemhelp/index.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Student Registration</h3>
            <img id="myImg" src="../presence/systemhelp/studentregistration.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>
            
            <div class="modal-body">
            <h3>Teacher Registration</h3>
            <img id="myImg" src="../presence/systemhelp/teacherregistration.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Student Profiles</h3>
            <img id="myImg" src="../presence/systemhelp/studentprofiles.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Student Update</h3>
            <img id="myImg" src="../presence/systemhelp/studentupdate.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Teacher Profiles</h3>
            <img id="myImg" src="../presence/systemhelp/teacherprofiles.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Student Update</h3>
            <img id="myImg" src="../presence/systemhelp/teacherupdate.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Activity Logs</h3>
            <img id="myImg" src="../presence/systemhelp/activitylogs.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Student Logs: In</h3>
            <img id="myImg" src="../presence/systemhelp/login.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-body">
            <h3>Student Logs: Out</h3>
            <img id="myImg" src="../presence/systemhelp/logout.jpg" alt="index" style="width:100%;max-width:50%px">
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</html>
