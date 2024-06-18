<?php
    include_once "config.php";
?>

<?php
    $rId = $_GET['rId'];

    $sql1 = "DELETE FROM reservations WHERE rId = $rId";
    $conn->query($sql1);

    $sql2 = "DELETE FROM reservation_seatno WHERE rId = $rId";
    $conn->query($sql2);

    echo"<script>window.location.href='myReservations.php';</script>";

?>