<html>
    <head><meta name="google-site-verification" content="NwShGVgvbwlZGB-lhWHctGGuSPVUcCfrhxyJRKw1KPU" />
        <meta charset="UTF-8">
        <title>LOGIN PAGE</title>
       <link rel="stylesheet" href="css/blended_layout.css">
       <link href="css/temp.css" rel="stylesheet">

    </head>

    <body>
            <header>

      <nav>
        <ul>
            <li><a href="home.php">HOME</a></li>
        <?php
        session_start();
        if(isset($_SESSION['user'])){echo "<li><a href='profile.php'>LET ME IN</a></li>";$value=1;}
        else{echo "<li><a href='index.php'>LOGIN / REGISTER</a></li>";}
        ?>
          <li><a href="roompics.php">ROOMS</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="AboutUs.php">ABOUT US</a></li>
          <div class="logo"><img src="files/logo.jpg" height="43" width="220"></div>
        </ul>
      </nav>
  </header>
        <div class="back"></div>
        
    <center> </br></br></br></br><div class="login-page"><div class="form"><h1>User Login</h1>
        <form action="" method="POST">
            <div class="input-container">
            
                <input type="text" name="email" required="" placeholder="EMAIL ID" style="padding-left: 50px;font-size: 14px;"><i class="material-icons">face</i></div>
            <div class="input-container">
            <i class="material-icons">vpn_key</i>
            <input type="password" name="pass" required="" placeholder="PASSWORD"style="padding-left: 50px;font-size: 14px;"><br></div>
            <div class='button'>
                <img src="captcha.php"><br><br>
                <input type="text" name="vercode1" placeholder="VERIFICATION CODE"/>
            <input type="submit" name="submit" value='SIGN IN'></div>
            <a href="forget_password.php">Forgot password?</a></br></br>
            <a href="registration.php">Don't have an account?</a>
        </form>
        <?php
        if(isset($value)&&$value==1){echo 'YOU ARE ALREADY LOGGED IN';}
        else
        {
            if(isset($_POST["submit"]))
            {  
            if ($_POST['vercode1'] != $_SESSION['vercode'] OR $_SESSION['vercode']=='')  {
                        echo  "<script>alert('Incorrect verification code');</script>";}
            else{
                try{
                    $dbh=new PDO("mysql:host=127.0.0.1;dbname=data_hostel","root","");
                }
                catch (Exception $e){echo 'SOMETHING WENT WRONG,CONNECTION TO THE DATABASE FAILED';}
                $stmt=$dbh->prepare("select password from students_data where email_id=?;");
                $stmt->execute(array($_POST['email']));
                $result=$stmt->fetch();
                $passkey=$result['password'];
                if($passkey == null){echo "NO ACCOUNT IS ASSOCIATED WITH GIVEN USERNAME";}
                elseif($passkey == md5($_POST['pass']))
                {       
                    $_SESSION["user"]=$_POST["email"];
                    header("location:http://localhost/HASHTAG_HOSTEL/profile.php");
                }
                else
                {
                    echo "INCORRECT USERNAME OR PASSWORD";
            }}
            }
            else{$msg="";}
        }
              ?>
            </div></div>
        
    </center>
</body>
</html>
