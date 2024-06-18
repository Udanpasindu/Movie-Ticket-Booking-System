<?php 
    include('config.php');
    session_start();
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];
    $id = $_SESSION['userId'];
    $sql = "UPDATE users SET name='$name', username='$username', email='$email',phoneNo='$phoneNo' WHERE id='$id'";
    if($conn->query($sql)){
        $_SESSION['Email'] = $email;
        $_SESSION['Name'] = $name;
        $_SESSION['mobile'] = $phoneNo;
        echo "<script type='text/javascript'> 
                    alert('Succesfully Updated');
                    window.location.replace('myprofile.php');
                </script>";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>