<?php
    include_once "config.php";
?>

<?php
    session_start();
    
    $uId = $_SESSION['userId'];
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>reserved</title>
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
  padding: 5px;
}
.button:active {
  transform: scale(0.98);
}
.nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index:100;
  padding: 15px 200px;
  background: #272952;
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

/*.line{
  color:white;
  width:600px;
  margin-top:10px;;
}

/* end of header*/


/* CSS styles for the seat booking page */

	
	.photo11{
		margin-top:230px;
		color:#fff;
		text-align: right;
	}


.movie-container{
    margin: 20px 0;
    color: #fff;
}

.movie-container select{
    background-color: white;
    border: 0;
    border-radius: 5px;
    font-size: 14px;
    margin-left: 10px;
    padding: 5px 15px 5px 15px;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
}

.container{
  margin-top: -650px;
  margin-left: 50px;
    perspective: 1000px;
    width: 900px;
    margin-bottom: 30px;
}

.seat{
    background-color:#444451;
    color:white;
    height:50px;
    width: 74px;
    margin: 3px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
    padding-top: 18px;
}

.seat.selected{
    background-color: rgb(165, 0, 0);
}

.occupiedSeat{
  color:white;
  height:50px;
  width: 74px;
  margin: 3px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  text-align: center;
  padding-top: 18px;
  background-color: rgb(1, 53, 83);;
}


/*.seat:nth-of-type(4){
    margin-right: 18px;
}

.seat:nth-last-of-type(2){
    margin-left: 18px;
}*/



.text1{
  color:white;
  text-align: center;
}

.text2{
  color:white;
  margin-left: 380px;;
}

.seat:not(.occupied):hover{
    cursor: pointer;
    transform: scale(1.2);
}

.showcase .seat:not(.occupied):hover{
    cursor: default;
    transform: scale(1);
}

.showcase{
    background: rgba(0,0,0,0.1);
    padding: 5px 10px;
    width: 90%;
    border-radius: 5px;
    color:#777;
    list-style: none;
    display: flex;
    justify-content: space-between;
}

.showcase li{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
}

.showcase li small{
    margin-left: 2px;
}

.bookNow{
  padding: 10px 10px 10px 10px;
  border-radius: 5px;
  border: 0;
  background-color: rgb(3, 168, 91);
  cursor:pointer;
  box-shadow: 0 0 10px 3px #ffffff33;
}

.row{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.screen{
    background-color: #fff;
    height: 70px;
    width: 100%;
    margin: 15px 0;
    transform: rotateX(-45deg);
}

p.text{
  color: white;
    margin: 5px 0;
}

p.text span{
    color: white;
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
  .nav .button {
     padding:500px;
  }
}


  .nav a:hover{
	
  color: #5F63CA;
}
.link a {
  color: #fff;
  text-decoration: none;
}
.link a:hover{
	
    text-decoration: underline;
}


	
/* end of header*/


	

  /*Footer*/   
  
  

footer{
	
  width: 100vw;
  position: relative;
  bottom: 0;
  left: -52px;
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



   </style>
	 <!-- Swiper CSS -->
        <link rel="stylesheet" href="swiper-bundle.min.css">
	  
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <style>
        body{
            padding:0;
        }
        .nav{
            position: relative;
        }
        section{
          margin-bottom: 80px;
        }
        footer{
            position:fixed;
            left:0;
        }
        .card{
            background: #0095ff0d;
            margin: 20px;
            padding: 10px;
            border-radius: 10px;
            display:flex;
        }
        .bookingContent{
          width:100%;
          margin: 10px;
        }
        .bookingBtn{
          float:right;
          display: flex;
          align-items: flex-end;
          height: 100%;
        }
        .bookingBtn button{
          padding: 7px 10px;
          margin: 5px;
          border-radius: 5px;
          border:0;
          cursor:pointer;
        }
        .bookingP{
          display: inline-block;
          line-height: 2.5;
          margin-left: 10px;
          color:white;
        }
        .bookingBtn a:nth-child(1) button {
          background: #6ecd6e;
        }
        .bookingBtn a:nth-child(2) button {
          background: #f16363;
        }
        .bookingBtn a:nth-child(1) button:hover {
          background: #20d120;
        }
        .bookingBtn a:nth-child(2) button:hover {
          background: #cf2929;
        }
    </style>

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
     
        echo "<a href='myprofile.php'><img src='assets/profile icon.png' width='50px' heigth='50px' class='profileico'></a>";
      
      ?>
    <a class="button" href="#">Hello <?php echo $_SESSION['Name'] ?></a>
    
  </nav>

  <!--end of navigation bar-->

  <!--<div class="line">
   <hr>
  </div>-->

  <section>
    <br>
    <h3 style="margin-left:10px;">My Recieps</h3>
    <br><br>
    <?php
            $sql1 = "SELECT * FROM reservations r, movies m, moviehalldetails h WHERE r.mId = m.movID AND r.hId = h.HallID AND uId = $uId";
            $result1 = $conn->query($sql1);
    
            if($result1->num_rows>0){
                while($row1 = $result1->fetch_assoc()){
                    $rId = $row1['rId'];
                    $hId = $row1['hId'];
                    $seatCount = $row1['seatCount'];
                    $rDate = $row1['rDate'];
                    $rTime = $row1['rTime'];
                    $amount = $row1['amount'];
                    $movName = $row1['movName'];
                    $posterPath = $row1['posterPath'];
                    echo"<div class='card'>
                            <img src='$posterPath' width='200px'>
                            <div class='bookingContent'>
                              <p class='bookingP'>Title: $movName <br> Tickets: $seatCount <br> Date: $rDate <br> Time: $rTime <br> Total Price: Rs.$amount</p>
                              <div class='bookingBtn'>
                                <a href='editRes.php?rId=$rId'><button>Update</button></a> 
                                <a href='deleteRes.php?rId=$rId'><button>Delete</button></a> 
                                <a href='feedback.php?rId=$rId'><button>Add Feedback</button></a> 
                                <a href='updateFeedback.php?rId=$rId'><button>Update Feedback</button></a> 
                              </div>
                            </div>
                        </div>";
                }
            }
        ?>
  </section>

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
 