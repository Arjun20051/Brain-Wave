<?php
session_start(); // Start the session

// Database configuration
$db_username = "c##mit"; // Use your username
$db_password = "mit";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);


$header = "<!doctype html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content='Mark Otto, Jacob Thornton, and Bootstrap contributors'>
    <meta name='generator' content='Hugo 0.84.0'>
    <title>Starter Template · Bootstrap v5.0</title>

    <link rel='canonical' href='https://getbootstrap.com/docs/5.0/examples/starter-template/'>

    

    <!-- Bootstrap core CSS -->
<link href='assets/dist/css/bootstrap.min.css' rel='stylesheet'>

    <style>
    .logo {
      width: 50px; /* Adjust the width as needed */
      height: auto; /* Maintain aspect ratio */
      margin-right: 10px;
  }

  .navbar-brand {
      display: flex;
      align-items: center;
  }

  .nav-pills .nav-link {
      color: #000; /* Set the color for normal state */
  }

  .nav-pills .nav-link.active,
  .nav-pills .nav-link:hover {
      background-color: #0d6efd; /* Set the background color for active and hover states */
      color: #fff; /* Set the text color for active and hover states */
  }

  .btn-logout {
      color: #fff; /* Set text color for the logout button */
      background-color: #dc3545; /* Set background color for the logout button */
  }

  .btn-logout:hover {
      background-color: #c82333; /* Set background color for the logout button on hover */
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

  
    .container {
      width: 85%;
      max-width: 100%;
  }
  
  .album {
      width: 85%;
      max-width: 100%;
  }
  
  .card {
      width: 100%;
  }
  .custom-container {
    width: 100%;
    max-width: 100%;
}

   
    .icon-container {
      width: 30px;
      height: 30px;
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
	
	
.list-item .icon :after {
    content: '' !important;
    width: 2px !important;
    height: 16px !important;
    background-color: rgba(33,36,44,0.16) !important;
    position: absolute !important;
    top: 40px !important;
    left: 23px !important;
}


.logo {
  height: 70px;
  width: 90px;
  margin-left: 20px;
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
		

		a {
			text-decoration : none;
		}
    </style>

    
    <!-- Custom styles for this template -->
    <link href='starter-template.css' rel='stylesheet'>
  </head>
  <body>
    
<div class='custom-container'>
  <main>

  <header class='d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom'>
  <a href='#' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none'>
      <img class='logo' src='logo.jpg'>
      <span class='fs-4'>BrainWave</span>
  </a>
     
      <!-- ... (your existing header content) ... -->
      <ul class='nav nav-pills'>

          <li class='nav-item'><a href='explore.php' type='button' class='btn btn-outline-primary me-2'>Explore</a></li>
    <!--      <li class='nav-item'><a href='lecture.php' type='button' class='btn btn-outline-primary me-2' class='nav-link active' aria-current='page'>Lectures</a></li>     -->
      
    
         
          <li class='nav-item'><a href='faq.php' type='button' class='btn btn-outline-primary me-2'>FAQs</a></li>
          <li class='nav-item'><a href='aboutus.php' type='button' class='btn btn-outline-primary me-2'>About us</a></li>
          <li class='nav-item'><a href='profile.php' type='button' class='btn btn-outline-primary me-2'>My profile</a></li>
          <li class='nav-item'><a href='logout.php' type='button' class='btn btn-outline-primary me-2' >Logout</a></li>
      </ul>
      <!-- ... (your existing content) ... -->
      
  </header>

  
  <div class='album py-5 bg-light'>
    <div class='container'>

      <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
      


     
	   
	  
       
      
    $footer="   
      </div>
    </div>
  </div>

  </main>
  <footer class='pt-5 my-5 text-muted border-top'>
    
  </footer>
</div>


    <script src='../assets/dist/js/bootstrap.bundle.min.js'></script>

      
  </body>
</html>
";


if (!$conn) {
  $e = oci_error();
  die("Connection failed: " . $e['message']);
}

// Check if $_SESSION['userid'] is set
if (isset($_SESSION['USERID'])) {
  $userid = $_SESSION['USERID'];

  $sql = "SELECT * FROM TRANSACTION1 WHERE USERID=:userid";
  $stmt = oci_parse($conn, $sql);
  oci_bind_by_name($stmt, ":userid", $userid);
  $result = oci_execute($stmt);

  
$idx = 0;
  $innerBody1 = "";
  $rowCount = 0;
  while ($row = oci_fetch_assoc($stmt)) {
    $rowCount++;
	  $colors = generateColorPalette(6);
      $courseid = $row['COURSEID'];
      $insid = $row['INSID'];

      $sqlCourse = "SELECT * FROM COURSE WHERE CID=:courseid";
      $stmtCourse = oci_parse($conn, $sqlCourse);
      oci_bind_by_name($stmtCourse, ":courseid", $courseid);
      $resultCourse = oci_execute($stmtCourse);

      if ($resultCourse) {
          $rowCourse = oci_fetch_assoc($stmtCourse);
          $coursename = $rowCourse['CNAME'];

          $body1 = "<div class='col'>
              <div class='card shadow-sm'>
                  <svg class='bd-placeholder-img card-img-top' width='100%' height='75' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'>
                      <title>Placeholder</title>
                      <rect width='100%' height='100%' fill='#0d6efd'/>
                      <text x='50%' y='50%' fill='#eceeef' dy='.3em'>$coursename</text>
                  </svg>";

          $body2 = "
                  <div class='card-body'>
                      <ul class='connected-list'>";

          $sqlLecture = "SELECT * FROM LECTURE WHERE COURSEID=:courseid";
          $stmtLecture = oci_parse($conn, $sqlLecture);
          oci_bind_by_name($stmtLecture, ":courseid", $courseid);
          $resultLecture = oci_execute($stmtLecture);

          $body3 = "";
          $lectures = 0;
          while ($rowLecture = oci_fetch_assoc($stmtLecture)) {
              $body3 .= "
                      <li class='list-item'>
                          <div class='icon-container' style='background-color:".$colors[$idx]."'><div class='icon'>" . $rowLecture['LECNAME'][0] . "</div></div>
                          <div class='list-item-text'><a href='lecture.php?lecture=" . $rowLecture['LECTUREID'] . "&course=$coursename'>" . $rowLecture['LECNAME'] . "</a></div>
                      </li>";

              $lectures++;
          }

          $body4 = "</ul>
                      <div class='d-flex justify-content-between align-items-center'>
                          <div class='btn-group'>
                              <button type='button' class='btn btn-sm btn-outline-secondary'><a href='lecture.php?courseid=$courseid&coursename=$coursename'>View All</a></button>

                          </div>
                          <small class='text-muted'>$lectures Lectures</small>
                      </div>
                  </div>
              </div>
          </div>";

          $innerBody1 .= $body1 . $body2 . $body3 . $body4;
      }
	  $idx = $idx + 1;
  }
  if ($rowCount > 0) {
    // Display the existing content if rows are found
    echo $header . $innerBody1 . $footer;
} else {
    // Display a message and image if no rows are found
    echo $header . "<div class='container mt-5'>
    <div class='row'>
        <div class='col-md-6'>
            <img src='shrug.jpg' alt='No Courses Image' class='img-fluid' width='400' height='200'>
        </div>
        <div class='col-md-6 text-center'>
        <br><br><br><br><p class='mt-3' style='font-size: 24px;'>You have not enrolled in any course. <a href='explore.php'>Explore courses</a></p>
        </div>
    </div>
</div>" . $footer;
}
  

  echo $header . $innerBody1 . $footer;
} else {
  echo "<script>alert('Kindly login to your acoount'); window.location.href = 'login.html';</script>";

}

// Function to generate a random color
function generateRandomColor() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

// Function to generate a color palette with a specified number of colors
function generateColorPalette($numColors) {
    $palette = array();
    for ($i = 0; $i < $numColors; $i++) {
        $palette[] = generateRandomColor();
    }
    return $palette;
}


?>
