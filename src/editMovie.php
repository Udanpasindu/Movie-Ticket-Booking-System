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
        $title = $row['movName'];
        $genre = $row['movGenre'];
        $year = $row['movRelYear'];
        $language = $row['movLang'];
        $hallID = $row['movHallID'];
        $ticketPrice = $row['movTicketPrice'];
        $showTimings = $row['movShowTimings'];
        $posterPath = $row['posterPath'];

        // Handle the form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $newTitle = sanitize($_POST["title"]);
            $newGenre = sanitize($_POST["genre"]);
            $newYear = sanitize($_POST["year"]);
            $newLanguage = sanitize($_POST["language"]);
            $newHallID = sanitize($_POST["hall"]);
            $newTicketPrice = sanitize($_POST["ticket_price"]);
            $newShowTimings = sanitize($_POST["show_timings"]);

            // Update the movie details in the "movies" table
            $sql = "UPDATE movies SET movName = '$newTitle', movGenre = '$newGenre', movRelYear = '$newYear', movLang = '$newLanguage', movHallID = '$newHallID', movTicketPrice = '$newTicketPrice', movShowTimings = '$newShowTimings' WHERE movID = '$movieID'";
            if (mysqli_query($conn, $sql)) {
                // Check if a new poster is uploaded
                if (!empty($_FILES["poster"]["name"])) {
                    // Delete the existing poster file if it exists
                    if (!empty($posterPath)) {
                        unlink($posterPath);
                    }

                    // Upload the new poster file
                    $posterFileName = $_FILES["poster"]["name"];
                    $posterTempName = $_FILES["poster"]["tmp_name"];
                    $posterPath = "assets/uploads/" . $posterFileName;
                    move_uploaded_file($posterTempName, $posterPath);

                    // Update the poster path in the database
                    $sql = "UPDATE movies SET posterPath = '$posterPath' WHERE movID = '$movieID'";
                    mysqli_query($conn, $sql);
                }

                // Redirect to the movie dashboard page
                echo "<script>alert('Movie updated successfully.'); window.location.href = 'movieDash.php';</script>";
                exit();
            } else {
                $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
                echo "<script>alert('$error');</script>";
            }
        }

        //mysqli_close($conn);
    } else {
        echo "<script>alert('Movie not found.');</script>";
    }
} else {
    echo "<script>alert('Invalid movie ID.');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Movie</title>
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
                <h2>Edit Movie</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $movieID; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" required value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Genre:</label>
                        <select name="genre" required>
                            <option value="Action" <?php echo ($genre === 'Action') ? 'selected' : ''; ?>>Action</option>
                            <option value="Adventure" <?php echo ($genre === 'Adventure') ? 'selected' : ''; ?>>Adventure</option>
                            <option value="Animation" <?php echo ($genre === 'Animation') ? 'selected' : ''; ?>>Animation</option>
                            <option value="Biography" <?php echo ($genre === 'Biography') ? 'selected' : ''; ?>>Biography</option>
                            <option value="Comedy" <?php echo ($genre === 'Comedy') ? 'selected' : ''; ?>>Comedy</option>
                            <option value="Crime" <?php echo ($genre === 'Crime') ? 'selected' : ''; ?>>Crime</option>
                            <option value="Documentary" <?php echo ($genre === 'Documentary') ? 'selected' : ''; ?>>Documentary</option>
                            <option value="Drama" <?php echo ($genre === 'Drama') ? 'selected' : ''; ?>>Drama</option>
                            <option value="Family" <?php echo ($genre === 'Family') ? 'selected' : ''; ?>>Family</option>
                            <option value="Fantasy" <?php echo ($genre === 'Fantasy') ? 'selected' : ''; ?>>Fantasy</option>
                            <option value="Film-Noir" <?php echo ($genre === 'Film-Noir') ? 'selected' : ''; ?>>Film-Noir</option>
                            <option value="Game-Show" <?php echo ($genre === 'Game-Show') ? 'selected' : ''; ?>>Game-Show</option>
                            <option value="History" <?php echo ($genre === 'History') ? 'selected' : ''; ?>>History</option>
                            <option value="Horror" <?php echo ($genre === 'Horror') ? 'selected' : ''; ?>>Horror</option>
                            <option value="Music" <?php echo ($genre === 'Music') ? 'selected' : ''; ?>>Music</option>
                            <option value="Musical" <?php echo ($genre === 'Musical') ? 'selected' : ''; ?>>Musical</option>
                            <option value="Mystery" <?php echo ($genre === 'Mystery') ? 'selected' : ''; ?>>Mystery</option>
                            <option value="News" <?php echo ($genre === 'News') ? 'selected' : ''; ?>>News</option>
                            <option value="Reality-TV" <?php echo ($genre === 'Reality-TV') ? 'selected' : ''; ?>>Reality-TV</option>
                            <option value="Romance" <?php echo ($genre === 'Romance') ? 'selected' : ''; ?>>Romance</option>
                            <option value="Sci-Fi" <?php echo ($genre === 'Sci-Fi') ? 'selected' : ''; ?>>Sci-Fi</option>
                            <option value="Sport" <?php echo ($genre === 'Sport') ? 'selected' : ''; ?>>Sport</option>
                            <option value="Talk-Show" <?php echo ($genre === 'Talk-Show') ? 'selected' : ''; ?>>Talk-Show</option>
                            <option value="Thriller" <?php echo ($genre === 'Thriller') ? 'selected' : ''; ?>>Thriller</option>
                            <option value="War" <?php echo ($genre === 'War') ? 'selected' : ''; ?>>War</option>
                            <option value="Western" <?php echo ($genre === 'Western') ? 'selected' : ''; ?>>Western</option>"

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Released Year:</label>
                        <select name="year" required>
                            <?php
                            $startYear = 1900;
                            $currentYear = date('Y');
                            for ($y = $currentYear; $y >= $startYear; $y--) {
                                $selected = ($y == $year) ? 'selected' : ''; // Compare with the existing year value
                                echo '<option value="' . $y . '" ' . $selected . '>' . $y . '</option>' . PHP_EOL;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Language:</label>
                        <select name="language" required>
                            <option value="English" <?php echo ($language === 'English') ? 'selected' : ''; ?>>English</option>
                            <option value="Spanish" <?php echo ($language === 'Spanish') ? 'selected' : ''; ?>>Spanish</option>
                            <option value="French" <?php echo ($language === 'French') ? 'selected' : ''; ?>>French</option>
                            <option value="German" <?php echo ($language === 'German') ? 'selected' : ''; ?>>German</option>
                            <option value="Italian" <?php echo ($language === 'Italian') ? 'selected' : ''; ?>>Italian</option>
                            <option value="Japanese" <?php echo ($language === 'Japanese') ? 'selected' : ''; ?>>Japanese</option>
                            <option value="Korean" <?php echo ($language === 'Korean') ? 'selected' : ''; ?>>Korean</option>
                            <option value="Chinese" <?php echo ($language === 'Chinese') ? 'selected' : ''; ?>>Chinese</option>
                            <option value="Hindi" <?php echo ($language === 'Hindi') ? 'selected' : ''; ?>>Hindi</option>
                            <option value="Arabic" <?php echo ($language === 'Arabic') ? 'selected' : ''; ?>>Arabic</option>
                            <option value="Russian" <?php echo ($language === 'Russian') ? 'selected' : ''; ?>>Russian</option>
                            <option value="Portuguese" <?php echo ($language === 'Portuguese') ? 'selected' : ''; ?>>Portuguese</option>
                            <option value="Dutch" <?php echo ($language === 'Dutch') ? 'selected' : ''; ?>>Dutch</option>
                            <option value="Swedish" <?php echo ($language === 'Swedish') ? 'selected' : ''; ?>>Swedish</option>
                            <option value="Norwegian" <?php echo ($language === 'Norwegian') ? 'selected' : ''; ?>>Norwegian</option>
                            <option value="Danish" <?php echo ($language === 'Danish') ? 'selected' : ''; ?>>Danish</option>
                            <option value="Finnish" <?php echo ($language === 'Finnish') ? 'selected' : ''; ?>>Finnish</option>
                            <option value="Greek" <?php echo ($language === 'Greek') ? 'selected' : ''; ?>>Greek</option>
                            <option value="Polish" <?php echo ($language === 'Polish') ? 'selected' : ''; ?>>Polish</option>
                            <option value="Turkish" <?php echo ($language === 'Turkish') ? 'selected' : ''; ?>>Turkish</option>
                            <option value="Thai" <?php echo ($language === 'Thai') ? 'selected' : ''; ?>>Thai</option>
                            <option value="Indonesian" <?php echo ($language === 'Indonesian') ? 'selected' : ''; ?>>Indonesian</option>
                            <option value="Vietnamese" <?php echo ($language === 'Vietnamese') ? 'selected' : ''; ?>>Vietnamese</option>
                            <option value="Malay" <?php echo ($language === 'Malay') ? 'selected' : ''; ?>>Malay</option>
                            <option value="Hebrew" <?php echo ($language === 'Hebrew') ? 'selected' : ''; ?>>Hebrew</option>
                            <option value="Czech" <?php echo ($language === 'Czech') ? 'selected' : ''; ?>>Czech</option>
                            <option value="Hungarian" <?php echo ($language === 'Hungarian') ? 'selected' : ''; ?>>Hungarian</option>
                            <option value="Romanian" <?php echo ($language === 'Romanian') ? 'selected' : ''; ?>>Romanian</option>
                            <option value="Bulgarian" <?php echo ($language === 'Bulgarian') ? 'selected' : ''; ?>>Bulgarian</option>
                            <option value="Farsi" <?php echo ($language === 'Farsi') ? 'selected' : ''; ?>>Farsi</option>
                            <option value="Swahili" <?php echo ($language === 'Swahili') ? 'selected' : ''; ?>>Swahili</option>
                            <option value="Urdu" <?php echo ($language === 'Urdu') ? 'selected' : ''; ?>>Urdu</option>
                            <option value="Tagalog" <?php echo ($language === 'Tagalog') ? 'selected' : ''; ?>>Tagalog</option>
                            <option value="Kurdish" <?php echo ($language === 'Kurdish') ? 'selected' : ''; ?>>Kurdish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hall:</label>
                        <select name="hall" required>
                            <?php
                            // Retrieve hall details from the "moviehalldetails" table
                            $hallQuery = "SELECT * FROM moviehalldetails";
                            $hallResult = mysqli_query($conn, $hallQuery);

                            // Populate the select options with hall data
                            while ($hallRow = mysqli_fetch_assoc($hallResult)) {
                                $hallID = $hallRow['HallID'];
                                $hallName = $hallRow['HallName'];
                                $selected = ($hallID == $hallID) ? 'selected' : '';
                                echo '<option value="' . $hallID . '" ' . $selected . '>' . $hallName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ticket Price:</label>
                        <input type="text" name="ticket_price" required value="<?php echo isset($ticketPrice) ? htmlspecialchars($ticketPrice) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Show Timings:</label>
                        <select name="show_timings" required>
                            <option value="9:30 AM" <?php echo ($showTimings === '9:30 AM') ? 'selected' : ''; ?>>9:30 AM</option>
                            <option value="12:30 PM" <?php echo ($showTimings === '12:30 PM') ? 'selected' : ''; ?>>12:30 PM</option>
                            <option value="3:30 PM" <?php echo ($showTimings === '3:30 PM') ? 'selected' : ''; ?>>3:30 PM</option>
                            <option value="6:30 PM" <?php echo ($showTimings === '6:30 PM') ? 'selected' : ''; ?>>6:30 PM</option>
                            <option value="9:30 PM" <?php echo ($showTimings === '9:30 PM') ? 'selected' : ''; ?>>9:30 PM</option>
                        </select>
                    </div>
                    <div class="form-group" style="display:inline-flex;">
                        <div>
                            <p>Current Poster:</p>
                            <?php
                            if (!empty($posterPath)) {
                                echo '<img src="' . $posterPath . '" alt="Current Poster" height="150px">';
                            } else {
                                echo '<p>No poster available.</p>';
                            }
                            ?>
                        </div>
                        <div style="margin-left:25px;">
                            <label>Movie Poster:</label>
                            <input type="file" name="poster" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $movieID; ?>">
                        <input type="submit" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
