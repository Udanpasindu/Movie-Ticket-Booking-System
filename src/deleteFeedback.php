<?php
include "config.php";

// Function to sanitize input data
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the feedback ID is provided in the URL
if (isset($_GET['id'])) {
    $feedbackID = sanitize($_GET['id']);

    // Retrieve the feedback details from the "feedback" table
    $sql = "SELECT * FROM feedback WHERE feedbackID = '$feedbackID'";
    $result = mysqli_query($conn, $sql);

    // Check if the feedback exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $deleteSQL = "DELETE FROM feedback WHERE feedbackID = '$feedbackID'";
        if (mysqli_query($conn, $deleteSQL)) {
            // Delete the feedback poster file if it exists
            mysqli_close($conn);
            echo "<script>alert('Feedback deleted successfully.'); window.location.href = 'myReservations.php';</script>"; // Display alert and redirect to movieDash.php
            exit();
        } else {
            echo "<script>alert('Error deleting feedback: " . mysqli_error($conn) . "');</script>"; // Display error alert
        }
    } else {
        echo "<script>alert('Feedback not found.');</script>"; // Display alert
    }
} else {
    echo "<script>alert('Invalid feedback ID.');</script>"; // Display alert
}

mysqli_close($conn);
?>
