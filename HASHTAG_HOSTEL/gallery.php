<!DOCTYPE html>
<html>
<head><title>GALLERY</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/blended_layout.css">

<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

</style>
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
<div class="slideshow-container">

    
<div class="mySlides fade">
  <img src="files/room1.jpg" style="width:100%">
  <div class="text">Regular Room</div>
</div>
    
<div class="mySlides fade">
  <img src="files/deluxe1.jpg" style="width:100%">
  <div class="text">Deluxe Room</div>
</div>    

<div class="mySlides fade">
    <img src="files/6.jpg" style="width:100%">
  <div class="text">Super Deluxe Room</div>
</div>
    
<div class="mySlides fade">
  <img src="files/Hostel-Mess.jpg" style="width:100%">
  <div class="text">Mess</div>
</div>

<div class="mySlides fade">
  <img src="files/gym1.jpg" style="width:100%">
  <div class="text">Gym</div>
</div>    

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html> 
