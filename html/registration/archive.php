<?php
session_start();

date_default_timezone_set('Asia/Manila');
      $date = date("d/m/Y");
      $time = date("h:i:sa");
 
	$studentID=$_GET['id'];
	include "../connect/connect.php";

    $sql0 = "INSERT INTO student_archive(StudentID, RFID, FirstName, LastName, Grade, Address, GuardianFirstName, GuardianLastName, TelPhone, usertype, username, Date, Time) SELECT student_info.StudentID, student_info.RFID, student_info.FirstName, student_info.LastName, student_info.Grade, student_info.Address, guardian_info.GuardianFirstName, guardian_info.GuardianLastName, guardian_info.TelPhone, accounts.usertype, accounts.username,'$date','$time' FROM student_info, guardian_info, accounts WHERE student_info.StudentID = '$studentID' AND guardian_info.Stud_ID = '$studentID' AND accounts.id = '$studentID'";
    $result0 = mysqli_query($conn, $sql0);

	$sql = "DELETE from student_info where StudentID='$studentID'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "DELETE from guardian_info where Stud_ID='$studentID'";
    $result1 = mysqli_query($conn, $sql1);

    $sql2 = "DELETE from accounts where id='$studentID'";
    $result2 = mysqli_query($conn, $sql2);

    if($result && $result1 && $result2 && $result0 == 1){
        $_SESSION['status'] = "Archived Successfully!";
        $_SESSION['statusicon'] = "success";
        header('Location: ../presence/datatable.php');

    }
    else{
        
        echo "$result";
        
    }
?>