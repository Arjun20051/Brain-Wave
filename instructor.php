<?php

// Start the session
session_start();
$course_id = $_SESSION['COURSEID'];


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

$sql = "SELECT i.INSID, i.COURSEID, i.INSNAME, i.RATING, i.EXPERIENCE, ip.NAME_JPG
        FROM INSTRUCTOR i
        INNER JOIN INS_PHOTOS ip ON i.INSID = ip.INSID
        INNER JOIN COURSE c ON i.COURSEID = c.CID
        WHERE c.CID = :course_id";

$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ":course_id", $course_id);
oci_execute($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video Lecture Page</title>
        <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/starter-template/'>
        <!-- Bootstrap core CSS -->
        <link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>
    <title>Select Instructor</title>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1, h2, p {
            margin: 0;
        }

        div {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .select-btn {
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .select-btn:hover {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }
        .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
    
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
    
            .connected-list {
                list-style-type: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }
    
            .list-item {
                display: flex;
                align-items: center;
                margin-bottom: 20px;
            }
    
            .icon-container {
                width: 30px;
                height: 30px;
                background-color: #3498db;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 10px;
            }
    
            .icon {
                color: #fff;
                font-size: 16px;
            }
    
            .list-item:not(:last-child) .icon-connector {
                margin-right: 10px;
            }
    
            .list-item .icon:after {
                content: '';
                width: 2px;
                height: 16px;
                background-color: rgba(33, 36, 44, 0.16);
                position: absolute;
                top: 40px;
                left: 23px;
            }
    
            .video-container iframe {
                width: 100%;
                height: 600px;
            }
    
            .playlist {
                background-color: #fff;
                border: 1px solid #ddd;
                padding: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 300px; /* Adjust the width as needed */
                height: 600px;
            }
    
            .playlist h2 {
                margin-bottom: 10px;
            }
    
            .playlist-list {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
    
            .playlist-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
    
            .thumbnail {
                width: 50px; /* Adjust the width as needed */
                height: 50px; /* Adjust the height as needed */
                margin-right: 10px;
            }
    
            .logo {
                height: 70px;
                width: 90px;
                margin-right: 10px;
                margin-bottom: 10px; /* Added margin-bottom for better spacing */
            }
    
            .fs-4 {
                margin-bottom: 0; /* Remove default margin-bottom to align with logo */
            }
    
            .nav-pills {
                align-items: center;
            }
    
            a {
                text-decoration: none;
            }
    
            .course {
                font-size: 40px;
                font-weight: 500;
                color: #0d6efd;
            }
    </style>
</head>

<body>
<header class='d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom'>
                    <a href='#' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none'>
                        <img class='logo' src='logo.jpg'>
                        <span class='fs-4'>BrainWave</span>
                    </a>
                    <!-- ... (your existing header content) ... -->
                    <ul class='nav nav-pills'>
                        <li class='nav-item'><a href='course1.php' type='button' class='btn btn-outline-primary me-2'>My courses</a></li>
                  <!--      <li class='nav-item'><a href='lecture.php' type='button' class='btn btn-outline-primary me-2' class='nav-link active' aria-current='page'>Lectures</a></li>     -->
                          <!--       <li class='nav-item'><a href='pdf.php' type='button' class='btn btn-outline-primary me-2'>Study materials</a></li>      
                  <li class='nav-item'><a href='testhtml.php?courseid=<?php echo $courseId; ?>' type='button' class='btn btn-outline-primary me-2'>Take Test</a></li>
         <li class='nav-item'><a href='feedback.php' type='button' class='btn btn-outline-primary me-2'>Feedback</a></li>-->
                        <li class='nav-item'><a href='faq.php' type='button' class='btn btn-outline-primary me-2'>FAQs</a></li>
                        <li class='nav-item'><a href='aboutus.php' type='button' class='btn btn-outline-primary me-2'>About us</a></li>
                        <li class='nav-item'><a href='logout.php' type='button' class='btn btn-outline-primary me-2' >Logout</a></li>
                    </ul>
                    <!-- ... (your existing content) ... -->
                    
             
   
            </header>

<h1>Select Instructor

</h1><br>

<?php
    while ($row = oci_fetch_assoc($stmt)) {
        echo '<div class="course-details-container d-flex justify-content-between">';
    
        echo '<div style="border: 1px solid #fff">';
        echo '<h2>' . $row['INSNAME'] . '</h2><br>';
       
        echo '<p>Rating: ' . $row['RATING'] . '</p>';
        echo '<p>Experience: ' . $row['EXPERIENCE'] . ' years</p>';
        // Display the instructor image
        echo '<button class="select-btn" onclick="selectInstructor(\'' . $row['INSID'] . '\')">Select</button>';
        echo '</div>';
        echo '<img src="' . $row['NAME_JPG'] . '.jpg" alt="' . $row['INSNAME'] . '" style="width: 200px; height: 200px;">';

        echo '</div>';
    }
?>
    <form id="selectForm" action="transaction.php" method="post">
        <input type="hidden" id="selectedInstructor" name="instructor_id" value="">
    </form>

<script>
    function selectNavItem(element) {
        // Add code for selecting navigation items
    }

    function selectInstructor(instructorId) {
        // Set the selected instructor ID in the session
        var userId = '<?php echo $_SESSION['USERID']; ?>';
        var courseId = '<?php echo $_SESSION['COURSEID']; ?>';

        // Use AJAX to store the values in the session
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "store_session.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("userId=" + userId + "&courseId=" + courseId + "&instructorId=" + instructorId);

        // Redirect to the transaction.php page
        window.location.href = 'transaction.php';
    }
</script>


</body>

</html>
