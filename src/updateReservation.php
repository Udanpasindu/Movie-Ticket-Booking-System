<?php
    include_once "config.php";
?>

<?php
    
    $rId = $_GET['rId'];
    $uId = $_GET['uId'];
    $mId = $_GET['mId'];
    $hId = $_GET['hId'];
    $seatCount = $_GET['seatCount'];
    $rDate = $_GET['rDate'];
    $rTime = $_GET['rTime'];
    $amount = $_GET['amount'];
    $seatNo = $_GET['seatNo'];


    $sql1 = "UPDATE reservations SET seatCount = $seatCount, amount = '$amount' WHERE rId = $rId";
    if(mysqli_query($conn,$sql1)){

        $sql2 = "DELETE FROM reservation_seatno WHERE rId = $rId";
        $conn->query($sql2);
        $success = false;
        foreach($seatNo as $SN){
            $sql3 = "INSERT INTO reservation_seatno(rId,seatNo) VALUES($rId,'$SN')";
            if(mysqli_query($conn,$sql3)){
                          
            }
            else{
                echo "<script>
                        alert('Unsuccessfull!');
                        window.location.replace('movieDash.php');
                    </script>";
            }
        }

        echo "<script>
                localStorage.clear();
                alert('Successfully Updates!');
                window.location.replace('myReservations.php');
            </script>";

    }
    else{
        echo "<script>
                alert('Unsuccessfull!');
                window.location.replace('movieDash.php');
              </script>";
    }


    mysqli_close($conn);

?>