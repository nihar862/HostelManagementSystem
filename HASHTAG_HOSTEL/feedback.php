<?php
session_start();
        if(!isset($_SESSION['user'])){header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
echo $_POST['feedback'];
try{$dbh=new PDO("mysql:host=127.0.0.1;dbname=data_hostel","root","");}
    catch (Exception $e){echo 'CONNECTION TO THE DATABASE FAILED';}
    $query=$dbh->prepare("select * from students_data where email_id=?");
    $query->execute(array($_SESSION['user']));
    $result=$query->fetch();
    $reg_no=$result['reg_no'];
    echo "<br>".$reg_no;
    $room_no=$result['room_no'];
    echo "<br>".$room_no;
    
    $query=$dbh->prepare("insert into feedback_sys (reg_no,room_no,complaint_details) values(?,?,?)");
    $query->execute(array($reg_no,$room_no,$_POST['feedback']));
    $message='YOUR COMPLAINT HAS BEEN ISSUED SUCCESSFULLY';
    header("location:http://localhost/HASHTAG_HOSTEL/room.php?message=".$message);