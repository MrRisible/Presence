<?php date_default_timezone_set('Asia/Manila');
                  $date = date("d/m/Y");
?>
<?php
include('../connect/connect.php');
include "../connect/style.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presence | Student Profiles</title>
  <link rel="icon" href="/presence/asset/icon/logo2.png">
  <!-- Google Font: Source Sans Pro -->

  <style>
    .out, .in{
      margin-left: 20px;
    }
  </style>
</head>

<?php
require '../login2/test.php';
 global $ID;
 global $Section;
 global $Subject;
 $ID = $_SESSION["id"];
if(empty($_SESSION["id"])){
  header("Location: ../login2/logout.php");
}
if($_SESSION['usertype'] != "teacher"){
  header("Location: ../login2/login.php");
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
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../asset/icon/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php
             global $key;
					    $query1=mysqli_query($conn,"select * from `teacher_info`, `accounts` where accounts.id = '$ID' and teacher_info.TeacherID='$ID'");
					    $name=( $query1 ) ? mysqli_fetch_assoc( $query1 ) : false;
              $key = $name['FirstName'];
						  ?>
              <a href="#" class="d-block" data-toggle="modal" data-target="#modal-default">
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
                <a href="index.php" class="nav-link active">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Attendance Checker</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../userTeacher/logs.php" class="nav-link">
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
            <h1 class="m-0">Attendance Checker</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Checker</li>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Scan RFID to Submit Attendance
                </h3>
              </div>
              <br>
              <!-- /.card-header -->
          <form method="post" action="action.php?id=<?php echo $ID;?>">  
            <div class="btn-group col-md-8">
               <select id="Subject" name="Subject" class="btn btn-block btn-outline-info btn-lg col-sm-4" selected="">
                <option style="display:none;">Choose Subject</option>
                <option id="Subject_Filipino" value="Filipino">Filipino</option>
                <option id="Subject_Science" value="Science">Science</option>
                <option id="Subject_Mathematics" value="Mathematics">Mathematics</option>
                <option id="Subject_English" value="English">English</option>
                <option id="Subject_History" value="History">History</option>
              </select>
           </div>

           <div class="card-footer">
                  <input type="text" id="act" name="action" placeholder="Scan RFID">
                </div>           
          </form>
  

         
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

    <section>

    <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-info">
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Grade</th>
                      <th>Section</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Subject</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
					    include('../connect/connect.php');
					    $query=mysqli_query($conn,"select * from `student_info`,`attendancelogs` where student_info.RFID = attendancelogs.RFID AND attendancelogs.Date = '$date' AND attendancelogs.id = '$ID' order by Ordering desc" );
					    while($row=mysqli_fetch_array($query)){
						  ?>
						  <tr>
              <td><?php echo $row['LastName']; ?></td>
							<td><?php echo $row['FirstName']; ?></td>
              <td><?php echo $row['Grade']; ?></td>
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
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="resetpass.php?id=<?php echo $ID; ?>">
            <div class="modal-body">
              <input type="password" id="newpass" name="newpass" placeholder="New Password" require="required">
            </div>
            <div class="modal-body">
              <input type="password" id="conpass" name="conpass" placeholder="Confirm Password" require="required">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary" name="action">Save</button>
            </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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
<?php
include "../connect/scripts.php";
?>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example2").DataTable({
      "order":[], "ordering": false, "responsive": true, "lengthChange": false, "autoWidth": false,
      "ordering": false,
      scrollY: '50vh',
        scrollCollapse: true,
      paging: false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });



</script>
<script>
  window.onload = function() {
  document.getElementById("act").focus();
  document.getElementById('Subject_'+localStorage.getItem('selectedSubject')).selected = true;
  }

  var password = document.getElementById("newpass")
  , confirm_password = document.getElementById("conpass");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>


<!-- Retain even when refreshing using local storage.-->
<script>
document.getElementById('Subject').onchange = function() {
        localStorage.setItem('selectedSubject', document.getElementById('Subject').value);
        document.getElementById("act").focus();
    };

    if (localStorage.getItem('selecteditem')) {
        document.getElementById('Subject_'+localStorage.getItem('selectedSubject')).selected = true;
    }; 
</script>
</body>
</html>
