<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $usn = $_POST["usn"];
    $bookid = $_POST["bookid"];
    $issuedate = $_POST["issuedate"];
    $returndate = $_POST["returndate"];
  

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "A82P8QBWi@BPX-Y8";
    $database = "lms5";

    // Create a new MySQLi object
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to update the data
    $sql = "INSERT INTO borrower (Usn, Book_no, Issue_Date, Return_Date) VALUES ('$usn', '$bookid', '$issuedate', '$returndate')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
