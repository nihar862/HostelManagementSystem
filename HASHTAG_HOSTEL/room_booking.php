<?php
session_start();
        if(!isset($_SESSION['user'])){header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
echo "
             <head><title>BOOK A ROOM</title> <link rel='stylesheet' href='css/blended_layout.css'></head><header>
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
  </header>";
try{
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");    
    }   
catch (Exception $e) 
{
    die("error connection to database");
}
 $stmt=$dbh->prepare("select room_no from students_data where email_id=?");
 $stmt->execute(array($_SESSION['user']));
 $result=$stmt->fetch();
 if($result['room_no']!=null && !empty($result['room_no']))
 {
     header("location:http://localhost/HASHTAG_HOSTEL/room.php?message=YOU HAVE BOOKED A ROOM ALREADY");
 }
 $stmt=$dbh->prepare("select * from room_data;");
 $stmt->execute();
?>
<html>
    <body><center><br><br><br><div class="form4"><center><h1>BOOK A ROOM</h1></center>
        
            <table border="3.5" class="table4">
                <tr>
                    <th>ROOM NO</th>
                    <th>ROOM TYPE</th>
                    <th>CAPACITY</th>
                    <th>AVAILABLE SEATS</th>
                    <th>WHAT'S INCLUDED?</th>
                    <th>CO-ORDINATOR</th>
                    <th>RENT</th>
                    <th>CONTACT NO</th>
                    <th>BOOK</th>
                </tr>
     <?php 
        $i=1;
        while($result[$i]=$stmt->fetch())
        {echo 
            "<form action='room_reg.php' method='POST'><tr>
                    <td>".$result[$i]['room_no']."</td>
                    <td>".$result[$i]['type']."</td>
                    <td>".$result[$i]['seater']."</td>
                    <td>".$result[$i]['status']."</td>
                    <td>".$result[$i]['func']."</td>
                    <td>".$result[$i]['coordinator']."</td>
                    <td>".$result[$i]['rent']."</td>
                    <td>".$result[$i]['contact_no']."</td>";
                    //$submit='submit'.$i;
                    echo "<input type='hidden' name='roomno' value='".$result[$i]['room_no']."'>";
                    echo "<input type='hidden' name='status' value='".$result[$i]['status']."'>";
                    if($result[$i]['status']==0){echo '<td>FULL</td>';}
                    else{echo "<td><div class='sub2'><input type='submit' name='submit' value='available'></div></td>";}
                    $i=$i+1;
                    echo '</tr></form>';
        }
        //$max_i=$i;
        
        ?>           
            </table></div>   
<?php 
$i=1;
/*while($i<$max_i){
    if(isset($_POST['submit'.$i])){
    $status= $result[$i]['status']-1;
    $stmt2=$dbh->prepare("update room_data set status=? where room_no=?");
    $stmt2->execute(array($status,$result[$i]['room_no']));
    $stmt=$dbh->prepare("update students_data set room_no=? where email_id=?");
    $stmt->execute(array($result[$i]['room_no'],$_SESSION['user']));
//header("location:http://localhost/HASHTAG_HOSTEL/room.php?message=YOU ARE REGISTERED SUCCESSFULLY");        
    }     
}
*/
?> 
        
    </center></body></html>