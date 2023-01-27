<?php
  include ("../connect/connect.php");
  include "../connect/style.php";
  $studentID=$_GET['id'];
	$query=mysqli_query($conn,"select * from `student_info` where StudentID='$studentID'");
	$row=mysqli_fetch_array($query);

  $query3=mysqli_query($conn,"select * from `accounts` where id='$studentID'");
  $row3=mysqli_fetch_array($query3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presence | Update Info</title>

  
  <style>
    .out, .in{
      margin-left: 20px;
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
        <a href="/presence2/html/presence/index.php" class="nav-link">Home</a>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
<!-- Sidebar Menu -->
      <?php $page ='';echo require_once("../connect/navbar.php");?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Teacher Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Update Form</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        
            
    <form id="update" action="update.php?id=<?php echo $studentID; ?>" method="post" onsubmit="return submitForm(this)";>
            <div class="row">
  <div class="col-lg-6 col-12">
    <div class="card">
                <div class="card-header card">
                    <h3 class="card-title">Student</h3>
                  </div>
      <div class="card-body">
                  <div class="form-group">
                    <label for="inputRFID">RFID</label>
                    <input type="text" class="form-control" name="studentRFID" value="<?php echo $row['RFID'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputStudID">Student ID</label>
                    <input type="text" class="form-control" name="studentID"  value="<?php echo $row['StudentID'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" name="studentFirstName"  value="<?php echo $row['FirstName'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" name="studentLastName"  value="<?php echo $row['LastName'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputGrade">Grade</label>
                    <input type="text" class="form-control" name="studentGradeLevel" value="<?php echo $row['Grade'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputGrade">Section</label>
                    <input type="text" class="form-control" name="studentSection" value="<?php echo $row['Section'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="studentAddress"  value="<?php echo $row['Address'];?>" required="required">
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
                    <input type="text" class="form-control" name="parentFirstName" value="<?php echo $row2['GuardianFirstName'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="Guardian_LastName">Last Name</label>
                    <input type="text" class="form-control" name="parentLastName" value="<?php echo $row2['GuardianLastName'];?>" required="required">
                  </div>
                  <div class="form-group">
                    <label for="Guardian_ContactNumber">Contact Number</label>
                    <input type="text" class="form-control" name="parentContact" value="<?php echo $row2['TelPhone'];?>" required="required">
                  </div>     
        </div>
    </div>

    <div class="card">
                <div class="card-header card">
                    <h3 class="card-title">User Account</h3>
                  </div>
      <div class="card-body">
                  <div class="form-group">
                    <label for="StudUserName">User Name</label>
                    <input type="text" class="form-control" name="studentUsername" value="<?php echo $row3['username'];?>" required="required" readonly>
                  </div>   
                  
                   <div class="form-group">
                   <a class="btn btn-outline-warning" href="resetpass.php?id=<?php echo $row['StudentID'];?>">
                              <i class="fa fa-undo" title="Reset Password">
                              </i> Reset Password
                          </a>  
                  </div> 
                  
                  
                  </div>
                </div>
              </div>
                      </div>
                <div class="form-group">
                  <button form="update"type="submit" name="register" class="btn btn-primary">Update</button>
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



