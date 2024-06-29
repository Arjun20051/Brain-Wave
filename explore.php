<?php
session_start();
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

$sql = "SELECT C.*, CP.NAME_JPG 
        FROM COURSE C
        LEFT JOIN COURSE_PHOTOS CP ON C.CID = CP.CID";
$stmt = oci_parse($conn, $sql);
oci_execute($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video Lecture Page</title>
        <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/starter-template/'>
        <!-- Bootstrap core CSS -->
        <link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>
    <title>Explore Courses</title>
    <style>
        /* Add your styles here */
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
    

            .logo {
                height: 70px;
                width: 90px;
                margin-right: 10px;
                margin-bottom: 2px; /* Added margin-bottom for better spacing */
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
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        nav img {
            width: 30px;
            height: 30px;
        }

        nav h1 {
            margin: 0;
            font-size: 1.5rem;
            color: #0d6efd;
        }

        nav a {
            text-decoration: none;
            color: #343a40;
            margin-right: 10px;
            font-size: 1rem;
        }

        nav a.selected {
            font-weight: bold;
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
<h1>Explore Courses</h1><br>

<?php
while ($row = oci_fetch_assoc($stmt)) {
    echo '<div class="course-details-container d-flex justify-content-between">';
    
    // Display the course details on the left side
    echo '<div style="border: 1px solid #fff">';
    echo '<h2>' . $row['CNAME'] . '</h2>';
   
    echo '<p>Price: Rs.' . $row['CPRICE'] . '</p>';
    echo '<p>Subject: ' . $row['CSUBJECT'] . '</p>';
    echo '<p>No. of Lectures: ' . $row['NOOFLECTURES'] . '</p>';
    echo '<p>Duration: ' . $row['CDURATION'] . '</p><br>';
    echo '<button class="select-btn" onclick="selectCourse(' . $row['CID'] . ')">Select</button>';
    echo '</div>';
    
    // Display the image on the right side
    echo '<img src="' . $row['NAME_JPG'] . '.jpg" alt="' . $row['CNAME'] . '" class="course-image" style="width: 325px; height:225px">';
    
    echo '</div>';
}
?>

<script>
    function selectNavItem(element) {
        // Add code for selecting navigation items
    }

    function selectCourse(courseId) {
        // Set the selected course ID in the session
        var userId = '<?php echo $_SESSION['USERID']; ?>';

        // Use AJAX to store the values in the session
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "store_session.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("userId=" + userId + "&courseId=" + courseId);

        // Redirect to the instructor.php page
        window.location.href = 'instructor.php';
    }
</script>

</body>

</html>
