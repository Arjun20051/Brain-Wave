<?php
session_start();

$db_username = "c##mit"; // Use your username
$db_password = "mit";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);


if (!$conn) {
    $error = oci_error();
    echo "Failed to connect to Oracle: " . $error['message'];
} else {
    $userId = $_SESSION['USERID'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Form submitted, update the database
        $name = $_POST['name'];
        $phno = $_POST['phno'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $street = $_POST['street'];
        $district = $_POST['district'];
        $state = $_POST['state'];
        $password = $_POST['password'];

        $updateQuery = "UPDATE webuser1 
                        SET NAME = :name, PHNO = :phno, DOB = :dob, EMAIL = :email, GENDER = :gender, 
                            STREET = :street, DISTRICT = :district, STATE = :state, PASSWORD = :password
                        WHERE USERID = :userId";

        $updateStmt = oci_parse($conn, $updateQuery);
        oci_bind_by_name($updateStmt, ':name', $name);
        oci_bind_by_name($updateStmt, ':phno', $phno);
        oci_bind_by_name($updateStmt, ':dob', $dob);
        oci_bind_by_name($updateStmt, ':email', $email);
        oci_bind_by_name($updateStmt, ':gender', $gender);
        oci_bind_by_name($updateStmt, ':street', $street);
        oci_bind_by_name($updateStmt, ':district', $district);
        oci_bind_by_name($updateStmt, ':state', $state);
        oci_bind_by_name($updateStmt, ':password', $password);
        oci_bind_by_name($updateStmt, ':userId', $userId);

        $result = oci_execute($updateStmt, OCI_COMMIT_ON_SUCCESS);

        if ($result) {
            header("Location: profile.php"); // Redirect to profile.php after successful update
            exit;
        } else {
            echo "Failed to update profile: " . oci_error($updateStmt)['message'];
        }

        oci_free_statement($updateStmt);
    }

    // Retrieve user data for displaying in the form
    $query = "SELECT * FROM webuser1 WHERE USERID = :userId";
    $stmt = oci_parse($conn, $query);
    oci_bind_by_name($stmt, ':userId', $userId);
    oci_execute($stmt);

    $userData = oci_fetch_assoc($stmt);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <!-- Add your styles here if needed -->
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center; /* Center content vertically */
        }

        .profile-image {
            width: 300px;
            height: 300px;
            margin-right: 20px;
            border-radius: 50%;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
<
    <div class="container">

        <img class="profile-image" src="edit_profile.jpg" alt="Profile Image" height="2000" width="100">
     
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $userData['NAME']; ?>" required>

            <label for="phno">Phone Number:</label>
            <input type="text" id="phno" name="phno" value="<?php echo $userData['PHNO']; ?>" required>

            <label for="dob">Date of Birth:</label>
            <input type="text" id="dob" name="dob" value="<?php echo $userData['DOB']; ?>" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $userData['EMAIL']; ?>" required>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo $userData['GENDER']; ?>" required>

            <label for="street">Street:</label>
            <input type="text" id="street" name="street" value="<?php echo $userData['STREET']; ?>" required>

            <label for="district">District:</label>
            <input type="text" id="district" name="district" value="<?php echo $userData['DISTRICT']; ?>" required>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="<?php echo $userData['STATE']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $userData['PASSWORD']; ?>" required>

            <button type="submit">Update Profile</button>
        </form>
    </div>

    </body>
    </html>

    <?php
    oci_free_statement($stmt);
    oci_close($conn);
}
?>
