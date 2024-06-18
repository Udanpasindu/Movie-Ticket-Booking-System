<?php
include('config.php');
$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$phoneNo = $_POST["phoneNo"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email='$email'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

if($result->num_rows==0){

  $sql = "INSERT INTO users(name, username, email, phoneNo, password) VALUES('$name','$username','$email','$phoneNo' ,'$password')";

  if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> 
              alert('Succesfully inserted');
              window.location.replace('loginFile.php');
          </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else{
  echo "<script type='text/javascript'> 
              alert('Email Exists');
              window.location.replace('loginFile.php');
          </script>";
}

$conn->close();
?>