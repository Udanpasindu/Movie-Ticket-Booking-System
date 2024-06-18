<?php
include "config.php";
    session_start();

    if((!isset($_SESSION['Email']) && !isset($_SESSION['Pwd']) && !isset($_SESSION['Name']) && !isset($_SESSION['mobile']) && !isset($_SESSION['type']) && !isset($_SESSION['userId']) && !isset($_SESSION['LoginStat'])) ) 
        header("Location: loginFile.php");

    if($_SESSION['admin'] != true)
        header("Location: loginFile.php");

    if($_SESSION['admin'] != true)
        header("Location: loginFile.php");

// Retrieve all movies from the "movies" table
$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>

<head>
    <title>All Movies</title>
    <link rel="stylesheet" type="text/css" href="./css/dashStyle.css">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebarHead">
                <img src="./images/logo.jfif" height="50px" width="auto">
                <h1>SKY ON EYE</h1>
                <h3>Admin Dashboard</h3>
            </div>
            <br><br>
            <ul>
                <li><a href="./movieDash.php">All Movies</a></li>
                <li><a href="./addMovieDash.php">Add Movie</a></li>
             
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div>
                <h2>All Movies</h2>
            </div>
            <div style="display:flex;justify-content: space-around;flex-wrap: wrap;">
            <?php
            // Check if there are any movies
            if (mysqli_num_rows($result) > 2) {
                // Display movie cards
                while ($row = mysqli_fetch_assoc($result)) {
                    $movID = $row['movID'];
                    $title = $row['movName'];
                    $genre = $row['movGenre'];
                    $year = $row['movRelYear'];
                    $language = $row['movLang'];
                    $posterPath = $row['posterPath'];

                    // Generate the movie card HTML
                    echo '
                    <div class="movie-card">
                        <img src="' . $posterPath . '" alt="' . $title . '">
                        <h3>' . $title . '</h3>
                        <div class="card-buttons">
                            <a href="editMovie.php?id=' . $movID . '">Edit</a>
                            <a href="deleteMovie.php?id=' . $movID . '">Delete</a>
                        </div>
                    </div>';
                }
            } else {
                // Display a message if there are no movies
                echo '<p>No movies found.</p>';
            }
            ?>
            </div>
        </div>
    </div>
</body>

</html>
