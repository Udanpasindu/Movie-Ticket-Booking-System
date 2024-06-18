<?php
    include_once "config.php";
?>

<?php
    
    $rId = '';
    $uId = $_GET['uId'];
    $mId = $_GET['mId'];
    $hId = $_GET['hId'];
    $seatCount = $_GET['seatCount'];
    $rDate = $_GET['rDate'];
    $rTime = $_GET['rTime'];
    $amount = $_GET['amount'];
    $seatNo = $_GET['seatNo'];


    $sql1 = "INSERT INTO reservations(uId,mId,hId,seatCount,rDate,rTime,amount) VALUES($uId,$mId,$hId,$seatCount,'$rDate','$rTime','$amount')";
    if(mysqli_query($conn,$sql1)){

        $sql2 = "SELECT rId FROM reservations ORDER BY rId DESC LIMIT 1";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            // Fetch the last value
            $row2 = mysqli_fetch_assoc($result2);
            $rId = $row2['rId'];
            
        } else {
            echo "No results found.";
        }

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
                alert('Successfully Reserved!');
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