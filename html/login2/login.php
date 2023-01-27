<?php date_default_timezone_set('Asia/Manila');
include "../connect/style.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presence | Log in</title>


  <style>
     body{
      background:url("../../asset/img/bg/bg.jpg");
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
     }

    .sign{
      margin-left: 35%;
      width: 50%;
      padding: 10px;
    }

    .sign2{
      font-size: 40px;
      margin-left: 20%;
      padding: 12px;
      color: red;
    }
  </style>
  </head>
  <body>
  
  <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
<?php
require 'test.php';

if(!empty($_SESSION["id"])){
  if($_SESSION["usertype"] == "teacher"){
    header("Location: ../../teacher/html/userTeacher/index.php");
  }
    else if($_SESSION["usertype"] == "admin"){
    header("Location: ../presence/index.php");
  }
    
    else if($_SESSION["usertype"] == "student"){
      header("Location: ../student/index.php");
    }
}
$login = new Login();


if(isset($_POST["submit"])){
  $result = $login->login($_POST["uname"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    $_SESSION["usertype"] = $login->idusertype();
    if($_SESSION["usertype"] == "teacher"){
      include ('../connect/connect.php');
      $ID = $_SESSION["id"];
      $date = date("d/m/Y");
      $time = date("h:i:sa");
      $query1 = $conn->prepare("INSERT INTO activity_logs(userID, FirstName, LastName, usertype, Activity, Date, Time) SELECT '$ID',teacher_info.FirstName, teacher_info.LastName,'Teacher','has logged in.','$date','$time' FROM teacher_info WHERE teacher_info.TeacherID = '$ID'");
      $query1 -> execute();

    header("Location: ../userTeacher/index.php");}
    else if($_SESSION["usertype"] == "admin"){
    header("Location: ../presence/index.php");
  }
    
    else if($_SESSION["usertype"] == "student"){
      include ('../connect/connect.php');
      $ID = $_SESSION["id"];
      $date = date("d/m/Y");
      $time = date("h:i:sa");
      $query1 = $conn->prepare("INSERT INTO activity_logs(userID, FirstName, LastName, usertype, Activity, Date, Time) SELECT '$ID',student_info.FirstName, student_info.LastName,'Student','has logged in.','$date','$time' FROM student_info WHERE Student_info.StudentID = '$ID'");
      $query1 -> execute();
      header("Location: ../student/index.php");
    }
    }
  
  elseif($result == 10){
    $_SESSION['status'] = "Password is incorrect!";
    $_SESSION['statusicon'] = "error";
    
  }
  elseif($result == 100){
    $_SESSION['status'] = "User is not registered";
    $_SESSION['statusicon'] = "error";
    
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
  </head>

<body class="hold-transition login-page">
  
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="sign2">
      <a style="text-size: 18px; color: indigo;" href=""><b>P</b>resence</a>
      </div>
      <p class="login-box-msg">Sign in</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="uname" placeholder="Username" required value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-user-circle-o"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required value="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          
          <div class="col-4 sign">
          <input class=" btn btn-primary btn" type="submit" name="submit" name value="Sign In"></input>
          </div>
            
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php
  include "../connect/scripts.php";
  
?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
