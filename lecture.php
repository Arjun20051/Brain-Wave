    <?php
    session_start();
		$courseId = 0;
        //echo "Debug: Course ID (initial): $courseId";
	$header = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Video Lecture Page</title>
        <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/starter-template/'>
        <!-- Bootstrap core CSS -->
        <link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>
        <style>
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
        <!-- Custom styles for this template -->
        <link href='starter-template.css' rel='stylesheet'>
    </head>
    <body>
        <main>
            <div class='container'>
                <header class='d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom'>
                    <a href='#' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none'>
                        <img class='logo' src='logo.jpg'>
                        <span class='fs-4'>BrainWave</span>
                    </a>
                    <!-- ... (your existing header content) ... -->
                    <ul class='nav nav-pills'>
                        <li class='nav-item'><a href='course1.php' type='button' class='btn btn-outline-primary me-2'>Home</a></li>
                  <!--      <li class='nav-item'><a href='lecture.php' type='button' class='btn btn-outline-primary me-2' class='nav-link active' aria-current='page'>Lectures</a></li>     -->
                  <li class='nav-item'><a href='pdf.php' type='button' class='btn btn-outline-primary me-2'>Study materials</a></li>      
                  <li class='nav-item'><a href='testhtml.php?courseid=<?php echo $courseId; ?>' type='button' class='btn btn-outline-primary me-2'>Take Test</a></li>
                        <li class='nav-item'><a href='feedback.php' type='button' class='btn btn-outline-primary me-2'>Feedback</a></li>
                        <li class='nav-item'><a href='faq.php' type='button' class='btn btn-outline-primary me-2'>FAQs</a></li>
                        <li class='nav-item'><a href='aboutus.php' type='button' class='btn btn-outline-primary me-2'>About us</a></li>
                        <li class='nav-item'><a href='profile.php' type='button' class='btn btn-outline-primary me-2'>My profile</a></li>
                        <li class='nav-item'><a href='logout.php' type='button' class='btn btn-outline-primary me-2' >Logout</a></li>
                    </ul>
                    <!-- ... (your existing content) ... -->
                    
                </header>
            </div>
            <div class='container text-center'>
                <div class='row align-items-start'>
                    <!-- ... (your existing content) ... -->
                </div>
            </div>
        </main>
        <!-- ... (your existing body content) ... -->

		<div class='container text-center'>
        <div class='row align-items-start'>
    </body>
    </html>";
 

    $lectureId = isset($_GET['lecture']) ? $_GET['lecture'] : '';
	$coursename = isset($_GET['course']) ? $_GET['course'] : '';
	
    // Set up database connection details
$db_username = "c##mit"; // Use your username
$db_password = "mit";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);
    // Check the connection and display an error message if it fails
    if (!$conn) {
      $e = oci_error();
      die("Connection failed: " . $e['message']);
    }

    // Define the SQL query to fetch the lecture information
    $sql = "SELECT * FROM lecture WHERE lectureid=:lectureid";

    // Prepare the SQL statement and bind the "lectureid" parameter
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":lectureid", $lectureId);

    // Execute the SQL statement and check for errors
    $result = oci_execute($stmt);

	$playSql = "SELECT * FROM lecture WHERE lectureid != :lectureid and courseid = :courseid";
	$playStmt = oci_parse($conn, $playSql);
   
	   $video = "";


       

	
    if ($result) {
      // Fetch the first row from the query result
      $row = oci_fetch_assoc($stmt);
      $courseId = 0;
      if ($row) {
          $lectureNotesHtml = $row['LECTURENOTES'];
          $courseId = $row['COURSEID'];
          $video = "<div class='col video-container'>".$lectureNotesHtml."</div>";
      } else {
          echo "<p>No lecture found with ID: $lectureId</p>";
      }
      $_SESSION['courseid'] = $courseId;
      // Add this line for debugging
     // echo "Debug: Course ID: $courseId";
   
      
    } else {
      echo "<p>Error executing the query.</p>";
    }
	
	
	 oci_bind_by_name($playStmt, ":lectureid", $lectureId);
	 oci_bind_by_name($playStmt, ":courseid", $courseId);

	$playResult = oci_execute($playStmt);

   $playlistStart = " <div class='col playlist'>
            <h2>Lectures</h2>  <ul class='playlist-list connected-list'>";
		
$playlistEnd = " </ul>
        </div>";
$playListItem = "";
    if ($playResult) {
  
  
  
	while ($playrow = oci_fetch_assoc($playStmt)) {
   
	
      // Check if a row was found and display the lecture information
      if ($playrow) {
       
        $lectureNotesHtml = $playrow['LECTURENOTES'];
		
		$courseId = $playrow['COURSEID'];
       
         $playListItem =  $playListItem ."<li class='playlist-item list-item'><img class='thumbnail' src='thumb.png' alt='Thumbnail 1'>  <a href='lecture.php?lecture=".$playrow['LECTUREID']."&course=".$coursename."'>".$playrow['LECNAME']."</a></li>";
      } 
    }
	}
	$playlist = $playlistStart.$playListItem.$playlistEnd;
	$footer = "<div> <span class='course'> ".$coursename."</span>
		</div>
    </main>
</body>
</html>
";

echo $header.$video.$playlist.$footer;
    ?>

