<?php
    include('config.php');
    session_start();

    $email = strtolower($_POST['email']);
    $pwd = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pwd'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if($result->num_rows>0){

        $_SESSION['Email'] = $email;
        $_SESSION['Pwd'] = $pwd;
        $_SESSION['Name'] = $row['name'];
        $_SESSION['mobile'] = $row['phoneNo'];
        $_SESSION['type'] = $row['type'];
        $_SESSION['userId'] = $row['id'];
        $_SESSION['LoginStat'] = true;

        echo "<script>alert('Login Successfull!');</script>";

        if($row['type'] == 0){
            $_SESSION['user'] = true;
            echo "<script>window.location.replace('index.php')</script>";
        }
        else if($row['type'] == 1){
            $_SESSION['admin'] = true;
            echo "<script>window.location.replace('movieDash.php')</script>";
        }
         else if($row['type'] == 2){
            $_SESSION['admin'] = true;
            echo "<script>window.location.replace('theaterdash.php')</script>";
        }
    }
    else{

        $_SESSION['LoginStat'] = false;
        echo "<script>
                alert('Invalid email/password!');
                window.location.replace('loginFile.php');
                </script>";
    } 


    mysqli_close($conn);

?>