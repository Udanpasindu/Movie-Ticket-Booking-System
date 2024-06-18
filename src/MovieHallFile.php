<?php
    
    session_start();

    if((!isset($_SESSION['Email']) && !isset($_SESSION['Pwd']) && !isset($_SESSION['Name']) && !isset($_SESSION['mobile']) && !isset($_SESSION['type']) && !isset($_SESSION['userId']) && !isset($_SESSION['LoginStat'])) ) 
        header("Location: loginFile.php");

    if($_SESSION['admin'] != true)
        header("Location: loginFile.php");

?>
<!DOCTYPE html>
<head>
    <title> Movie Hall</title>
    <link rel="stylesheet" href="./css/MovieHall.css">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebarHead">
                <img src="./images/logo.jfif" height="50px" width="auto">
                <h1>SKY ON EYE</h1>
                <h3>Theater Dashboard</h3>
            </div>
            <br><br>
            <ul>
              
                <li><a href="./allMovieHalls.php">All Movies Hall</a></li>
                <li><a href="./MovieHallFile.php">Add Movie Hall</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1 style="text-align: center;">Add Movie Hall</h1>
            <br>
                <form method="post" action="MovieHall.php">
                    <br><br>
                    <label for="HallName"> Movie Hall Name : </label>
                    <input type="text" id="HallName" name="HallName">
                    <br><br>
                    <label for="NoOfSeats"> No of seats : </label>
                    <input type="number" id="NoOfSeats" name="NoOfSeats">
                    <br><br>
                    <label for="3davaiable"> 3D Avaiable :  </label> 
                    <input type="radio" name="3davaiable" id="Yes">
                    <label for="Yes">Yes</label>
                    <input type="radio" name="3davaiable" id="No">
                    <label for="No">No</label>
                    <br><br>
                    <label for="StreetAddress"> Street Address :  </label> 
                    <input type="text" id="StreetAddress" name="StreetAddress">
                    <br><br><br>
                    <label for="City"> City :  </label> 
                    <input type="text" id="City" name="City">
                    <br><br>
                    <input type="submit" value="Submit">
                </form>
        </div>
    </div>

    
</body>