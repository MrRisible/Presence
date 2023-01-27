<?php
session_start();
	$teacherID=$_GET['id'];
    date_default_timezone_set('Asia/Manila');
      $date = date("d/m/Y");
      $time = date("h:i:sa");
	include "../connect/connect.php";

    $sql = "INSERT INTO teacher_archive(TeacherID, FirstName, LastName, usertype, username, Date, Time) SELECT teacher_info.TeacherID, teacher_info.FirstName, teacher_info.LastName, accounts.usertype, accounts.username, '$date', '$time' FROM teacher_info,accounts WHERE teacher_info.TeacherID = '$teacherID' and accounts.id = '$teacherID'";
    $result = mysqli_query($conn, $sql);

	$sql1 = "DELETE from teacher_info where teacherID='$teacherID'";
    $result1 = mysqli_query($conn, $sql1);


    $sql2 = "DELETE from accounts where id='$teacherID'";
    $result2 = mysqli_query($conn, $sql2);

    if($result1 && $result2 == 1){
        $_SESSION['status'] = "Archived Successful!";
        $_SESSION['statusicon'] = "success";

        header('Location: ../presence/teachertable.php');

    }
    else{
        
        echo "$result";
        
    }
?>