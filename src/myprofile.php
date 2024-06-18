<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My profile | Movie</title>
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
  <style>
    .left30{
      width: 30%;
    margin-left: 1%;
    float:left;
    }
    .ul{
      list-style-type: none;
    background-color: gray;
    padding: 11px;
    margin: 5%;
    border-radius: 10px;
    text-align: center;
    }
    .left70{
      width: 60%;
      background:gray;
      float:left;
      height:500px;
      margin: 1%;
    border-radius: 10px;
    }
    .formDiv{
      width:40%;
      margin:0 auto;
    }
    .inputText{
      width:100%;
      padding:5px;
      border:1px solid black;
      border-radius:5px;
    }
    .logoutbtn{
      padding: 10px 42%;
      background: red;
      border-radius: 10px;
   
    }
    .updatebtn{
      padding: 10px;
      background: green;
      border-radius: 10px;
      margin: 0 18%;
  
    }
    .dltbtn{
      padding: 10px;
      background: red;
      border-radius: 10px;
    }
    .dltbtn:hover{
        background:#960f0f;
    }
    .updatebtn:hover{
        background:#127a19;
    }
    .logoutbtn:hover{
        background:#960f0f;
    }
</style>
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
      session_start();
      if(isset($_SESSION['LoginStat']) == false){
        echo "<a  class='button' href='loginFile.php'>Login</a>
              <a class='button' href='signupFile.php'>Register</a>";
      }
      else{
        echo "<a href='myprofile.php'><img src='assets/profile icon.png' width='50px' heigth='50px' class='profileico'></a>";
      }
      ?>
    </nav>
    <div style="width: 100%;float: left;margin-bottom: 6%;">
      <div class="left30">
        <ul class="ul">
          <li>User Profile</li>
        </ul>
      </div>
      <div class="left70">
        <img src="assets/profile icon.png" width='150px' heigth='150px' class='profileico' style="margin: 0px auto;">
        <div class="formDiv">
          <?php
          include('config.php');
          if(isset($_SESSION['LoginStat']) == true){
              $email = $_SESSION['Email'];
              

              $sql = "SELECT * FROM users WHERE email='$email'";

              $result = $conn->query($sql);

              $row = $result->fetch_assoc();

              if($result->num_rows>0){

                echo "<center><form>
                <label>Name</label>
                <input type='text' name='name' class='inputText' value='".$row['name']."' readonly ><br>
                <label>User Name</label>
                <input type='text' name='username' class='inputText' value='".$row['username']."' readonly><br>
                <label>Email</label>
                <input type='text' name='email' class='inputText' value='".$row['email']."' readonly><br>
                <label>Phone Number</label>
                <input type='text' name='phoneNo' class='inputText' value='".$row['phoneNo']."' readonly><br>
                
              </form></center>";
            }
          }

          
        ?>
        <br>
        <a href="updateUserProfile.php" class="updatebtn">Update</a>
        <a href="deleteUserProfile.php" class="dltbtn">Delete</a>
        
        </div>
        <div style="margin: 5% 24%;">
          <a href="logout.php" class="logoutbtn">Logout</a>
        </div>
      </div>
    </div>
	
	

<!--footer------------>	
 
 <footer style="    float: left;">
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
      <!-- Swiper JS -->
    <script src="swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="script.js" defer></script>

</html>
