<?php date_default_timezone_set('Asia/Taipei');
                  $date = date("Y/m/d");
?>
<?php
include('../../html/connect/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presence | Student Profiles</title>
  <link rel="icon" href="/presence/asset/icon/logo2.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">

  <style>
    .out, .in{
      margin-left: 20px;
    }
  </style>
</head>

<?php
require '../../../html/login2/test.php';
global $ID;
 $ID = $_SESSION["id"];
if(empty($_SESSION["id"])){
  header("Location: ../../../html/login2/logout.php");
}
if($_SESSION['usertype'] != "teacher"){
  header("Location: ../../../html/login2/login.php");
}
?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
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
        <a class="nav-link" href="../../../html/login2/logout.php" role="button">
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
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../asset/icon/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php
             global $key;
					    $query1=mysqli_query($conn,"select * from `teacher_info`, `accounts` where accounts.id = '$ID' and teacher_info.TeacherID='$ID' ");
					    $name=( $query1 ) ? mysqli_fetch_assoc( $query1 ) : false;
              $key = $name['FirstName'];
						  ?>
              <a href="#" class="d-block">
                <?php echo $name['FirstName']; echo " "; echo $name['LastName']; ?>
              </a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="../userTeacher/index.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logs.php" class="nav-link active">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Attendance Checker</h3>
              </div>
              <br>
              <!-- /.card-header -->
  

  <div class="card-body">
  <div class="form-group">
  <label>Date From:</label>
    <div class="btn-group col-md-4">
                   <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input name="datefrom" id="datefrom" type="text" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div> 
<!-- 
                    <input type="text" id="min" name="min"> -->
    </div>

<div>
  <br>
</div>
<label>Date To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<div class="btn-group col-md-4">
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input  name="dateto" id="dateto" type="text" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div> 
                  <!--  <input type="text" id="max" name="max"> -->
</div>

<div>
  <br>
</div>
<input type="button" name="search" id="search" value="Search" class="btn btn-info"/>
</div>         
 
<div  class="card-body">

  <table id="example1"  class="table table-bordered table-hover">
                <thead>
                    <tr>
                      
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Section</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Subject</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
					    include('../connect/connect.php');
					    $query=mysqli_query($conn,"select * from `student_info`,`attendancelogs` where student_info.RFID = attendancelogs.RFID AND attendancelogs.id = '$ID'  order by Ordering DESC" );
					    while($row=mysqli_fetch_array($query)){
						  ?>
						  <tr>
							
              <td><?php echo $row['FirstName']; ?></td>
							<td><?php echo $row['LastName']; ?></td>
              <td><?php echo $row['Section']; ?></td>
              <td><?php echo $row['Date']; ?></td>
              <td><?php echo $row['Time']; ?></td>
              <td><?php echo $row['Subject']; ?></td>
              
              </tr>
						  <?php
                }?>


                  </tbody>
                </table>
                </div>
                
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b><?php echo $date?></b>
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>

<!-- newly added script -->

<!-- Page specific script -->
<script>


 $(document).ready(function () {
$("#example1").DataTable({
      "order":[],"responsive": true, "autoWidth": false, 
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      "ordering": false,
      scrollY: '50vh',
        scrollCollapse: true,
      paging: false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  }); 


$(document).ready(function(){
  var datefrom = document.getElementById("reservationdate1").value;
  var dateto = document.getElementById("reservationdate2").value;

$("input").click(function(){
  datefrom = datefrom;
  dateto = dateto;
  $("#example1").load("load.php",{
      newdatefrom: datefrom,
      newdateto: dateto
  });

  console.log(newdatefrom,newdateto);
});
});

  
  $('#reservationdate1').datetimepicker({
    format:'DD/MM/YYYY'
    });
    
    $('#reservationdate2').datetimepicker({
      format:'DD/MM/YYYY'
    });

    

    
</script> 


</body>
</html>
