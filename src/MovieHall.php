<?php
    $HallID = $_POST['HallID'];
    $HallName = $_POST['HallName'];
    $NoOfSeats = $_POST['NoOfSeats'];
    $avaiable3D = $_POST['3davaiable'];
    $StreetAddress = $_POST['StreetAddress'];
    $City = $_POST['City'];

    $conn = new mysqli('localhost','root','','sky_on_eye');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into moviehalldetails(HallName, NoOfSeats, avaiable3D, StreetAddress, City) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $HallName, $NoOfSeats, $avaiable3D, $StreetAddress, $City);
        $stmt->execute();
        echo"<script>window.alert('Hall Added Succesfully, Thank You'); window.location.href = 'allMovieHalls.php';</script>";
        
        
        $stmt->close();
        $conn->close();
    }






?>