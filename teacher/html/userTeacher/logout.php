<?php include "../connect/connect.php";
$id = $_SESSION['id'];
date_default_timezone_set('Asia/Manila');
$ID=$_GET['id'];
$date = date("d/m/Y") ;
$time = date("h:i:sa");

$query1 = $conn->prepare("INSERT INTO activity_logs(userID, FirstName, LastName, usertype, Activity, Date, Time) SELECT '$ID',teacher_info.FirstName, teacher_info.LastName,'Teacher','has logged out.','$date', '$time' FROM teacher_info WHERE teacher_info.TeacherID = '$ID'");
$query1 -> execute();

header('Location: ../../../html/login2/logout.php');
?>