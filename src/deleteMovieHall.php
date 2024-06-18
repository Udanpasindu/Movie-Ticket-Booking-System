<?php
include "config.php";


// Function to sanitize input data
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the hall ID is provided in the URL
if (isset($_GET['id'])) {
    $HallID = sanitize($_GET['id']);

    // Retrieve the movie hall details from the "moviehalldetails" table
    $sql = "SELECT * FROM moviehalldetails WHERE HallID = '$HallID'";
    $result = mysqli_query($conn, $sql);

    // Check if the movie hall exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Delete the movie from the "moviehalldetails" table
        $deleteSQL = "DELETE FROM moviehalldetails WHERE HallID = '$HallID'";
        if (mysqli_query($conn, $deleteSQL)) {
            mysqli_close($conn);
            echo "<script>alert('Movie hall deleted successfully.'); window.location.href = 'allMovieHalls.php';</script>"; // Display alert and redirect to movieDash.php
            exit();
        } else {
            echo "<script>alert('Error deleting movie hall: " . mysqli_error($conn) . "');</script>"; // Display error alert
        }
    } else {
        echo "<script>alert('Movie hall not found.');</script>"; // Display alert
    }
} else {
    echo "<script>alert('Invalid movie hall ID.');</script>"; // Display alert
}

mysqli_close($conn);
?>
