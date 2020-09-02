<!DOCTYPE html>
<html>
<title>ROOMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/blended_layout.css">

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
<!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Rooms</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
          <a href="regularroom.php"><div class="w3-display-topleft w3-black w3-padding">Regular Room</div></a>
        <img src="files/room1.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
          <a href="deluxeroom.php"><div class="w3-display-topleft w3-black w3-padding">Deluxe Room</div></a>
        <img src="files/deluxe1.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
          <a href="superdeluxeroom.php"><div class="w3-display-topleft w3-black w3-padding">Super Deluxe Room</div></a>
        <img src="files/6.jpg" alt="House" style="width:100%">
      </div>