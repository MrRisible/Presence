<?php date_default_timezone_set('Asia/Manila');
                  $date = date("d/m/Y");
                  include "../connect/style.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presence | Admin</title>

  
  <style>
    .out, .in{
      margin-left: 20px;
    }
    .navbar-item{
  min-height: 50px;
  height: 50px; 
} 
  </style>
</head>
<?php
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
      <?php $page ='logsin';echo require_once("../connect/navbar.php");?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Logs: In</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Logs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-info">
                      <th style="width: 10%">ID</th>
                      <th style="width: 20%">Student Name</th>
                      <th style="width: 10%">Date</th>
                      <th style="width: 10%">Time</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                include('../connect/connect.php');
                $query=mysqli_query($conn,"SELECT * FROM `student_info`,`studentin` WHERE CONCAT(student_info.FirstName,' ',student_info.LastName) = studentin.Name and studentin.Date = '$date' order by ordering DESC LIMIT 300");
                while($row=mysqli_fetch_array($query)){
                  ?>
                  <tr>
                  <td><?php echo $row['StudentID']; ?></td>
                  <td><?php echo $row['Name']; ?></td>
                  <td><?php echo $row['Date']; ?></td>
                  <td><?php echo $row['Time']; ?></td>
                  </tr>
                  <?php
                    }?>
              </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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

<script>
  $(function () {
    $("#example1").DataTable({
      "order":[], "ordering": false, "responsive": true, "lengthChange": false, "autoWidth": false,
      "ordering": false,
      scrollY: '50vh',
        scrollCollapse: true,
      paging: false, 
      "buttons": 
      [ {extend: "copy", exportOptions: {columns: [ 0, 1, 2, 3]}}, 
        {extend: "csv", exportOptions: {columns: [ 0, 1, 2, 3]}}, 
        {extend: "excel", exportOptions: {columns: [ 0, 1, 2, 3]}}, 
        {extend: "pdf", exportOptions: {columns: [ 0, 1, 2, 3]}},
        {extend: "print", exportOptions: {columns: [ 0, 1, 2, 3]}}]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
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



