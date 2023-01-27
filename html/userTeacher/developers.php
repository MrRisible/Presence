<?php
include('../connect/connect.php');
include "../connect/style.php";
?>

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
require '../login2/test.php';
 global $ID;
 $ID = $_SESSION["id"];
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
        <a class="nav-link" href="logout.php?id=<?php echo $ID?>" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="/presence/asset/icon/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PRESENCE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="../../asset/icon/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php
             global $key;
					    $query1=mysqli_query($conn,"select * from `teacher_info`, `accounts` where teacher_info.TeacherID = '$ID' and accounts.ID='$ID' ");
					    $name=( $query1 ) ? mysqli_fetch_assoc( $query1 ) : false;
              $key = $name['FirstName'];
						  ?>
              <a href="#" class="d-block">
                <?php echo $name['FirstName']; echo " "; echo $name['LastName']; ?>
              </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            
               <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logs.php" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>All Attendance</p>
                </a>
              </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
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
                    <a href="#" class="btn btn-sm btn-primary">
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
                      <p class="text-muted text-sm"><b>About: </b> Valorant / Pogi / Gwapo / Loyal</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #:  </li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="/Presence/asset/img/miggy.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="#" class="btn btn-sm btn-primary">
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
                    
                    <a href="https://www.facebook.com/autistnic" target="_blank" class="btn btn-sm btn-primary">
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
                    
                    <a href="https://www.facebook.com/raymoaned" target="_blank" class="btn btn-sm btn-primary">
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
      <b>Version</b> 3.2.0
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
</html>
