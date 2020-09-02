<?php
session_start();
        if(!isset($_SESSION['user'])){header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
echo "
             <head><title>MY ROOM</title> <link rel='stylesheet' href='css/blended_layout.css'></head>
             <header>
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

if(isset($_GET['message']))
{
   echo "<script>alert('CONFIRM YOUR BOOKING BY PAYING FEES TO ADMINISTRATION OFFICE');</script><center><h2>".$_GET['message']."</h2></center>"; 
}
try
{
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");    
    }   
catch (Exception $e) 
{
    die("error connection to database");
}
 $stmt1=$dbh->prepare("select * from students_data where email_id=?");
$stmt1->execute(array($_SESSION['user']));
$result=$stmt1->fetch();
$name=$result['name'];
$id=$result['reg_no'];
$room=$result['room_no'];
if($room==null || empty($room)){header("location:http://localhost/HASHTAG_HOSTEL/room_booking.php");}
$stmt2=$dbh->prepare("select * from room_data where room_no=?");
$stmt2->execute(array($room));
$result2=$stmt2->fetch();
$stmt3=$dbh->prepare("select * from students_data where room_no=?");
$stmt3->execute(array($room));
echo    "<center><br><br><table><th colspan='2'><center>ROOM INFORMATION</center></th><tr><td>NAME: </td><td>".$name
        ."</td></tr><tr><td>REGISTRATION NO:  </td><td>".$id
        ."</td></tr><tr><td>ROOM NO:  </td><td>".$room
        ."</td></tr><tr><td>ROOM TYPE:  </td><td>".$result2['type']." ( ".$result2['func']." )"
        ."</td></tr><tr><td>STATUS:  </td><td>".$result2['status']." seats available"
        ."</td></tr><tr><td>RENT:  </td><td>".$result2['rent']
        ."</td></tr><tr><td>CO-ORDINATOR:  </td><td>".$result2['coordinator']."</td>"
        . "</td></tr><tr><td>CONTACT NO:  </td><td>".$result2['contact_no']."</tr></table>";
echo "<br><br><table><th colspan='5'><center>ROOMMATES</center></th>";
       while ($result2=$stmt3->fetch()){
          if($result2['name']!=$name){
           echo "<tr>"
                    ."<td>".$result2['name']."</td>"
                    ."<td>".$result2['reg_no']."</td>"
                    ."<td>".$result2['contact_no']."</td>"
                    ."<td>".$result2['email_id']."</td>"
                    ."<td>".$result2['course']."  -  ".$result2['sem']."</td>"
                    ."</tr>";
       }
}echo '</table>';
echo "<br><h2><a href='Ereceipt.php'>PRINT E RECEIPT</a></h2></center>";?>
<html>
    <body><center><div class=''><form action="feedback.php"  method="POST">
                <textarea placeholder=' YOU CAN SUBMIT YOUR COMPLAINTS HERE...' rows='3' cols='70' name="feedback" required=""></textarea></br></br>
            <div class='sub'><input type="submit" value='SUBMIT'></div>
        </form></center></body>
</html>