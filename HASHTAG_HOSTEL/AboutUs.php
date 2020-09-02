<?php
echo "
             <head><title>ABOUT US</title> <link rel='stylesheet' href='css/blended_layout.css'></head><header>
    <div class='container'> 
      <h1 class='logo'></h1>

      <nav>
        <ul>
          <li><a href='home.php'>HOME</a></li>";       
        session_start();
        if(isset($_SESSION['user'])){echo "<li><a href='profile.php'>LET ME IN</a></li>";$value=1;}
        else{echo "<li><a href='index.php'>LOGIN / REGISTER</a></li>";}
        
          echo "
          <li><a href='gallery.php'>GALLERY</a></li>
          <li><a href='AboutUs.php'>ABOUT US</a></li>
          </li>  <div class='logo'><img src='files/logo.jpg' height='43' width='220'></div>

        </ul>
      </nav>
    </div>
  </header>";
   
    {

echo "<div style=''>
        <div style='
            border-radius: 17px; 
            position:absolute;
            top:170px;
            left:240px;
            background: #99baef;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 30px;
            padding-top:10px;
            text-align: center;
            box-shadow: 0 0 200px 0 rgba(0, 0, 0, 0.2), 0 15px 15px 0 rgba(0.99, 0.99, 0.99, 0.99);'>
            <h1 style='color:#fff;font-family: calibri;'>ANKIT <BR>PARMAR</h1>ID : 17CEUBG014<br><br><br>CONTRIBUTION :<br>CSS CODING
            <br><br><h2>CE87<h2></div>";

echo"<div style='
            z-index:0;
            border-radius: 17px; 
            position:absolute;
            top: 150px;
            left:530px;
            background: #99baef;
            margin: 0 auto 100px;
            padding: 60px;
            padding-top:10px;
            text-align: center;
            box-shadow: 0 0 200px 0 rgba(0, 0, 0, 0.2), 0 15px 15px 0 rgba(0.99, 0.99, 0.99, 0.99);'>
            <h1 style='color:#fff;font-family:calibri;font-size:65px'>AYUSH PATEL</h1><h2>ID : 17CEUOG067<br><br>CONTRIBUTION :<br>
            PHP CODING (BACK-END)<br></h2><h2 style='font-size:35px;'>CE97</h2>";

echo "</h2></div><div style='
            border-radius: 17px; 
            position:absolute;
            top: 170px;
            left:1060px;
            background: #99baef;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 30px;
            padding-top:10px;
            text-align: center;
            box-shadow: 0 0 200px 0 rgba(0, 0, 0, 0.2), 0 15px 15px 0 rgba(0.99, 0.99, 0.99, 0.99);'>
            <h1 style='color:#fff;font-family: calibri;'>NIHAR <br>PARMAR</h1>ID : 17CEUON117<br><br>CONTRIBUTION :<br>DATABASE & TESTING
            <br><br><h2>CE91<h2></div>";    
}