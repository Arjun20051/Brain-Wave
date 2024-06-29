<?php
session_start(); // Start the session

// Database configuration
$db_username = "system"; // Use your username
$db_password = "abinayat123";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);




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

  $header = "<!doctype html>
  <!-- ... (your HTML header code) -->";

  $innerBody1 = "";
  while ($row = oci_fetch_assoc($stmt)) {
      $courseid = $row['COURSEID'];
      $insid = $row['INSID'];

      $sqlCourse = "SELECT * FROM COURSE WHERE CID=:courseid";
      $stmtCourse = oci_parse($conn, $sqlCourse);
      oci_bind_by_name($stmtCourse, ":courseid", $courseid);
      $resultCourse = oci_execute($stmtCourse);
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
      
              /* ... (rest of the CSS styles) ... */
      
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
                      <ul class='nav nav-pills'>
                          <li class='nav-item'><a href='course1.php' type='button' class='btn btn-outline-primary me-2'>Home</a></li>
                          <!-- ... (your existing navigation links) ... -->
                      </ul>
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
      ";
      
      // Output the header
      echo $header;
      
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
                          <div class='icon-container'><div class='icon'>" . $rowLecture['LECNAME'][0] . "</div></div>
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
  }

  echo $header . $innerBody1 ;
} else {
  echo "User ID not set in the session.";
}


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
