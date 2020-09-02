<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:http://localhost/HASHTAG_HOSTEL/index.php");

}
if(isset($_POST['submit'])){
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");    
    echo $_POST['roomno'];
    $rn=$_POST['roomno'];
    echo $_POST['status'];
    $status=$_POST['status']-1;
   
    $stmt1=$dbh->prepare("update students_data set room_no=? where email_id=?");
    $stmt1->execute(array($rn,$_SESSION['user']));
    $stmt2=$dbh->prepare("update room_data set status=? where room_no=?");
    $stmt2->execute(array($status,$rn));
    
header("location:http://localhost/HASHTAG_HOSTEL/room.php?message=YOU ARE REGISTERED SUCCESSFULLY");
}