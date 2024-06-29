<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['USERID'])) {
    header("Location: login.html");
    exit();
}

// Database configuration
$db_username = "c##mit"; // Use your username
$db_password = "mit";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);

// Check connection
if (!$conn) {
    $e = oci_error();
    die("Connection failed: " . $e['message']);
}

// Retrieve the user's enrolled courses
$user_id = $_SESSION['USERID'];
$sql = "SELECT c.cname, c.csubject, c.cduration
        FROM course c
        INNER JOIN TRANSACTION1 t ON c.cid = t.courseid
        WHERE t.USERID = :user_id";

$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ":user_id", $user_id);
oci_execute($stmt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            transition: background-color 0.5s;
        }

        nav {
            background-color: #231840;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px; 
        }

        nav a {
            float: right;
            color: white;
            text-align: center;
            padding:15px;
            text-decoration: none;
            margin-left: 0px;
        }

        nav img {
            float: left;
            height: 70px;
            width: 70px;
            margin-right: 10px;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        section {
            padding: 20px;
        }
        h1{
            color:#f4f4f4;
            font-size:40px;
            font-family:'fantasy';
            margin: 0;
            line-height: 70px;
        }
        nav a.selected {
            background-color: #ddd;
            color: black;
        }
        .course-info {
        display: none;
        }

        .course-title {
         cursor: pointer;
        }

        .down-arrow {
         display: inline-block;
        margin-left: 5px;
        font-size: 14px;
        }

        fieldset{
            width: 70%;
            text-align:right;
            border-color:#32284d;
        }
    </style>
</head>

<body>

<nav>
       <img src="logo.png" alt="Web Logo" width="10" height="10">
     <h1>BRAINWAVE</h1>

    <a href="explore.php" onclick="selectNavItem(this)">Explore</a>
    <a href="homepg.php" onclick="selectNavItem(this)" class="selected">My courses</a>
    <a href="#" onclick="selectNavItem(this)">Result</a>
    <a href="#" onclick="selectNavItem(this)">About Us</a>
    <a href="#" onclick="selectNavItem(this)">Help</a>
    <a href="home.html" onclick="selectNavItem(this)">Logout</a>
</nav>

<section>
    <h1>My Courses</h1>

    <?php
    // Display enrolled courses or a message if not enrolled
    if ($row = oci_fetch_assoc($stmt)) {
        // User has enrolled in courses
        do {
            echo '<fieldset>';
            echo '<h2 class="course-title">' . $row['CNAME'] . '</h2>';
            echo '<div class="course-info">';
            echo '<p>COURSE ID: ' . $row['CID'] . '</p>';
            echo '<p>COURSE PRICE: ' . $row['CPRICE'] . '</p>';
            echo '<p>COURSE SUBJECT: ' . $row['CSUBJECT'] . '</p>';
            // Add more details as needed
            echo '</div>';
            echo '</fieldset>';
        } while ($row = oci_fetch_assoc($stmt));
    } else {
        // User has not enrolled in any courses
        echo '<p>You have not yet enrolled in a course. Kindly explore courses.</p>';
    }
    ?>

</section>

<script>
    function selectNavItem(element) {
        // Remove 'selected' class from all navigation items
        var navItems = document.querySelectorAll('nav a');
        navItems.forEach(item => item.classList.remove('selected'));

        // Add 'selected' class to the clicked navigation item
        element.classList.add('selected');
    }
    document.addEventListener('DOMContentLoaded', function () {
  const courseTitles = document.querySelectorAll('.course-title');

  courseTitles.forEach(function (title) {
    title.addEventListener('click', function () {
      const info = this.nextElementSibling; // .course-info
      info.style.display = (info.style.display === 'none' || info.style.display === '') ? 'block' : 'none';
    });
  });
});
</script>
</body>

</html>
