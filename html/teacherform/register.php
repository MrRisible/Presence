<?php
session_start();
include "../connect/connect.php";


    $teachID = $_POST['teacherID'];
    $teachfname = $_POST['teacherFirstName'];
    $teachlname = $_POST['teacherLastName'];
    $usertype = 'teacher';
    $defaultpassword = hash('sha512',"tnhs123");
    //**LACK IMAGE UPLOAD

    $teachUsername = substr($teachID,0,4).substr($teachfname,0,1).substr($teachlname,0,1);

    $sql = "INSERT INTO teacher_info (TeacherID, FirstName, LastName) VALUES (?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $stmtinsert->bind_param('sss',$teachID, $teachfname, $teachlname);
    $result = $stmtinsert->execute();
    
    $sql2 = "INSERT INTO accounts (id, usertype, username, password) VALUES (?,?,?,?)";
    $stmtinsert2 = $conn->prepare($sql2);
    $stmtinsert2->bind_param('ssss',$teachID, $usertype, $teachUsername, $defaultpassword);
    $result2 = $stmtinsert2->execute();

    if($result == 1){
        $_SESSION['status'] = "Successfully Added!";
        $_SESSION['statusicon'] = "success";
        header('Location: teacherform.php');
        
    }
    else{
        echo "Error saving data";
        echo "$result";
        
        
    }
    
    
