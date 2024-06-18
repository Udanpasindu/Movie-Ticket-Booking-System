<?php
include_once "config.php";

$RID = $_GET['rId'];

$sql = "SELECT * FROM feedback WHERE resID = '$RID'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the form data
        $feedbackID = $_POST['feedbackID'];
        $newrating1 = $_POST['rating1'];
        $newrating2 = $_POST['rating2'];
        $newrating3 = $_POST['rating3'];
        $newcomments = $_POST['comment'];

        // Update the feedback in the database
        $sql2 = "UPDATE feedback SET rating1 = '$newrating1', rating2 = '$newrating2', rating3 = '$newrating3', comments = '$newcomments' WHERE feedbackID = '$feedbackID'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            echo "<script>alert('Feedback updated successfully.');window.location.replace('updateFeedback.php?rId=$RID');</script>";
        } else {
            $error = "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            echo "<script>alert('$error');</script>";
        }
    }
} else {
    $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('$error');</script>";
}

mysqli_close($conn);
?>

<html>
<head>
    <title>Feedback Form</title>
    <style>
            body {
  min-height: 100vh;
  align-items: center;
  justify-content: center;
  background-image: linear-gradient(to bottom,#8cb6e5,rgb(87, 102, 240));
}


            .starrating {
    margin: 25px 0 0px;
   font-size: 0;
   white-space: nowrap;
   display: inline-block;
   width: 175px;
   height: 35px;
   overflow: hidden;
   position: relative;
   background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
   background-size: contain;
 }
 .feedback{
    width: 100%;
    max-width: 780px;
    background: #a291e0;
    margin: 0 auto;
    padding: 15px;
    box-shadow: 1px 1px 16px rgba(0, 0, 0, 0.3);
}
.survey-hr{
    margin:10px 0;
    border: .5px solid #ddd;
}
.feedback form input,
.feedback form textarea{
    width: 100%;
    border: 1px solid #ddd;
}
.star-rating {
    margin: 25px 0 0px;
   font-size: 0;
   white-space: nowrap;
   display: inline-block;
   width: 175px;
   height: 35px;
   overflow: hidden;
   position: relative;
   background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
   background-size: contain;
 }
 .star-rating i {
    opacity: 0;
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 20%;
    z-index: 1;
    background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
    background-size: contain;
  }
  .star-rating input {
    -moz-appearance: none;
    -webkit-appearance: none;
    opacity: 0;
    display: inline-block;
    width: 20%;
    height: 100%;
    margin: 0;
    padding: 0;
    z-index: 2;
    position: relative;
  }
  .star-rating input:hover + i,
  .star-rating input:checked + i {
    opacity: 1;
  }
  .star-rating i ~ i {
    width: 40%;
  }
  .star-rating i ~ i ~ i {
    width: 60%;
  }
  .star-rating i ~ i ~ i ~ i {
    width: 80%;
  }
  .star-rating i ~ i ~ i ~ i ~ i {
    width: 100%;
  }
  button {
    appearance: none;
    background-color: transparent;
    border: 0.125em solid #1A1A1A;
    border-radius: 0.9375em;
    box-sizing: border-box;
    color: #3B3B3B;
    cursor: pointer;
    display: inline-block;
    font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 16px;
    font-weight: 600;
    line-height: normal;
    margin: 0;
    min-height: 3.75em;
    min-width: 0;
    outline: none;
    padding: 1em 2.3em;
    text-align: center;
    text-decoration: none;
    transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    will-change: transform;
   }
   
   button:disabled {
    pointer-events: none;
   }
   
   button:hover {
    color: #fff;
    background-color: #1A1A1A;
    box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
    transform: translateY(-2px);
   }
   
   button:active {
    box-shadow: none;
    transform: translateY(0);
   }
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

.wrapper {
    display: flex;
}

.sidebar {
    background-color: #333;
    color: #fff;
    width: 250px;
    height: 120vh;
    padding: 20px;
}

.sidebarHead{
    text-align: center;
}

.sidebar h2 {
    margin-bottom: 30px;
}

.sidebar ul {
    list-style: none;
}

.sidebar li {
    margin-bottom: 10px;
}

.sidebar a {
    color: #fff;
    text-decoration: none;
}

.sidebar li > a:hover {
    background: #fff;
    color: #333;
}

.main-content {
    padding: 50px;
    flex: 1;
    justify-content: center;
}

@media screen and (max-width: 768px) {
    .wrapper {
        flex-direction: column;
    }

    .sidebar {
        height: auto;
        width: 100%;
    }
}

        </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebarHead">
                <img src="./images/logo.jfif" height="50px" width="auto">
                <h1>SKY ON EYE</h1>
                <h3>Admin Dashboard</h3>
            </div>
        </div>
        <div class="main-content">
            <div class="feedbacks">
                <?php
                if ($result) {
            // Check if there are any feedbacks
            if (mysqli_num_rows($result) > 0) {
                // Display feedbacks
                while ($row = mysqli_fetch_assoc($result)) {
                    $feedbackID = $row['feedbackID'];
                    $resID = $row['resID'];
                    $rating1 = $row['rating1'];
                    $rating2 = $row['rating2'];
                    $rating3 = $row['rating3'];
                    $comments = $row['comments'];

                    // Display edit form for each feedback
                    echo '
                    <div class="feedback-card">
                        <form method="post" action="" style="display:inline-block;">
                            <label for="rId">1. Reservation ID</label><br><br>
                            <input type="number" name="rId" value="' . $resID . '" readonly><br><br>

                            <label>4. Ratings for the movie</label><br>
                            <span class="star-rating">
                                <input type="radio" name="rating1" value="1" ' . ($rating1 == '1' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating1" value="2" ' . ($rating1 == '2' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating1" value="3" ' . ($rating1 == '3' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating1" value="4" ' . ($rating1 == '4' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating1" value="5" ' . ($rating1 == '5' ? 'checked' : '') . '><i></i>
                            </span>
                            <br>
                            <br>
                            <label>5. Ratings for the theater</label><br>
                            <span class="star-rating">
                                <input type="radio" name="rating2" value="1" ' . ($rating2 == '1' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating2" value="2" ' . ($rating2 == '2' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating2" value="3" ' . ($rating2 == '3' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating2" value="4" ' . ($rating2 == '4' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating2" value="5" ' . ($rating2 == '5' ? 'checked' : '') . '><i></i>
                            </span>
                            <br>
                            <br>
                            <label>6. Ratings for the snacks & food</label><br>
                            <span class="star-rating">
                                <input type="radio" name="rating3" value="1" ' . ($rating3 == '1' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating3" value="2" ' . ($rating3 == '2' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating3" value="3" ' . ($rating3 == '3' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating3" value="4" ' . ($rating3 == '4' ? 'checked' : '') . '><i></i>
                                <input type="radio" name="rating3" value="5" ' . ($rating3 == '5' ? 'checked' : '') . '><i></i>
                            </span>
                            <br>
                            <br>
                            <label for="comment">7. Any other comments</label><br><br>
                            <textarea name="comment" placeholder="Enter your comment here">' . $comments . '</textarea>
                            <br>
                            <br>
                            <input type="hidden" name="feedbackID" value="' . $feedbackID . '">
                            <input type="hidden" name="resId" value="' . $RID . '">
                            <button type="submit" name="submit">
                                Update Feedback
                            </button>
                        </form>
                        <a href="deleteFeedback.php?id=' . $feedbackID . '"><button>Delete</button></a>
                        <br>
                        <hr>
                        <br>
                    </div>';
                }
            } else {
                // Display a message if there are no feedbacks
                echo '<p>No feedbacks found.</p>';
            }
        }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
