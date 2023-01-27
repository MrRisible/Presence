<?php
session_start();

include "../connect/connect.php";


    $studentRFID = $_POST['studentRFID'];
    $studfname = $_POST['studentFirstName'];
    $studlname = $_POST['studentLastName'];
    $studID = $_POST['studentID'];
    $studgrade = "Grade ".$_POST['studentGradeLevel'];
    $studsection = $_POST['studentSection'];
    $studaddress = $_POST['studentAddress'];
    $studusertype = 'student';
    $defaultpassword = hash('sha512','tnhs123');
    //**LACK IMAGE UPLOAD

    $pname = $_POST['parentFirstName'];
    $plname = $_POST['parentLastName'];
    $pcontact = $_POST['parentContact'];
    $studUsername = "TNHS".substr($studID,0,4).substr($studfname,0,1).substr($studlname,0,1);

    $sql = "INSERT INTO student_info (StudentID, RFID, FirstName, LastName, Grade,Section, Address) VALUES (?,?,?,?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $stmtinsert->bind_param('sssssss',$studID, $studentRFID, $studfname, $studlname, $studgrade, $studsection, $studaddress);
    $result = $stmtinsert->execute();

    $sql1 = "INSERT INTO guardian_info (Stud_ID, GuardianFirstName, GuardianLastName, TelPhone) VALUES (?,?,?,?)";
    $stmtinsert1 = $conn->prepare($sql1);
    $stmtinsert1->bind_param('ssss',$studID, $pname, $plname, $pcontact);
    $result1 = $stmtinsert1->execute();

    
    $sql2 = "INSERT INTO accounts (id, usertype, username, password) VALUES (?,?,?,?)";
    $stmtinsert2 = $conn->prepare($sql2);
    $stmtinsert2->bind_param('ssss',$studID, $studusertype, $studUsername, $defaultpassword);
    $result2 = $stmtinsert2->execute();

    if($result == 1){
        $_SESSION['status'] = "Successfully Added!";
        $_SESSION['statusicon'] = "success";
        header('Location: registration_form.php');
        
        
    }
    else{
        echo "Error saving data";
        echo "$result";
        
        
    }
    
    
