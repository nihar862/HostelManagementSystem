<html>    
<head><title>REGISTRATION PAGE</title> <link rel='stylesheet' href='css/blended_layout.css'></head>
<body><header>
    <div class='container'> 
      <h1 class='logo'></h1>

      <nav>
        <ul>
          <li><a href="home.php">HOME</a></li>
          <li><a href="index.php">LOG IN</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="AboutUs.php">ABOUT US</a></li>
          <li><a href='files/rules_and_regulations.pdf'>RULES & REGULATIONS</a></li>
            <div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>
<center>
<?php 
    try{$dbh=new PDO("mysql:host=127.0.0.1;dbname=data_hostel","root","");}
    catch (Exception $e){echo 'CONNECTION TO THE DATABASE FAILED';}
    $query=$dbh->prepare("select * from students_data");
    $query->execute();
    while($result=$query->fetch()){$reg_no=$result['reg_no'];}
    $str= implode(explode('R_',$reg_no));
    $reg_no= "R_".sprintf("%03d",$str+1);
?><br><br><div class="form2"><center><h1>WELCOME TO HASHTAG HOSTEL</h1><center>
    <form action="" method="POST" enctype="multipart/form-data"><table class="table2">
    <tr><td>Registration No:</td><td><input type="text" name="reg_no" value=<?php echo $reg_no; ?> readonly></td></tr>
    <tr><td>First Name:</td><td><input type="text" name="Fname" required="" ></td></tr>
    <tr><td>Middle Name:</td><td><input type="text" name="Mname" required="" ></td></tr>
    <tr><td>Last Name:</td><td><input type="text" name="Lname" required=""></td></tr>
    <tr><td>Birth Date:</td><td><input type="date" name="date" required=""/></td></tr>
    <tr><td>Contact NO:</td><td><input type="text" name="cno" required="" ></td></tr>
    <tr><td>Course:&emsp;&ensp;&emsp;&ensp;&emsp;<select name="course">
        <option value="CE">CE</option>
        <option value="IT">IT</option>
        <option value="EC">EC</option>
        <option value="CHEM">CHEM</option>
        <option value="CIVIL">CIVIL</option>
        <option value="IC">IC</option>
        <option value="MECH">MECH</option>
    </select></td><td>
    Sem:&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;<select name="sem">
        <option value="1">1</option><option value="2">2</option>
        <option value="3">3</option><option value="4">4</option>
        <option value="5">5</option><option value="6">6</option>
        <option value="7">7</option><option value="8">8</option>
    </select></td></tr>
    <tr><td>Emergency Contact No:</td><td><input type="text" name="ecn" required="" ></td></tr>
    <tr><td>Email Id:</td><td><input type="text" name="email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></td></tr>
    <tr><td>Password:</td><td><input type="password" name="pass" required=""></td></tr>
    <tr><td>Re-enter Password:</td><td><input type="password" name="repass" required="" ></td></tr>
    <tr><td>Address:</td><td><input type="text" name="addr" required=""></td></tr>
    <tr><td>City:</td><td><input type="text" name="city" required=""></td></tr>
    <tr><td>State:</td><td><input type="text" name="state" required=""></td></tr>
    <tr><td>Profile Picture:</td><td><input type="file" name="myFile"></td></tr></table><br>
        <div class="button2"><input type="submit" name="submit" >
    <input type="reset"></div>
</form>
    </div>
<?php
if(isset($_POST["submit"]))
{
    $query2=$dbh->prepare("select * from students_data");
    $query2->execute();
    while($result1=$query2->fetch())
    {if($_POST['email']==$result1['email_id']){$a=1;break;}else{$a=0;}}
    if($a==0){ 
        if($_POST["pass"] == $_POST["repass"]) //constraint for password
        {
            if(($_FILES['myFile']['name'])){
                if(pathinfo($_FILES['myFile']['name'],PATHINFO_EXTENSION)=='jpg' || pathinfo($_FILES['myFile']['name'],PATHINFO_EXTENSION)=="jpeg" || pathinfo($_FILES['myFile']['name'],PATHINFO_EXTENSION)=='JPG' || pathinfo($_FILES['myFile']['name'],PATHINFO_EXTENSION)=="JPEG"){
                if($_FILES['myFile']['size']<1250000){
                    try{
                        $filename=$_FILES['myFile']['tmp_name'];
                        $destination="C:/xampp/htdocs/HASHTAG_HOSTEL/profile_pics/". basename($_FILES['myFile']['name']);
                        $result= move_uploaded_file($filename, $destination);
                        $newname="C:/xampp/htdocs/HASHTAG_HOSTEL/profile_pics/".$_POST['reg_no'].".".pathinfo($_FILES['myFile']['name'],PATHINFO_EXTENSION);;
                        $image=$_POST['reg_no'].".".pathinfo($_FILES['myFile']['name'],PATHINFO_EXTENSION);
                        $result2=rename($destination,$newname);   
                        if(!$result || !$result2){
                            echo "<script>alert('SOMETHING WENT WRONG PLEASE TRY AGAIN');</script>";
                            header("location:http://localhost/HASHTAG_HOSTEL/registration.php");
                        }
                        $phonereg = "/^([+]\d\d)?[0-9]{10}$/";         
                        if(preg_match($phonereg, $_POST['cno']) && preg_match($phonereg,$_POST['ecn'])){
                            $passreg="/([a-zA-Z0-9@$]){5}[a-zA-Z0-9@$]+/";
                            if(preg_match($passreg,$_POST['pass'])){
                                $dbh = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root",""); 
                                $qury="insert into students_data (reg_no,name,birthdate,contact_no,email_id,emer_no,course,sem,password,address,city,state,image) values("."'".$_POST['reg_no']."',"."'".$_POST["Fname"]." ".$_POST["Mname"]." ".$_POST["Lname"]."',"."'".$_POST["date"]."',"."'".$_POST["cno"]."',"."'".$_POST["email"]."',"."'".$_POST["ecn"]."',"."'".$_POST["course"]."',"."'".$_POST["sem"]."',"."'".md5($_POST["pass"])."',"."'".$_POST["addr"]."',"."'".$_POST["city"]."',"."'".$_POST["state"]."',"."'".$image."')"; 
                                //echo $qury;
                            $dbh->query($qury);
                            session_start();
                            $_SESSION["user"] = $_POST["email"];
                            header("location:http://localhost/HASHTAG_HOSTEL/profile.php");
                            }
                            else{echo "<script>alert('PASSWORD MUST BE 6 CHARACTER LONG AND IT CONTAINS ONLY a-z, A-Z, 0-9,@ or $');</script>";}}
                        else{echo "<script>alert('PROVIDED MOBILE NUMBER IS INVALID');</script>";}
                        }   
                catch (Exception $e){die("error connection to database");}
                
                }
                else{echo "YOUR PICTURE IS TOO LARGE,THE SIZE OF YOUR PICTURE IS".$_FILES['myFile']['size']."IT SHOULD BE LESS THAN 1 MB";}
                }
                else{echo "<script>alert('THE GIVEN FORMAT OF PROFILE PICTURE IS NOT SUPPORTED               IT SHOULD BE EITHER jpg OR jpeg');</script>";}
            }
            else{echo "<script>alert('PLEASE PROVIDE YOUR PASSPORT SIZE PICTURE');</script>";}
        }
        else{echo "<script>alert('PASSWORD DOES NOT MATCH');</script>";}
}
else{echo "ONE ACCOUNT IS ASSOCIATED WITH THIS EMAIL ALREADY"."<br><a href='index.php'>CLICK HERE TO LOGIN</a>";}
}
?>
</center>
</body>
