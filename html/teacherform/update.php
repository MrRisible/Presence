<?php 
session_start();
include "../connect/connect.php";
$teacherID=$_GET['id'];

    $teachID = $_POST['teacherID'];
    $teachfname = $_POST['teacherFirstName'];
    $teachlname = $_POST['teacherLastName'];

    $teachUserName = $_POST['teacherUserName'];
    

    $sql = "UPDATE teacher_info set TeacherID='$teachID', FirstName='$teachfname', LastName='$teachlname' where TeacherID='$teacherID'";
    $result = mysqli_query($conn, $sql);
    
    $sql2 = "UPDATE accounts set id='$teachID', username='$teachUserName' where id='$teacherID'";
    $result2 = mysqli_query($conn, $sql2);

    if($result && $result2 == 1){
        $_SESSION['status'] = "Successfully Updated!";
        $_SESSION['statusicon'] = "success";
        header('Location: ../presence/teachertable.php');
    }
    else{
        
        echo "$result";
        
        
    }
    
?>