<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $userphno = $_POST['userphno'];
    $userpassword = $_POST['userpassword'];

    // Database configuration
    $db_hostname = '127.0.0.1';
    $db_username = "c##mit"; // Use your username
    $db_password = "mit";    // and your password
    $db_name = "localhost/XE";

    // Create connection
    $conn = oci_connect($db_username, $db_password, "$db_hostname");

    // Check connection
    if (!$conn) {
        $e = oci_error();
        die("Connection failed: " . $e['message']);
    }

    // Prepare the SQL statement
    $sql = "SELECT * FROM webuser1 WHERE phno = :userphno AND password = :userpassword";

    // Prepare the statement
    $stmt = oci_parse($conn, $sql);

    // Bind the parameters
    oci_bind_by_name($stmt, ":userphno", $userphno);
    oci_bind_by_name($stmt, ":userpassword", $userpassword);

    // Execute the statement
    $result = oci_execute($stmt);

    // Check if login is successful
    if ($result) {
        // Fetch the result
        $row = oci_fetch_assoc($stmt);

        if ($row) {
            echo "Login successful. Welcome " . $row['NAME'];
            // Redirect to a welcome page or perform other actions
        } else {
            echo "Invalid login credentials. Please try again.";
        }
    } else {
        $e = oci_error($stmt);
        echo "Error: " . $e['message'];
    }

    // Close the statement and connection
    oci_free_statement($stmt);
    oci_close($conn);
} else {
    // Redirect to the login page if form data is not submitted
    header("Location: login.html");
    exit();
}
?>
