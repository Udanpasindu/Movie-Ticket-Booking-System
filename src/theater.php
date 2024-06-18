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
    <link rel="stylesheet" href="css/indexStyle.css" />
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
    <br><br><br><br><br>

 <div class="container">
    <?php
    include('config.php');
    // Retrieve movie data from the "movieHalldetails" table
    $sql = "SELECT * FROM moviehalldetails";
    $result = mysqli_query($conn, $sql);
    
    // Check if there are any movie halls
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
   
        $HallName = $row['HallName'];
        $StreetAddress = $row['StreetAddress'];
        $City = $row['City'];
        ?>
        <div class="box">
        <center>
          <div class="image">
            <img src="assets/logo.jfif" alt="logo"  height="60" width="60">
          </div>
          <br>
          <div class="name_job"><?php echo $HallName; ?><br> <?php echo $StreetAddress; ?><br> <?php echo $City; ?></div>
          </center>
        </div>
        <?php
      }
    }
    mysqli_close($conn);
    ?>
  </div>

<!--footer------------>	
 

<br><br><br><br><br><br><br>
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
