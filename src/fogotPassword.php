<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset password</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/loginStyle.css" />
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
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
        <li><a href="#">Theaters</a></li>
        <li><a href="movies.php">Movies</a></li>
        <li><a href="#">Tickets</a></li>
        <li><a href="aboutus.php">About Us</a></li>
      </ul>
    <a  class="button" href="loginFile.php">Login</a>
	  <a class="button" href="signupFile.php">Register</a>
	  
    </nav>
	
	

	<br><br>
	<br><br>

<!--Image slider-->

<div class="container1">
    <div class="image-box">
      <div class="image">
        <img class="img1" src="assets/login/jhonwick.jpg" alt="jhonwick">
      </div>
      <div class="image">
        <img class="img2" src="assets/login/shelton.jpg" alt="shelton">
      </div>
      <div class="image">
        <img class="img3" src="assets/login/pravegaya2.jpg" alt="pravegaya2">
      </div>
      <div class="image">
        <img class="img4" src="assets/login/bigil4.jpg" alt="bigil4">
      </div>
    </div>
	</div>
	
	<!--form-->
	
	 <div class="wrapper">
    <header>Reset Your Password</header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="email" placeholder="Email Address" name="email">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" placeholder="New Password" name="password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" placeholder="Reenter New Password" name="password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      
      <input type="submit" value="Reset">
	<a href="#">Terms & Conditions  |  Privacy</a>
	</form>
  </div>
<?php
    include('config.php');
        $email = strtolower($_POST['email']);
        $pwd = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE email='$email'";

        $result = $conn->query($sql);

        if($result->num_rows>0){
    
            $sql = "UPDATE users SET password = '$pwd' WHERE email='$email'";
        
            $result = $conn->query($sql);

            if($result==true){
                echo "<script>alert('Password resseted Successfull!');</script>";
                echo "<script>
                        window.location.replace('loginFile.php');
                        </script>";
            }
            else{
                echo "<script>
                        alert('Invalid email/password!');
                        window.location.replace('fogotPassword.php');
                        </script>";
            }
        }
    
        mysqli_close($conn);
    
    ?>
 
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
