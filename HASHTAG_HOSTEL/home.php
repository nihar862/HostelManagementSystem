<html>
<title>HOME</title>
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
<!-- Header -->
  <img class="w3-image" src="files/architecture.jpg" alt="Architecture" width="1600" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
      <br><br><h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Hashtag</b></span> <span class="w3-padding w3-black w3-opacity-min"><b>Hostel</b></span></h1>
  </div>
