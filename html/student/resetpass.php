<?php
include ('../connect/connect.php');

$ID=$_GET['id'];
date_default_timezone_set('Asia/Manila');
$date = date("d/m/Y") ;
$time = date("h:i:sa");
$newconpass = hash('sha512',$_POST['conpass']);

$query1 = $conn->prepare("INSERT INTO activity_logs(userID, FirstName, LastName, usertype, Activity, Date, Time) SELECT '$ID',student_info.FirstName, student_info.LastName,'Student','changed password.','$date', '$time' FROM student_info WHERE student_info.StudentID = '$ID'");
$query1 -> execute();

    $sql = "UPDATE accounts SET password='$newconpass' WHERE id = '$ID'";
    $result = mysqli_query($conn, $sql);

    if($result == 1){
        $_SESSION['status'] = "Password changed successful";
        $_SESSION['statusicon'] = "success";
        header('Location: index.php');
    }
    


?>