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
   
    <style>
       /* Google Fonts - Poppins */

/*start of heading*/
/* Google Fonts - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  align-items: center;
  justify-content: center;
  background-image: linear-gradient(to bottom,#8cb6e5,rgb(87, 102, 240));
}

.button {
  padding: 3px 20px;
  color:#fff;
  border: 2px solid #fff;
  background: transparent;
  border-radius: 5px;
  cursor: pointer;
}
.button:hover {
  border: 2px solid #2bc8fc;
}
.button:active {
  transform: scale(0.98);
}
.profileico{
  border-radius:50%;
}
.nav {
  position: sticky;
  width: 100%;
  padding: 15px 200px;
  background: #4349af;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.nav,
.nav .nav-links {
  display: flex;
  align-items: center;
}
.nav {
  justify-content: space-between;
}
a {
  color: #fff;
  text-decoration: none;
}
.nav .logo {
	margin-left:-100px;
  position:relative;
  font-size: 32px;
  font-weight: 900;
}
.nav .nav-links {
	  font-size: 15px;
  column-gap: 20px;
  list-style: none;
}
.nav .nav-links a {
  transition: all 0.2s linear;
}
.nav.openSearch .nav-links a {
  opacity: 0;
  pointer-events: none;
}

.nav .navOpenBtn,
.nav .navCloseBtn {
  display: none;
}

/* responsive */
@media screen and (max-width: 1160px) {
  .nav {
    padding: 15px 100px;
  }
  .nav .search-box {
    right: 150px;
  }
}
@media screen and (max-width: 950px) {
  .nav {
    padding: 15px 50px;
  }
  .nav .search-box {
    right: 100px;
    max-width: 400px;
  }
}
@media screen and (max-width: 768px) {
  .nav .navOpenBtn,
  .nav .navCloseBtn {
    display: block;
  }
  .nav {
    padding: 15px 20px;
  }

  
  .nav .nav-links {
    position: fixed;
    top: 0;
    left: -100%;
    height: 100%;
    max-width: 280px;
    width: 100%;
    padding-top: 100px;
    row-gap: 30px;
    flex-direction: column;
    background-color: #272952;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    z-index: 100;
  }
  .nav.openNav .nav-links {
    left: 0;
  }
  .nav .navOpenBtn {
    color: #fff;
    font-size: 20px;
    cursor: pointer;
  }
  .nav .navCloseBtn {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
  }
  .nav .search-box {
    top: calc(100% + 10px);
    max-width: calc(100% - 20px);
    right: 50%;
    transform: translateX(50%);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
}


  .nav a:hover{
	
  color: #5F63CA;
}

/* end of header*/

 
  /*Footer*/   
  
  

footer{
	
  width: 100%;
  background: #272952;
}
footer .content{
	
  max-width: 950px;
  font-size:18px;
  font-weight:700;
  margin-left: 92px;
  margin-top:10px;
  margin-right:10px;
  margin-bottom:-20px;
  padding: 1px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
footer .content p,a{
  color: #fff;
}

footer .content .left a{
  line-height: 55px;
  
}

footer .content .middle a{
  line-height: 55px;
   margin-right:10px;
  
}
footer .content .middle1 a{
  line-height: 55px;
   margin-right:10px;
  
}
footer .content .middle2 a{
  line-height: 55px;
   margin-right:10px;
  
}
footer .content .right a{
  margin-right:-120px;	
  line-height: 60px;
  margin-left:50px;
}

footer .bottom{
  width: 100%;
  text-align: right;
  color: #000000;
  padding: 0 20px 1px 0;
}

footer a{
  transition: all 0.3s ease;
}
footer a:hover{
  color: #5F63CA;
}
@media (max-width:1100px) {
  footer .content .middle{
    padding-left: 50px;
  }
}
@media (max-width:1100px) {
  footer .content .middle1{
    padding-left: 50px;
  }
}
@media (max-width:1100px) {
  footer .content .middle2{
    padding-left: 50px;
  }
}
@media (max-width:950px){
  footer.content .right{
    margin-top: 40px;
  }
}
@media (max-width:560px){
  footer{
    position: relative;
  }
 
  footer .content .middle{
    padding-left: 0;
  }
}
/*End of footer*/

/*slider*/


.wrapper{
  display: grid;
  position: relative;
  padding: 40px 35px;
  margin: 0px 3%;
}

.wrapper i{
  top: 50%;
  height: 44px;
  width: 44px;
  color: #343F4F;
  cursor: pointer;
  font-size: 1.15rem;
  position: absolute;
  text-align: center;
  line-height: 44px;
  background: #000;
  border-radius: 50%;
  transform: translateY(-50%);
  transition: transform 0.1s linear;
}
.wrapper i:active{
  transform: translateY(-50%) scale(0.9);
}
.wrapper i:hover{
  background: #f2f2f2;
}
.wrapper i:first-child{
  left: -22px;
  display: none;
}
.wrapper i:last-child{
  right: -22px;
}
.wrapper .carousel{
  font-size: 0px;
  cursor: pointer;
  overflow: hidden;
  white-space: nowrap;
  scroll-behavior: smooth;
}
.carousel.dragging{
  cursor: grab;
  scroll-behavior: auto;
}
.carousel.dragging img{
  pointer-events: none;
}
.carousel img{
  height: 340px;
  object-fit: cover;
  user-select: none;
  margin-left: 14px;
  width: calc(100% / 3);
}
.carousel img:first-child{
  margin-left: 0px;
}

@media screen and (max-width: 900px) {
  .carousel img{
    width: calc(100% / 2);
  }
}

@media screen and (max-width: 550px) {
  .carousel img{
    width: 100%;
  }
}

/*buttons*/
.btn{
	margin-left:40px;
  padding: 5px 30px;
  left:50px;
  color:#000;
  justify-content: space-between;
  border: 3px solid #fdfdfd;
  background: transparent;
  border-radius: 5px;
  cursor: pointer;
	
}
.btn:hover {
  background:#000;
}

a.active,a.btn:hover{
	margin-left:40px;
  padding: 5px 30px;
  left:50px;
  color:#fff;
  justify-content: space-between;
  border: 2px solid #000;
  background: transparent;
  border-radius: 5px;
  cursor: pointer;
  background: #000;
  transition: .5s;
}
/*photo card*/


.container{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 40px ;
  margin: 0px 3%;
}
.container .box{
  width: calc(33% - 10px);
  background: #3b3b91;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 30px 30px;
  min-height: 350px;
  margin-left:10px;
  border-radius: 10px;
}
.box .quote i{
margin-top: 10px;
font-size: 45px;
color: #17c0eb
}
.container .box .image{
  margin: 10px 0;
  height: 150px;
  width: 150px;
  background: #fff;
  padding: 3px;
  border-radius: 50%;
}
.box .image img{
  height: 100%;
  width: 100%;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #535680;
}
.box p{
  text-align: justify;
  margin-top: 8px;
  font-size: 16px;
  font-weight: 400;
}
.box .name_job{
  margin: 10px 0 3px 0;
  color: #fff;
  font-size: 18px;
  font-weight: 600;
}
.rating i{
  font-size: 18px;
  color: #e1e1e7;
  margin-bottom: 5px;
}
.btns{
  margin-top: 20px;
  margin-bottom: 5px;
  display: flex;
  justify-content: space-between;
  width: 100%;
  border: 2px solid #dfdfe2;
}
.btns button{
  background: none;
  width: 100%;
  padding: 9px 0px;
  outline: none;
  border: 2px solid #272952;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 5px;
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  transition: all 0.3s linear;
}


.btns :hover{
  background: #e3e4eb;
  color: #fff;
}

.btns button:hover{
  color: #fff;
}
@media (max-width:1045px){
  .container .box{
    width: calc(50% - 10px);
    margin-bottom: 20px;
  }
}
@media (max-width:710px){
  .container .box{
    width: 100%;
  }
}

.h{
	width:100%;
	height:7px;
	margin-top:20px;
    border:0 none;
	
	background-color:#000;

}
.button1 {
    top: 0;
  left: 0;
  width: 100%;
  
  padding: 15px 200px;
  color:#000;
  
  border: 2px solid #000;
  background: transparent;
  border-radius: 5px;
  cursor: pointer;
  
}
     
.buy-button {
      display: inline-block;
      background-color: #6f5cdb;
      color: white;
      padding: 10px 40px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      border: none;
      margin-top:15px;
      border-radius: 5px;
      cursor: pointer;
    }

    .buy-button:hover {
      background-color: #000000;
    }


    </style>
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
	
	
<!--category-------------->
		<div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <div class="carousel">
        <img src="assets/indexImages/img1.jpeg" alt="img" >
        <img src="assets/indexImages/img2.jpeg"     alt="img" >
        <img src="assets/indexImages/img3.jpeg" alt="img" draggable="true">
        
      </div>
     
    </div>
	
	
<!--buttons-------------------------->
    

	<div >
      <a  class="active" href="index.php">Free Reciepes</a>
	  <a class="btn" href="index2.php">Premuim Reciepes</a>
	  </div>
	   
	  
	<br>
	<hr>
	
<!--reciepes cards-------------------------->
	
	<div class="container">
      <div class="box">
      <div class="image">
        <img src="assets/indexImages/img4.webp">
        </div>
        <div class="name_job">Jelly Pudding</div>
        
        <button class="buy-button">View Recipe</button>  
      </div>
	    <div class="box">
      <div class="image">
        <img src="assets/indexImages/img5.jpg">
        </div>
        <div class="name_job">Chicken 64</div>

        <button class="buy-button">View Recipe</button>
      </div>  
	  <div class="box">
      <div class="image">
        <img src="assets/indexImages/img6.webp">
        </div>
        <div class="name_job">Mushroom Soup</div>
      
        <button class="buy-button">View Recipe</button>
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
