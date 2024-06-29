<?php
session_start();

$db_username = "c##mit"; // Use your username
$db_password = "mit";    // and your password
$db_connection_string = "//localhost:1521/XE"; // Full connection string
$conn = oci_connect($db_username, $db_password, $db_connection_string);

// Check if the connection is successful
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else {
    if (class_exists('FPDF')) {
        try {
            $pdf->Output();
        } catch (Exception $e) {
            echo "FPDF Error: " . $e->getMessage();
        }
    } else {
        echo "FPDF class not found. Make sure the FPDF library is properly included.";
    }
}

// Get USERID and CID from session
$userid = $_SESSION['USERID'];
$courseid = $_SESSION['courseid'];

// Prepare the SQL query to fetch user details
$query = "SELECT w.NAME AS user_name, c.CNAME AS course_name, TO_CHAR(tr.DATE_TIME, 'YYYY-MM-DD') AS date_of_completion
          FROM webuser1 w
          JOIN COURSE c ON w.USERID = :userid
          JOIN TEST_RESULT tr ON w.USERID = tr.USERID AND c.CID = tr.CID
          WHERE w.USERID = :userid AND c.CID = :courseid";

$statement = oci_parse($conn, $query);
oci_bind_by_name($statement, ':userid', $userid);
oci_bind_by_name($statement, ':courseid', $courseid);
oci_execute($statement);
// Start output buffering
ob_clean();
ob_start();

if ($row = oci_fetch_assoc($statement)) {
    require("fpdf.php"); // Include the FPDF library

    // Create an instance of FPDF
    $pdf = new FPDF();
    $pdf->AddPage('Letter');

    // Load Certificate Template (adjust path and dimensions)
    $pdf->Image('certi.jpg', 0, 0, 300, 210);

    // Set Font and Add Text
    $pdf->SetFont("Arial", "", 22);

    // Assuming you've set the font and added the image as in your previous code

    $pdf->SetXY(125, 110); // Set the starting position for the first line
    $pdf->MultiCell(150, 10, "{$row['USER_NAME']} ", 0, 'L');

    $pdf->SetXY(80, $pdf->GetY() + 19); // Move to the next line
    $pdf->MultiCell(130, 10, "{$row['COURSE_NAME']}", 0, 'C'); // Centered text

    $pdf->SetXY(100, $pdf->GetY() + 20); // Move to the next line
    $pdf->MultiCell(140, 10, "{$row['DATE_OF_COMPLETION']}", 0, 'R'); // Right-aligned text

    // Output the generated certificate
    $pdf->Output();
} else {
    echo "No data found for the provided user and pass result.";
}

// Free and close resources
oci_free_statement($statement);
oci_close($conn);

// Get the content of the output buffer and clean it
$pdf_content = ob_get_clean();

// Output the PDF content to the browser
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="certificate.pdf"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
echo $pdf_content;
?>
