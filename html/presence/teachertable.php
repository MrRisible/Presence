<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Student Profiles</title>


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
        <a class="nav-link" href="../login2/logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
  </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
      <?php $page ='teachtable';echo require_once("../connect/navbar.php");?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher Profiles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teacher Profiles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                      <th>Teacher ID</th>
                      <th>Username</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
					    include('../connect/connect.php');
					    $query=mysqli_query($conn,"select * from `teacher_info`, `accounts` where teacher_info.TeacherID = accounts.id order by LastName");
					    while($row=mysqli_fetch_array($query)){
						  ?>
						  <tr>
							<td><?php echo $row['TeacherID']; ?></td>
              <td><?php echo $row['username']?></td>
              <td><?php echo $row['LastName']; ?></td>
							<td><?php echo $row['FirstName']; ?></td>
              <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm"  href="../teacherform/edit.php?id=<?php echo $row['TeacherID'];?>">
                              <i class="fas fa-pencil-alt" title="Edit">
                              </i>
                              
                          </a>
                          <a class="btn btn-secondary btn-sm" onclick="return submitForm(<?php echo $row['TeacherID'];?>)">
                              <i class="fa fa-archive" title="Archive">
                              </i>
                              
                          </a>
                      </td>
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
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
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
<?php
include "../connect/scripts.php";
?>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "order":[], "responsive": true, "lengthChange": false, "autoWidth": false,
      "ordering": false,
      scrollY: '50vh',
        scrollCollapse: true,
      paging: false,
      "buttons": [ {extend: "copy", exportOptions: {columns: [ 0, 1, 2]}}, 
        {extend: "csv", exportOptions: {columns: [ 0, 1, 2]}}, 
        {extend: "excel", exportOptions: {columns: [ 0, 1, 2]}}, 
        {extend: "pdf", exportOptions: {columns: [ 0, 1, 2]}},
        {extend: "print", exportOptions: {columns: [ 0, 1, 2]}}]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });


            function submitForm($teacherID){
              swal({
                title: "Are you sure",
                text: "you want to archive this account?",
                icon: "info",
                buttons: ["Cancel", "Submit"],
              })
              .then((isOkay)=>{
                if (isOkay){
                  location.assign("../teacherform/archive.php?id=" + $teacherID);
                }
              });
              return false;
            }

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
