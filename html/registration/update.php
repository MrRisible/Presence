<?php 
session_start();
include "../connect/connect.php";
$studentID=$_GET['id'];

    $studentRFID = $_POST['studentRFID'];
    $studfname = $_POST['studentFirstName'];
    $studlname = $_POST['studentLastName'];
    $studID = $_POST['studentID'];
    $studgrade = $_POST['studentGradeLevel'];
    $studsection = $_POST['studentSection'];
    $studaddress = $_POST['studentAddress'];
    $defaultpassword = hash('sha512','tnhs123');

    $pname = $_POST['parentFirstName'];
    $plname = $_POST['parentLastName'];
    $pcontact = $_POST['parentContact'];
    $studUsername = $_POST['studentUsername'];
    

    $sql = "UPDATE student_info set StudentID='$studID', RFID='$studentRFID', FirstName='$studfname', LastName='$studlname', Grade='$studgrade', Section='$studsection', Address='$studaddress' where StudentID='$studentID'";
    $result = mysqli_query($conn, $sql);
    
    $sql1 = "UPDATE guardian_info set Stud_ID='$studID', GuardianFirstName='$pname', GuardianLastName='$plname', TelPhone='$pcontact' where Stud_ID='$studentID'";
    $result1 = mysqli_query($conn, $sql1);
    
    $sql2 = "UPDATE accounts set id='$studID', username='$studUsername', password='$defaultpassword' where id='$studentID'";
    $result2 = mysqli_query($conn, $sql2);

    if($result && $result1 && $result2 == 1){
        $_SESSION['status'] = "Successfully Updated!";
        $_SESSION['statusicon'] = "success";
        header('Location: ../presence/datatable.php');

    }
    else{
        
        echo "$result";
        
        
    }
    
?>