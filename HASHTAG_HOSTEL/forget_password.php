<?php
echo "
             <head><title>EMAIL VERFICATION</title> <link rel='stylesheet' href='css/blended_layout.css'></head><header>
    <div class='container'> 
      <h1 class='logo'></h1>

      <nav>
        <ul>
          <li><a href='home.php'>HOME</a></li>
          <li><a href='index.php'>LOGIN / REGISTER</a></li>
          <li><a href='gallery.php'>GALLERY</a></li>
          <li><a href='AboutUs.php'>ABOUT US</a></li>
            <div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>";
echo "<center><br><br><br><br><br><div class='form'><h1>FORGOT PASSWORD?</h1>WE WILL SENT YOU A MAIL ON YOUR EMAIL ADDRESS WITH A LINK TO RESET YOUR PASSWORD<br><br><form action='' method='POST'>
    <br><input type='text' name='email' required='' placeholder='ENTER YOUR EMAIL ADDRESS'>
    <br><div class='button'><input type='submit' name='submit'/>
    </form></div>";
    if(isset($_POST['submit'])){
    try{$dbh=new PDO("mysql:host=127.0.0.1;dbname=data_hostel","root","");}
    catch (Exception $e){echo 'SOMETHING WENT WRONG,CONNECTION TO THE DATABASE FAILED';} {
    $query=$dbh->prepare("select name from students_data where email_id=?");
    $query->execute(array($_POST['email']));
    $res=$query->fetch()['name'];    
    if($res== null){echo "THERE IS NO ACCOUNT WITH SUCH EMAIL";}
    else{
        $token="abcdefghijklmnopqrstuvwxyz1234567890";
        $tokenkey=str_shuffle($token);
        $key=substr($tokenkey,"0","10");
        $stmt=$dbh->prepare("update students_data set token=? where email_id=?");
        $stmt->execute(array($key,$_POST['email']));
        $to=$_POST["email"];
        $subject="RESET YOUR PASSWORD";
        $message =  "<h1>HEY THERE!!<h1><br>".
                    "<h3>RECENTLY WE GOT REQUEST FROM YOU TO RESET YOUR PASSWORD<br>HERE IS A LINK TO RESET YOUR PASSWORD"
                    ."<br><h2><a href='http://localhost/HASHTAG_HOSTEL/reset_password.php?email=$to&token=$key'>CLICK HERE TO RESET PASSWORD</a></h2>"
                . "<h5>IF IT WAS NOT YOU KINDLY IGNORE THIS EMAIL.</h5>";
        $headers =  "From: hostel.management.2510@gmail.com" . "\r\n" . 
                    "MIME-Version: 1.0" . "\r\n" . 
                    "Content-Type: text/html; charset=utf-8";
        $result = mail($to, $subject, $message,$headers);
        if(($result)){echo "<script>alert('A MAIL WITH RESET PASSWORD LINK HAS BEEN SENT TO YOUR EMAIL ID. CHECK YOUR INBOX, IF YOU DO NOT FIND ANYTHING CHECK YOUR SPAM BOX');</script>";}
        else{echo "SOMETHING WENT ,PLEASE TRY AGAIN LATER";}
        }
    }
}
     echo '</div></center>';  