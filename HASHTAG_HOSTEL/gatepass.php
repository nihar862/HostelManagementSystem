<?php
session_start();
if(!isset($_SESSION['user']))
{header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
if(isset($_GET['msg']))
{
    echo "<script>alert('".$_GET['msg']."');</script>";
}
echo "
             <head><title>GENERATE GATE PASS</title> <link rel='stylesheet' href='css/blended_layout.css'></head><header>
    <div class='container'> 
      <h1 class='logo'></h1>

      <nav>
        <ul>
          <li><a href='profile.php'>MY PROFILE</a></li>          
          <li><a href='room.php'>MY ROOM</a></li>
          <li><a href='gatepass.php'>GENERATE GATE PASS</a></li>
          <li><a href='ereceipt.php'>E-RECEIPT</a></li>
          <li><a href='menu.php'>TODAY's DINNER</a></li>
          <li><div class='dropdown'>";                  
            $nm=new PDO('mysql:host=127.0.0.1;dbname=data_hostel','root','');
            $get_name=$nm->prepare('select name from students_data where email_id=?');
            $get_name->execute(array($_SESSION['user']));
            echo strtoupper(preg_split('/ /',$get_name->fetch()['name'])[1]);        
            echo "<div class='dropdown-content'><a href='logout.php'>LOG OUT</a>
                  <a href='change_password.php'>CHANGE PASSWORD</a></div></div>
          </li>  <div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>";

    echo "<center><br><br><br><div class='form2'><h1>GATE PASS</h1><form action='gatepassgeneration.php' method='POST'>"
            ."<table class='table2'><tr><td>DATE FROM:</td><td><input type='date' name='datefrom' required=''></td></tr>"
            ."<tr><td>DATE TO:</td><td><input type='date' name='dateto' required=''></td></tr>"
            ."<tr><td>PLACE:</td><td><input type='text' name='place' required=''></td></tr>"
            ."<tr><td>REASON TO LEAVE:</td><td><input type='textarea' name='reason' required=''></td></tr></table></br>"
            ."<br><center><div class='button3'><input type='submit' name='submit' value='GENERATE'></div></center>"
        . "</form></div></center>";   
?>      