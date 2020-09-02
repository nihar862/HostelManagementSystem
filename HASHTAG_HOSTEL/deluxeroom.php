<!DOCTYPE html>
<html>
<title>TYPE-2</title>
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
    <style>
        ul  {
  list-style: square inside url("sqpurple.gif");
}
        </style>
    <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Deluxe Room</h3>
  </div>
    
    <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
        <img class="w3-image" src="files/deluxe1.jpg" alt="Architecture" width="500" height="500">
  <ul align="">
  <li>Two Sharing Room</li>
  <li>Television And Air Conditioning</li>
  <li>Cupboards For Each</li>
  <li>Tables for each student</li>
  <li>Price for Regular Room is 55000/-</li>
</ul></align>
</header>


</body>
</html>