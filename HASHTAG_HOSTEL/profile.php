<?php
echo "<head><title>MY PROFILE</title></head>";
session_start();
if(!isset($_SESSION['user']))
    {header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
else{
    
         echo "  <html>
             <head><title></title> <link rel='stylesheet' href='css/blended_layout.css'></head><header>
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
          </li>          <div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>
        </html>"."<center>";
    try{$conn = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");}   
catch(Exception $e) 
{die("error connection to database");}
$stm=$conn->prepare("select * from students_data where email_id=?");
$stm->execute(array($_SESSION['user']));
$result=$stm->fetch();
echo '<br><br><br><div style="overflow-x:auto;"><table><tr><td width=32%>REGISTRATION NO:</td><td>'.$result['reg_no'];
echo "</td><td rowspan='7' width='180'><img src='profile_pics/".$result['image']."' height='225' width='175'></td>";
echo "</tr><tr><td>NAME:</td><td>".$result['name'];
echo '</td></tr><tr><td>PHONE NO:</td><td>'.$result['contact_no'];
echo "</td></tr><tr><td>EMAIL ID:</td><td>".$result['email_id'];
echo '</td></tr><tr><td>EMERGENCY PHONE NUMBER:</td><td>'.$result['emer_no'];
echo '</td></tr><tr><td>BIRTHDATE:</td><td>'.$result['birthdate'];
echo "</td></tr><tr><td>COURSE:</td><td>".$result['course'];
echo "</td></tr><tr><td>SEM:</td><td colspan='2'>".$result['sem'];
echo "</td></tr><tr><td >ADDRESS:</td><td colspan='2'>".$result['address'];
echo "</td></tr><tr><td>CITY:</td><td colspan='2'>".$result['city'];
echo "</td></tr><tr><td>STATE:</td><td colspan='2'>".$result['state'];
echo "</td></tr><tr><td>ROOM NO:</td><td colspan='2'>".$result['room_no'];
echo "</td></tr><tr><td>FEES STATUS:</td><td colspan='2'>".$result['fees_status'];
echo "</tr><table></div><br><h2><a href='edit_profile.php'>EDIT YOUR PROFILE</a></h2></center>";



}


