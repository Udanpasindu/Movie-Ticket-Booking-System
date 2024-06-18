<?php
include "config.php";

    session_start();

    if((!isset($_SESSION['Email']) && !isset($_SESSION['Pwd']) && !isset($_SESSION['Name']) && !isset($_SESSION['mobile']) && !isset($_SESSION['type']) && !isset($_SESSION['userId']) && !isset($_SESSION['LoginStat'])) ) 
        header("Location: loginFile.php");

    if($_SESSION['admin'] != true)
        header("Location: loginFile.php");

// Function to sanitize input data
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the movie ID is provided in the URL
if (isset($_GET['id'])) {
    $movieID = sanitize($_GET['id']);

    // Retrieve the movie details from the "movies" table
    $sql = "SELECT * FROM movies WHERE movID = '$movieID'";
    $result = mysqli_query($conn, $sql);

    // Check if the movie exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $posterPath = $row['posterPath'];

        // Delete the movie from the "movies" table
        $deleteSQL = "DELETE FROM movies WHERE movID = '$movieID'";
        if (mysqli_query($conn, $deleteSQL)) {
            // Delete the movie poster file if it exists
            if (!empty($posterPath)) {
                unlink($posterPath);
            }
            mysqli_close($conn);
            echo "<script>alert('Movie deleted successfully.'); window.location.href = 'movieDash.php';</script>"; // Display alert and redirect to movieDash.php
            exit();
        } else {
            echo "<script>alert('Error deleting movie: " . mysqli_error($conn) . "');</script>"; // Display error alert
        }
    } else {
        echo "<script>alert('Movie not found.');</script>"; // Display alert
    }
} else {
    echo "<script>alert('Invalid movie ID.');</script>"; // Display alert
}

mysqli_close($conn);
?>
