<?php
    include_once "config.php";
?>

<?php
session_start();
    $rId = $_GET['rId'];

    $sql1 = "SELECT * FROM reservations r, movies m, moviehalldetails h WHERE r.mId = m.movID AND r.hId = h.HallID AND rId = $rId";

    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $hId = $row1['hId'];
    $mId = $row1['mId'];
    $seatCount = $row1['seatCount'];
    $rDate = $row1['rDate'];
    $rTime = $row1['rTime'];
    $movName = $row1['movName'];
    $movTicketPrice = $row1['movTicketPrice'];
    $posterPath = $row1['posterPath'];
    $NoOfSeats = $row1['NoOfSeats'];
    

?>
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
    <style>
    
    .recipe-container {
  max-width: 900px;
  margin: 0 auto;
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
}

.recipe-photo {
  max-width: 300px;
  height: auto;
  margin-right: 50px;
}

.recipe-details {
  flex-grow: 1;
}

.recipe-title {
  font-size: 30px;
  margin-top: 0;
}

.recipe-description {
  font-size: 18px;
}

.ingredient-list {
  list-style-type: none;
  padding: 0;
}

.ingredient-list li {
  margin-bottom: 5px;
}

.instruction-list {
  list-style-type: none;
  padding: 0;
}

.instruction-list li {
  margin-bottom: 10px;
}
.buy-button {
      display: inline-block;
      background-color: #000000;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .buy-button:hover {
      background-color: #45a049;
    }
</style>
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
	
	<div class="recipe-container">
  <img src="assets/indexImages/img5.jpg" alt="Recipe Photo" class="recipe-photo">
  <div class="recipe-details">
    <h1 class="recipe-title">Delicious Recipe</h1>
    <p class="recipe-description">This is a delicious recipe that you must try!</p>
    <h2>Ingredients:</h2>
    <ul class="ingredient-list">
      <li>Ingredient 1</li>
      <li>Ingredient 2</li>
      <li>......</li>
      
    </ul>
    <h2>Instructions:</h2>
    <ol class="instruction-list">
      <li>Step 1: Do this</li>
      <li>.......</li>
     
    </ol>
    <div style="margin-top: 20px;">
      <label for="time-period">Select Time Period:</label>
      <select id="time-period" name="time-period" style="padding: 8px; font-size: 16px; border-radius: 5px;">
        <option value="day">1 day</option>
        <option value="week">1 week</option>
        <option value="month">1 month</option>
        <option value="year">1 year</option>
        
      </select>
    </div>
    <button class="buy-button">Buy Recipe</button>
  </div>
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
