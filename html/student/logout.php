<?php include "../connect/connect.php";
$id = $_SESSION['id'];
date_default_timezone_set('Asia/Manila');
$ID=$_GET['id'];
$date = date("d/m/Y") ;
$time = date("h:i:sa");

$query1 = $conn->prepare("INSERT INTO activity_logs(userID, FirstName, LastName, usertype, Activity, Date, Time) SELECT '$ID',student_info.FirstName, student_info.LastName,'Student','has logged out.','$date', '$time' FROM student_info WHERE student_info.StudentID = '$ID'");
$query1 -> execute();

header('Location: ../login2/logout.php');
?>