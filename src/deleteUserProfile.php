<?php 
    include('config.php');
    session_start();
    
    $id = $_SESSION['userId'];
    $sql = "DELETE from  users WHERE id='$id'";
    if($conn->query($sql)){
        session_unset();
        session_destroy();
        echo "<script type='text/javascript'> 
                    alert('Succesfully Deleted');
                    window.location.replace('index.php');
                </script>";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>