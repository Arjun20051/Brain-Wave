<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color:lightblue;
            color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #feedback-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .stars {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }

        .star {
            font-size: 36px; /* Increase the size of the stars */
            cursor: pointer;
            transition: color 0.3s;
        }

        .star:hover,
        .star.active {
            color: yellow; /* Change the color to yellow for selected stars */
        }

        label {
            display: block;
            margin: 10px 0;
        }

        textarea {
            width: 100%;
            height: 100px;
            resize: none;
        }

        button {
            background-color: dodgerblue;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        img {
            width: 270px;
            height:270px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div id="feedback-form">
      <center>  <h2>Feedback </h2></center>
        <?php
        session_start();
        $userId = $_SESSION['USERID'];
        $courseId = isset($_SESSION['courseid']) ? $_SESSION['courseid'] : '';

   //     echo "Debug: USERID = $userId, COURSEID = $courseId<br>";
     //   $instructorId = $_SESSION['INSTRUCTORID'];
        // Include your database connection code here
$db_username = "c##mit"; // Use your username
$db_password = "mit";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);
    if (!$conn) {
      $e = oci_error();
      die("Connection failed: " . $e['message']);
    }
    $query = "SELECT INSID FROM TRANSACTION1 WHERE USERID = :userId AND COURSEID = :courseId";
    $stmt = oci_parse($conn, $query);
    oci_bind_by_name($stmt, ':userId', $userId);
    oci_bind_by_name($stmt, ':courseId', $courseId);
    oci_execute($stmt);

    // Fetch a single row
    $row = oci_fetch_assoc($stmt);

    if ($row) {
        $instructorId = $row['INSID'];
        $_SESSION['INSTRUCTORID'] = $instructorId; // Store the obtained INSID in the session variable
    } else {
        echo "Instructor ID not found for the given USERID and COURSEID.";
    }

// Fetch the instructor image filename based on INSID
$stmt = oci_parse($conn, "SELECT NAME_JPG FROM INS_PHOTOS WHERE INSID = :instructorId");
oci_bind_by_name($stmt, ':instructorId', $instructorId);
oci_execute($stmt);
//echo"insid:$instructorId";
// Fetch a single row
$row = oci_fetch_assoc($stmt);
//echo "Debug: INSID = $instructorId";
if ($row) {
    $imageName = $row['NAME_JPG'];

    // Display the instructor image
    echo "<center><img src='$imageName.jpg' alt='Instructor Image' ></center>";
} else {
    echo "Instructor image not found.";
}

oci_free_statement($stmt);
oci_close($conn);

        // Display the instructor image
  //      echo "<center><img src='$imageName.jpg' alt='Instructor Image'></center>";
        ?>
        
        <div class="stars" id="star-rating">
            <span class="star" onclick="setRating(1)">★</span>
            <span class="star" onclick="setRating(2)">★</span>
            <span class="star" onclick="setRating(3)">★</span>
            <span class="star" onclick="setRating(4)">★</span>
            <span class="star" onclick="setRating(5)">★</span>
        </div>
        
        <form method="post" action="submit_feedback.php">
            <!-- Hidden input fields to submit rating and review -->
            <input type="hidden" name="rating" id="ratingInput" value="0">
            <input type="hidden" name="review" id="reviewInput" value="">

            <label for="review">Write your review about our service (optional):</label>
            <textarea id="review" name="review"></textarea><br><br>
            <center>     <button type="submit">Submit Feedback</button> </center> 
        </form>
    </div>

    <script>
        let currentRating = 0;

        function setRating(rating) {
            currentRating = rating;

            for (let i = 1; i <= 5; i++) {
                const star = document.getElementById(`star-rating`).children[i - 1];
                if (i <= rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            }

            // Update hidden input field with the selected rating
            document.getElementById('ratingInput').value = rating;
        }

        // Update hidden input field with the entered review
        document.getElementById('review').addEventListener('input', function() {
            document.getElementById('reviewInput').value = this.value;
        });
    </script>
</body>
</html>
