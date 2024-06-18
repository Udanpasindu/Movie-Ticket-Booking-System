<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/theatermstyle.css" />
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
     
        echo "<a href='myprofile.php'><img src='assets/profile icon.png' width='50px' heigth='50px' class='profileico'></a>";
      
      ?>
    </nav>


<!--dropbox------------------------------>

	
	<div class="select-menu">
        <div class="select-btn">
            <span class="sBtn-text">Select your Area</span>
            <i class="bx bx-chevron-down"></i>
        </div>
        <ul class="options">
            <li class="option">
                <i class="bx bxl-github" style="color: #171515;"></i>
                <a class="option-text" href="../home/home.html">Matara</a>
            </li>
            <li class="option">
                <i class="bx bxl-instagram-alt" style="color: #E1306C;"></i>
                  <a class="option-text" href="../login/home.html">Weligama</a>
            </li>
            <li class="option">
                <i class="bx bxl-linkedin-square" style="color: #0E76A8;"></i>
                <a class="option-text" href="../home/home.html">Akuressa</a>
          
        </ul>
	
    </div>
	
<!--Theater photos------------------------------>	
<div class="card">
	<img src="assets/logo.jfif" alt="star" height="250" width="250">
		<img src="assets/logo.jfif" alt="star" height="250" width="250"></p>
		
</div>	


<!--Theater description------------------------------>	
<div class="det">

             <div class="name">General Show Times</div>
            <div class="name">General Show Times</div>
</div>
<div class="det1">	
		    <ul class="time">
			<li>10.30 a.m.</li>
			<li>01.30 p.m.</li>
			<li>05.30 p.m.</li>
            </ul>
			    <ul class="time">
			<li>10.30 a.m.</li>
			<li>01.30 p.m.</li>
			<li>05.30 p.m.</li>
			<li>09.30 p.m.</li>
            </ul>
</div>



	  
	<br><br><br><br>
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
      <!-- Swiper JS -->
    <script src="swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="js/theater.js" defer></script>

</html>
