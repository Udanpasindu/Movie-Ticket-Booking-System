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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = sanitize($_POST["title"]);
    $genre = sanitize($_POST["genre"]);
    $year = sanitize($_POST["year"]);
    $language = sanitize($_POST["language"]);
    $hallId = sanitize($_POST["hall"]);
    $ticketPrice = sanitize($_POST["ticket_price"]); // Added ticket price
    $showTimings = sanitize($_POST["show_timings"]); // Added show timings

    // Upload movie poster image
    $poster = $_FILES["poster"]["name"];
    $targetDir = "assets/uploads/";
    $targetFile = $targetDir . basename($poster);
    move_uploaded_file($_FILES["poster"]["tmp_name"], $targetFile);

    // Get the path of the uploaded poster
    $posterPath = $targetFile;

    // Insert movie details into "movies" table
    $sql = "INSERT INTO movies (movName, movLang, movRelYear, movGenre, posterPath, movHallID, movTicketPrice, movShowTimings) VALUES ('$title', '$language', '$year', '$genre', '$posterPath', '$hallId', '$ticketPrice', '$showTimings')"; // Updated query
    if (mysqli_query($conn, $sql)) {
        // Display success message using JavaScript alert
        echo '<script>alert("Movie details added successfully!");</script>';
        header("Location: movieDash.php");
    } else {
        // Display error message using JavaScript alert
        echo '<script>alert("Error: ' . $sql . '\n' . mysqli_error($conn) . '");</script>';
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Movie</title>
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
                <h2>Add Movie Details</h2>
            </div>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Genre:</label>
                    <select name="genre" required>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Biography">Biography</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Crime">Crime</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Drama">Drama</option>
                        <option value="Family">Family</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Film-Noir">Film-Noir</option>
                        <option value="Game-Show">Game-Show</option>
                        <option value="History">History</option>
                        <option value="Horror">Horror</option>
                        <option value="Music">Music</option>
                        <option value="Musical">Musical</option>
                        <option value="Mystery">Mystery</option>
                        <option value="News">News</option>
                        <option value="Reality-TV">Reality-TV</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Sport">Sport</option>
                        <option value="Talk-Show">Talk-Show</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Released Year:</label>
                    <select name="year" required>
                        <?php
                            $startYear = 1900;
                            $currentYear = date('Y');
                            for ($year = $currentYear; $year >= $startYear; $year--) {
                                echo '<option value="' . $year . '">' . $year . '</option>' . PHP_EOL;
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Language:</label>
                    <select name="language" required>
                        <option value="English">English</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Spanish">Spanish</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                        <option value="Italian">Italian</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Korean">Korean</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Russian">Russian</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Dutch">Dutch</option>
                        <option value="Swedish">Swedish</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Danish">Danish</option>
                        <option value="Finnish">Finnish</option>
                        <option value="Greek">Greek</option>
                        <option value="Polish">Polish</option>
                        <option value="Turkish">Turkish</option>
                        <option value="Thai">Thai</option>
                        <option value="Indonesian">Indonesian</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="Malay">Malay</option>
                        <option value="Hebrew">Hebrew</option>
                        <option value="Czech">Czech</option>
                        <option value="Hungarian">Hungarian</option>
                        <option value="Romanian">Romanian</option>
                        <option value="Bulgarian">Bulgarian</option>
                        <option value="Farsi">Farsi</option>
                        <option value="Swahili">Swahili</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Tagalog">Tagalog</option>
                        <option value="Kurdish">Kurdish</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hall:</label>
                    <select name="hall" required>
                        <?php
                        $hallSql = "SELECT HallID, HallName FROM moviehalldetails";
                        $hallResult = mysqli_query($conn, $hallSql);
                        if (mysqli_num_rows($hallResult) > 0) {
                            while ($row = mysqli_fetch_assoc($hallResult)) {
                                echo '<option value="' . $row["HallID"] . '">' . $row["HallName"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ticket Price:</label>
                    <input type="number" name="ticket_price" required>
                </div>
                <div class="form-group">
                    <label>Show Timings:</label>
                    <select name="show_timings" required>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="6:30 PM">6:30 PM</option>
                        <option value="9:30 PM">9:30 PM</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Movie Poster:</label>
                    <input type="file" name="poster" accept="image/*" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
