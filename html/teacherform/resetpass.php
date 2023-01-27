<?php 
session_start();
include "../connect/connect.php";
$teacherID=$_GET['id'];

$defaultpass = hash('sha512','tnhs123');

$sql = "UPDATE accounts set password='$defaultpass'  where id='$teacherID'";
    $result = mysqli_query($conn, $sql);

    if($result == 1){
        $_SESSION['status'] = "Password set to Default!";
        $_SESSION['statusicon'] = "success";
        header('Location: ../presence/teachertable.php');

    }
?>
