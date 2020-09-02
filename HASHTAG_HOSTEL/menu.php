<?php
session_start();

echo "
             <head><title>TODAY'S MENU</title> <link rel='stylesheet' href='css/blended_layout.css'></head><header>
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
    if(!isset($_SESSION['user']))
    {header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
    else
    {
        $day=date('D',time());
        try{
    $conn = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");    
    }   
catch (Exception $e) 
{
    die("CONNECTION TO DATABASE FAILED");
}
 $stm=$conn->prepare("select * from menu where day=?");
 $stm->execute(array($day));
$result=$stm->fetch();

echo "<div style='background-image:url(files/canteen.jpg);height: 706px;background-size: 100%;posiotion:fixed;left:0;right:0;'>
        <div style='
            border-radius: 17px; 
            position:absolute;
            top:250px;
            left:240px;
            background: #e0ecff;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 30px;
            padding-top:10px;
            text-align: center;
            box-shadow: 0 0 200px 0 rgba(0, 0, 0, 0.2), 0 15px 15px 0 rgba(0.99, 0.99, 0.99, 0.99);'>
            <h1 style='color:#7ea3dd;font-family: calibri;'>STARTER</h1>".$result['starter']."</div>";

echo"<div style='
            z-index:0;
            border-radius: 17px; 
            position:absolute;
            top: 200px;
            left:510px;
            background: #e0ecff;
            margin: 0 auto 100px;
            padding: 60px;
            padding-top:10px;
            text-align: center;
            box-shadow: 0 0 200px 0 rgba(0, 0, 0, 0.2), 0 15px 15px 0 rgba(0.99, 0.99, 0.99, 0.99);'>
            <h1 style='color:#7ea3dd;font-family:calibri;font-size:65px'>MAIN COURSE</h1><h2>";

$str_arr = preg_split("/,/", $result['maincourse']);
$i=0;
while (!empty($str_arr[$i])){
echo $str_arr[$i].'<br>';
$i++;
}
echo "</h2></div><div style='
            border-radius: 17px; 
            position:absolute;
            top: 250px;
            left:1060px;
            background: #e0ecff;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 30px;
            padding-top:10px;
            text-align: center;
            box-shadow: 0 0 200px 0 rgba(0, 0, 0, 0.2), 0 15px 15px 0 rgba(0.99, 0.99, 0.99, 0.99);'>
            <h1 style='color:#7ea3dd;font-family: calibri;'>DESSERT</h1>".$result['dessert']."</div>";
    }
