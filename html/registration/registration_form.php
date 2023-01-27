<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presence | Registration</title>

  
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
        <a href="../presence/index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item">
        <a href="../presence/developers.php" class="nav-link" role="button">Developers</a>
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
<?php $page ='regform';echo require_once("../connect/navbar.php");?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Registration Form</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        
            
            <form id="registerform" action="register.php" method="post" onsubmit="return submitForm(this);">
            <div class="row">
  <div class="col-lg-6 col-12">
    <div class="card">
                <div class="card-header card">
                    <h3 class="card-title">Student</h3>
                  </div>
      <div class="card-body">
                  <div class="form-group">
                    <label for="inputRFID">RFID</label>
                    <input type="text" class="form-control" name="studentRFID" placeholder="RFID" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputStudID">Student ID</label>
                    <input type="text" class="form-control" name="studentID" placeholder="StudentID" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" name="studentFirstName" placeholder="First Name" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" name="studentLastName" placeholder="Last Name" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputGrade">Grade</label>
                    <input type="text" class="form-control" name="studentGradeLevel" placeholder="Grade Level" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputGrade">Section</label>
                    <input type="text" class="form-control" name="studentSection" placeholder="Section" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="studentAddress" placeholder="Address" required="required">
                  </div>
                  <br>
        </div>
    </div>
  </div>



  <div class="col-lg-6 col-12">
    <div class="card">
                <div class="card-header card">
                    <h3 class="card-title">Guardian</h3>
                  </div>
      <div class="card-body">
                  <div class="form-group">
                    <label for="Guardian_FirstName">First Name</label>
                    <input type="text" class="form-control" name="parentFirstName" placeholder="First Name" required="required">
                  </div>
                  <div class="form-group">
                    <label for="Guardian_LastName">Last Name</label>
                    <input type="text" class="form-control" name="parentLastName" placeholder="Last Name" required="required">
                  </div>
                  <div class="form-group">
                    <label for="Guardian_ContactNumber">Contact Number</label>
                    <input type="text" class="form-control" name="parentContact" placeholder="Contact Number" required="required">
                  </div>     
        </div>
    </div>

   
              </div>
                      </div>
                <div class="card-footer">
                  <button type="submit" name="register" class="btn btn-primary">Submit</button>
                </div>
            </form>



              
            
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
            function submitForm(form){
              swal({
                title: "Are you sure?",
                text: "This form will be submitted",
                icon: "info",
                buttons: ["Cancel", "Submit"],
              })
              .then((isOkay)=>{
                if (isOkay){
                  form.submit();
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
