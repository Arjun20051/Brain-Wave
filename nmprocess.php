<?php
session_start();

if(isset($_POST['submit'])) {
    if(isset($_POST['course'])) {
        $course_id = $_POST['course'];
        // Store the course ID in the session variable
        $_SESSION['courseid'] = $course_id; // Changed from 'course_id' to 'courseid'
        // Redirect to another page or do further processing
        header("Location: testhtml.php");
        exit();
    } else {
        // Handle case when course is not selected
        echo "Please select a course.";
    }
}
?>
