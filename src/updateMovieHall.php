<!DOCTYPE html>
<html>
<head>
    <title>Movie Hall</title>
    <link rel="stylesheet" href="./css/MovieHall.css">
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
              
                <li><a href="./allMovieHalls.php">All Movies Hall</a></li>
                <li><a href="./MovieHallFile.php">Add Movie Hall</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1 style="text-align: center;">Edit Movie Hall</h1>
            <br>
            <?php
            // Include the database configuration
            include 'config.php';

            // Check if the 'id' parameter is present in the URL
            if (isset($_GET['id'])) {
                $hallID = $_GET['id'];

                // Query to retrieve data from the moviehalldetails table based on HallID
                $query = "SELECT * FROM moviehalldetails WHERE HallID = $hallID";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);

                // Prepopulating the form inputs with existing values
                $hallName = $row['HallName'];
                $noOfSeats = $row['NoOfSeats'];
                $is3DAvailable = $row['avaiable3D'];
                $streetAddress = $row['StreetAddress'];
                $city = $row['City'];
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get the form data
                $newhallID = $_POST['HallID'];
                $newhallName = $_POST['HallName'];
                $newnoOfSeats = $_POST['NoOfSeats'];
                $newis3DAvailable = $_POST['3davailable'];
                $newstreetAddress = $_POST['StreetAddress'];
                $newcity = $_POST['City'];

                // Update the data in the moviehalldetails table
                $query = "UPDATE moviehalldetails SET HallName = '$newhallName', NoOfSeats = $newnoOfSeats, avaiable3D = '$newis3DAvailable', StreetAddress = '$newstreetAddress', City = '$newcity' WHERE HallID = $newhallID";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    // Redirect to a success page or display a success message
                    echo "<script>alert('Movie Hall updated successfully.'); window.location.href = 'allMovieHalls.php';</script>";
                    exit();
                } else {
                    $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
                    echo "<script>alert('$error');</script>";
                }
            }
            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" id="HallID" name="HallID" value="<?php echo $hallID; ?>">
                <br><br>
                <label for="HallName">Movie Hall Name:</label>
                <input type="text" id="HallName" name="HallName" value="<?php echo $hallName; ?>">
                <br><br>
                <label for="NoOfSeats">No of seats:</label>
                <input type="number" id="NoOfSeats" name="NoOfSeats" value="<?php echo $noOfSeats; ?>">
                <br><br>
                <label for="3davailable">3D Available:</label>
                <input type="radio" name="3davailable" id="Yes" value="1" <?php echo ($is3DAvailable === '1') ? 'checked' : ''; ?>>
                <label for="Yes">Yes</label>
                <input type="radio" name="3davailable" id="No" value="0" <?php echo ($is3DAvailable === '0') ? 'checked' : ''; ?>>
                <label for="No">No</label>
                <br><br>
                <label for="StreetAddress">Street Address:</label>
                <input type="text" id="StreetAddress" name="StreetAddress" value="<?php echo $streetAddress; ?>">
                <br><br>
                <label for="City">City:</label>
                <input type="text" id="City" name="City" value="<?php echo $city; ?>">
                <br><br>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
