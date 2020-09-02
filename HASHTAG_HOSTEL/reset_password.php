<html>
    <head>
        <meta charset="UTF-8">
        <title>RESET PASSWORD</title>   
        <link rel="stylesheet" href="css/blended_layout.css"></head>
    <body>
        <header>
    <div class='container'> 
    <h1 class='logo'></h1>
      <nav>
        <ul>
          <li><a href="home.php">HOME</a></li>
          <li><a href='index.php'>LOGIN / REGISTER</a></li>
          <li><a href="roompics.php">ROOMS</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="AboutUs.php">ABOUT US</a></li>
          <div class="logo"><img src="files/logo.jpg" height="43" width="220"></div>

        </ul>
      </nav>
    </div>
  </header><?php
            if(isset($_GET['email'])&&isset($_GET['token'])){
                $email=$_GET['email'];
                $token=$_GET["token"];
                try{$dbh=new PDO("mysql:host=127.0.0.1;dbname=data_hostel","root","");}
                catch (Exception $e){echo 'CONNECTION TO THE DATABASE FAILED';} {
                $query=$dbh->prepare("select name from students_data where email_id=? AND token=?");
                $query->execute(array($email,$token));

                if($query->fetch()['name']==null)
                        {
                        header("location:http://localhost/HASHTAG_HOSTEL/forget_password.php");
                       }               
                }
            }
            else{header("location:http://localhost/HASHTAG_HOSTEL/forget_password.php");}
?>
    <center><br><br><br><br><div class="form"><form action="" method="POST">
                <input type="password" name='pass' required="" placeholder="NEW PASSWORD"><br>
                <input type="password" name="repass" required="" placeholder="RE-ENTER NEW PASSWORD"><br><br>
                <div class="button"><input type="submit" name="submit" ></div></form>
        <?php
        if(isset($_POST['submit']))
        {
            if($_POST['pass']==$_POST['repass']) 
            {
                $dbname="data_hostel";
                $host="127.0.0.1";
                $username="root";
                $password="";
                $dsn="mysql:host=$host;dbname=$dbname";
                try{
                $conn=new PDO($dsn, $username, $password);
                }
                catch(Exception $e){die("CONNECTION TO THE DATABASE FAILED");}
                $qur="update students_data set `password`='".md5($_POST["pass"])."' where email_id='$email';";
                $conn->exec($qur);
                echo 'YOUR PASSWORD HAS BEEN UPDATED SUCCESFULLY';
                $qur="update students_data set token='' where email_id='$email';";
                $conn->exec($qur);
            }
            else{
                echo "PASSWORD DOESN'T MATCH";
            }
        }
        ?></div></center>
    </body>
</html>