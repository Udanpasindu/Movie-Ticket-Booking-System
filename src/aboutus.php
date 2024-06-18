<?php
  session_start();

  if((!isset($_SESSION['LoginStat']))) 
  header("Location: loginFile.php");

?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/aboutus.css" />
	 <!-- Swiper CSS -->
        <link rel="stylesheet" href="swiper-bundle.min.css">
	  
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="script.js" defer></script>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <script src="script.js" defer></script>
  
  </head>
  <body>
  
 <!--header------------>	
    
	<nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="#" class="logo">SKY-ON-EYE</a>

   
      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
         <li><a href="index.php">Home</a></li>
        <li><a href="theater.php">Theaters</a></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="myReservations.php">Tickets</a></li>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
      <?php 
      if(isset($_SESSION['LoginStat']) == false){
        echo "<a  class='button' href='loginFile.php'>Login</a>
              <a class='button' href='signupFile.php'>Register</a>";
      }
      else{
        echo "<a href='myprofile.php'><img src='assets/profile icon.png' width='50px' heigth='50px' class='profileico'></a>";
      }
      ?>
      <a class="button" href="#">Hello <?php echo $_SESSION['Name'] ?></a>
	  
    </nav>
	
	
<!--about us------------>
			
	<section class="about-us">
    <div class="about">
      
      <div class="text">
          <h2>About "Sky On Eye"</h2>
          <h5>online movie ticket booking system </h5>
          <p>Welcome to "Sky On Eye," your ultimate destination for hassle-free online movie bookings. At Sky On Eye, we believe in bringing the magic of cinema to your fingertips. With our user-friendly platform, you can easily browse through an extensive collection of movies, select your preferred showtimes, and book tickets with just a few clicks.At Sky On Eye, our mission is to provide you with a seamless and enjoyable movie booking experience. We strive to exceed your expectations, making your movie outings unforgettable. Join us on this cinematic journey, and let Sky On Eye be your trusted companion for all your movie adventures.</p>
        <br><br>
        
           <h2>Terms and conditions</h2>
           <p>Children aged 3 -12 years will require a separate kids ticket. Above 12 years will be adult ticket
            The 3D glasses will be available at the cinema for 3D films and must be returned before you exit the premises.
            Items like laptop, cameras, knifes, lighter, match box, cigarettes, firearms and all types of inflammable objects are strictly prohibited.
            Items like carrybags eatables, helmets, handbags are not allowed inside the theaters are strictly prohibited. 
            Kindly deposit at the baggage counter of mall/ cinema</p>
        </div>
    </div>
  </section>
  <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
  <p class="cnct">Contact Us</p>
  <br><hr>
  <!--social media icon------------>
  <div class="icons">
    <a href="#" class="fb"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
    <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
    <a href="#" class="msg"><i class="fab fa-g mail"></i></a>
    <a href="#" class="yt"><i class="fab fa-youtube"></i></a>
  </div>

<!--footer------------>	
 

<footer>
   <div class="content">
   <img src="assets/logo.jfif" alt="logo"  height="60" width="60">
   
     <div class="left">
     <a href="aboutus.php">Contact Us</a>
		 
     </div>
	 
     <div class="middle">
     <a href="aboutus.php">Terms and Conditions</a>
     </div>
	 
	 <div class="middle1"> 
   <a href="aboutus.php">Privacy and Policy</a>
	  
     </div>
	 
	  <div class="middle2"> 
    <a href="aboutus.php">FAQ'S</a> 
     </div>
	 
     <div class="right">
      
     <a href="aboutus.php"><img src="assets/star.png" alt="star" height="20" width="100"></a>
     </div>
	 
   </div>
   <div class="bottom">
     <p> &#169; 2020 SKYONEYE. All rights reserved</p>
   </div>

   </footer>

  </body>

</html>
