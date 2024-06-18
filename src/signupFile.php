<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/signUpStyle.css" />
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="script.js" defer></script>
	</head>
  <body>
  
  <!--Navigation bar-->
  
   <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="#" class="logo">SKY-ON-EYE</a>

      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
         <li><a href="index.php">Home</a></li>
        <li><a href="../Theater/home.html">Theaters</a></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="#">Tickets</a></li>
        <li><a href="../About_us/home.html">About Us</a></li>
      </ul>
    <a  class="button" href="loginFile.php">Login</a>
	  <a class="button" href="signupFile.php">Register</a>
	  
    </nav>
	
	<!--Registration form-->
	
	
	<div class="wrapper">
    <h2>Registration</h2>
    <form action="signup.php" method="post">
	
	
      <div class="input-box">
        <input type="text" placeholder="Enter your Name" name="name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your username" name="username" required>
      </div>
      <div class="input-box">
        <input type="email" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create your password" name="password" required>
      </div>
	  <div class="input-box">
        <input type="password" placeholder="Re-type your password" required>
      </div>
	  <div class="input-box">
        <input type="tel" placeholder="Enter your phone number" name="phoneNo" pattern='[0-9]{10}' required>
      </div>
	  
	  
	  
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="loginFile.php">Login now</a></h3>
      </div>
	  
    </form>
  </div>
	<!--footer-->
 
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
