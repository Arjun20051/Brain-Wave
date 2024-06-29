<?php
// Database connection parameters
$db_username = "c##mit"; // Use your username
$db_password = "mit";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);
// Create a connection to the database
// Check the connection
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Function to check if the password is strong
function isStrongPassword($password)
{
    // Check if the password has at least 8 characters
    if (strlen($password) < 8) {
        return false;
    }

    // Check if the password contains at least 1 special character
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        return false;
    }

    // Check if the password contains at least 1 digit
    if (!preg_match('/\d/', $password)) {
        return false;
    }

    // Check if the password contains at least 1 uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // If all conditions are met, the password is considered strong
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userphno = $_POST["userphno"];
    $userpassword = $_POST["userpassword"];
    $userpassword1 = $_POST["userpassword1"];

    // Check if the password is strong
    if (!isStrongPassword($userpassword) || $userpassword != $userpassword1) {
        echo "<script>alert('Password does not meet the requirements or passwords do not match. Please choose a stronger password.');</script>";
    } else {
        // Check if the phone number exists in the database
        $check_query = "SELECT * FROM webuser1 WHERE PHNO = :userphno";
        $check_stmt = oci_parse($conn, $check_query);
        oci_bind_by_name($check_stmt, ":userphno", $userphno);
        oci_execute($check_stmt);

        $check_result = oci_fetch_assoc($check_stmt);

        if ($check_result) {
            // Phone number exists, update the password
            $update_query = "UPDATE webuser1 SET PASSWORD = :userpassword WHERE PHNO = :userphno";
            $update_stmt = oci_parse($conn, $update_query);
            oci_bind_by_name($update_stmt, ":userpassword", $userpassword);
            oci_bind_by_name($update_stmt, ":userphno", $userphno);

            if (oci_execute($update_stmt)) {
                echo "<script>alert('Password changed successfully.');</script>";
                header("Location: login.html");
                exit(); // Make sure to exit after header redirect
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }

            oci_free_statement($update_stmt);
        } else {
            // Phone number does not exist, show a message and redirect to signup.html
            echo "<script>alert('Phone number not found. Please sign up.');</script>";
            echo "<script>window.location.href='signup.html';</script>";
        }

        oci_free_statement($check_stmt);
    }
}

// Close the database connection
oci_close($conn);
?>
