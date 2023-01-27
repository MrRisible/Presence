<?php
ob_start();
include ('index.php');
ob_clean();
include ('../connect/connect.php');
date_default_timezone_set('Asia/Manila');
$ID=$_GET['id'];
$date = date("d/m/Y") ;
$time = date("h:i:sa");

$query1 = $conn->prepare("INSERT INTO activity_logs(userID, FirstName, LastName, usertype, Activity, Date, Time) SELECT '$ID',teacher_info.FirstName, teacher_info.LastName,'Teacher','added an attendance.','$date', '$time' FROM teacher_info WHERE teacher_info.TeacherID = '$ID'");
$query1 -> execute();

$rfid_value = $_POST["action"];

$subject_value=$_POST["Subject"];
$query = $conn->prepare("INSERT INTO attendancelogs(RFID, Date,Time, Subject, id)
                          Values ('$rfid_value','$date','$time','$subject_value','$ID')");

$query -> execute();

header('Location: index.php');



?>