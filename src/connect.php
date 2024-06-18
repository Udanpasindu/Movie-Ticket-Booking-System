<?php
    $resID = $_POST['resId'];
    $rating1 = $_POST['rating1'];
    $rating2 = $_POST['rating2'];
    $rating3 = $_POST['rating3'];
    $comments = $_POST['comment'];

    $conn = new mysqli('localhost','root','','sky_on_eye');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into feedback (resID, rating1, rating2, rating3, comments) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiis", $resID, $rating1, $rating2, $rating3, $comments );
        $stmt->execute();
        echo"<script>window.alert('Feedback sent succesfully')</script>";
        echo"<script>window.location.replace('myReservations.php')</script>";
        $stmt->close();
        $conn->close();
    }


?>


