<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "sky_on_eye"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?>