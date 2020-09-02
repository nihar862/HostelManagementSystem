<html>
<head><title>EDIT PROFILE</title>
    <link rel="stylesheet" href="css/blended_layout.css"></head>

<body>
    <?php
    session_start();
if(!isset($_SESSION['user']))
{header("location:http://localhost/HASHTAG_HOSTEL/index.php");}?>
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
          <li><div class='dropdown'><?php                   
            $nm=new PDO('mysql:host=127.0.0.1;dbname=data_hostel','root','');
            $get_name=$nm->prepare('select name from students_data where email_id=?');
            $get_name->execute(array($_SESSION['user']));
            echo strtoupper(preg_split('/ /',$get_name->fetch()['name'])[1]); ?>       
            <div class='dropdown-content'><a href='logout.php'>LOG OUT</a>
                  <a href='change_password.php'>CHANGE PASSWORD</a></div></div>
          </li>  <div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>
<center>
<?php 

    if(isset($_POST['update'])){
        try{$dbh = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");}   
        catch (Exception $e){die("error connection to database");}
        $stmt=$dbh->prepare("update students_data set name=?,contact_no=?,birthdate=?,course=?,sem=?,emer_no=?,address=?,city=?,state=? where email_id=?");
        $stmt->execute(array($_POST['name'],$_POST['cno'],$_POST['date'],$_POST['cor'],$_POST['sm'],$_POST['ecn'],$_POST['addr'],$_POST['city'],$_POST['state'],$_SESSION['user']));
    }
    
try{$conn = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");}   
catch (Exception $e){die("error connection to database");}
 $stm=$conn->prepare("select * from students_data where email_id=?");
 $stm->execute(array($_SESSION['user']));
$result=$stm->fetch();
?><br><br><div class="form2"><center><h1>EDIT PROFILE</h1></center>
<form action="" method="POST">
    <table class="table2"><tr><td>Registration No:</td><td><input type="text" name="reg_no" value="<?php echo $result['reg_no'];?>" readonly=""></td></tr>
    <tr><td>Name:</td><td><input type="text" name="name" required="" value="<?php echo $result['name'];?>"></td></tr>
  <tr><td>Birth Date:</td><td><input type="date" name="date" value='<?php echo $result['birthdate'];?>'/></td></tr>
    <tr><td>Contact NO:</td><td><input type="text" name="cno" value="<?php echo $result['contact_no'];?>"></td></tr>
    <tr><td>Emergency Contact No:</td><td><input type="text" name="ecn" value="<?php echo $result['emer_no'];?>"></td></tr>
    <tr><td>Course:&emsp;&ensp;&emsp;&ensp;&emsp;<select name="cor" >
        <option value="<?php echo $result['course'];?>"><?php echo $result['course'];?></option>
        <option value="CE">CE</option><option value="CIVIL">CIVIL</option>
        <option value="EC">EC</option><option value="IC">IC</option>
        <option value="IT">IT</option><option value="CHEM">CHEM</option>
        <option value="MECH">MECH</option></select></td><td>
    Sem:&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;<select name="sm">
        <option value="<?php echo $result['sem'];?>"><?php echo $result['sem'];?>
        <option value="1">1</option><option value="2">2</option>
        <option value="3">3</option><option value="4">4</option>
        <option value="5">5</option><option value="6">6</option>
        <option value="7">7</option><option value="8">8</option>
    </select></td></tr>
   <tr><td> Email Id:</td><td><input type="text" name="eid" value="<?php echo $result['email_id'];?>" readonly=""></td></tr>
   <tr><td> Address:</td><td><input type="text" name="addr" value="<?php echo $result['address'];?>"></td></tr>
   <tr><td> City:</td><td><input type="text" name="city" value="<?php echo $result['city'];?>"></td></tr>
    <tr><td>State:</td><td><input type="text" name="state" value="<?php echo $result['state'];?>"></td></tr></table>
    <br><center><a href='change_password.php'>CHANGE PASSWORD</a></center><br>
    <div class="button2">
    <input type="submit" name="update" value="UPDATE"></div>
    <div class="button2"><input type="button" value="DONE" onclick="location.href='profile.php'"></div>
<br></form></div>
</center>
</body>
