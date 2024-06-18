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
      <a href="#" class="logo">Foody Buddy</a>

      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
         <li><a href="index.php">Home</a></li>
        
        <li><a href="movies.php">Premium Reciepes</a></li>
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
  <br><br>
  <br><br>
  <!--Reciepe cards-------------------------->
  <div class="container">
    <?php
    include('config.php');
    // Retrieve movie data from the "movies" table
    $sql = "SELECT * FROM movies";
    $result = mysqli_query($conn, $sql);
    
    // Check if there are any movies
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $movID = $row['movID'];
        $movName = $row['movName'];
        $posterPath = $row['posterPath'];
        $movHallID = $row['movHallID'];
        ?>
        <div class="box">
          <div class="image">
            <img src="<?php echo $posterPath; ?>">
          </div>
          <div class="name_job"><?php echo $movName; ?></div>
          <center>
            <div class="btns">
              <a href="reserve.php?mID=<?php echo $movID; ?>&hID=<?php echo $movHallID; ?>">
                <button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buy Reciepe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
              </a>
            </div>
          </center>
        </div>
        <?php
      }
    }
    mysqli_close($conn);
    ?>
  </div>
  
  <br><br>
  <br><br>
  
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
