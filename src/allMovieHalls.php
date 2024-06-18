<?php
// Include the database configuration
include 'config.php';
    
    session_start();

    if((!isset($_SESSION['Email']) && !isset($_SESSION['Pwd']) && !isset($_SESSION['Name']) && !isset($_SESSION['mobile']) && !isset($_SESSION['type']) && !isset($_SESSION['userId']) && !isset($_SESSION['LoginStat'])) ) 
        header("Location: loginFile.php");

    if($_SESSION['admin'] != true)
        header("Location: loginFile.php");
        
// Function to handle delete action
function deleteHall($conn, $hallID) {
    $query = "DELETE FROM moviehalldetails WHERE HallID = $hallID";
    $result = mysqli_query($conn, $query);
    if ($result) {
        // Redirect to a success page or display a success message
        echo "<script>alert('Movie Hall deleted successfully.'); window.location.href = 'MovieHallFile.php';</script>";
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
        echo "<script>alert('$error');</script>";
    }
}

// Query to retrieve all data from the moviehalldetails table
$query = "SELECT * FROM moviehalldetails";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Hall List</title>
    <link rel="stylesheet" href="./css/MovieHallList.css">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebarHead">
                <img src="./images/logo.jfif" height="50px" width="auto">
                <h1>SKY ON EYE</h1>
                <h3>Theater Dashboard</h3>
            </div>
            <br><br>
            <ul>
   
                <li><a href="./allMovieHalls.php">All Movies Hall</a></li>
                <li><a href="./MovieHallFile.php">Add Movie Hall</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1 style="text-align: center;">Movie Hall List</h1>
            <br>
            <table>
                <tr>
                    <th>Hall ID</th>
                    <th>Hall Name</th>
                    <th>No of Seats</th>
                    <th>3D Available</th>
                    <th>Street Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['HallID']; ?></td>
                    <td><?php echo $row['HallName']; ?></td>
                    <td><?php echo $row['NoOfSeats']; ?></td>
                    <td><?php echo ($row['avaiable3D'] == 1) ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $row['StreetAddress']; ?></td>
                    <td><?php echo $row['City']; ?></td>
                    <td>
                        <a href="updateMovieHall.php?id=<?php echo $row['HallID']; ?>">Edit</a>
                        <a href="#" onclick="confirmDelete(<?php echo $row['HallID']; ?>)">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(hallID) {
            if (confirm('Are you sure you want to delete this movie hall?')) {
                window.location.href = 'deleteMovieHall.php?id=' + hallID;
            }
        }
    </script>
</body>
</html>
