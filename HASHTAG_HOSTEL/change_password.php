<?php 
        session_start();

echo "
    <head><title>CHANGE PASSWORD</title> <link rel='stylesheet' href='css/blended_layout.css'></head><header>
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
        echo      "<div class='dropdown-content'><a href='logout.php'>LOG OUT</a><a href='change_password.php'>CHANGE PASSWORD</a></div></div></li>
              <div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>";
        if(!isset($_SESSION['user']))
        {header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
        echo "<br><br><br><center><div class='form2'><h1>WANT TO CHANGE YOUR PASSWORD?</h1><form action='' method='post'><table class='table2'><tr><td>OLD PASSWORD:</td><td><input type='password' name='oldpass' required=''></td></tr>"
        . "<tr><td>NEW PASSWORD:</td><td><input type='password' name='pass' required=''></td></tr>"
        . "<tr><td>RE-ENTER NEW PASSWORD:</td><td><input type='password' name='repass' required=''></td></tr></table>"
        . "<br><div class='button3'><input type='submit' name='submit' value='CHANGE PASSWORD'></div>"
                . "</br></br></br><center><a href='forget_password.php'>FORGET PASSWORD?</a></center></form><center>";
        if(isset($_POST['submit'])){
         if($_POST['pass']==$_POST['repass']){   
        try{$dbh = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");}   
        catch (Exception $e){die("error connection to database");}
        $stm=$dbh->prepare("select password from students_data where email_id=?");
        $stm->execute(array($_SESSION['user']));
        $result=$stm->fetch();
        if($result['password']== md5($_POST['oldpass']))
            {
            $qur=$dbh->prepare("update students_data set password=? where email_id=?");
            $qur->execute(array(md5($_POST['pass']),$_SESSION['user']));
            }
        else{echo 'OLD PASSWORD IS WRONG';}
        }
        else{echo "NEW PASSWORD DOESN'T MATCH";}
        }
   echo "</div>";
        ?>