<?php

//Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
 $password = "A82P8QBWi@BPX-Y8";
 $dbname = "lms5";

 $conn = mysqli_connect($servername, $username, $password, $dbname);

// // Check the connection
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// // Handle the login form submission
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Get the username and password from the form
     $studentemail = $_POST["semail"];
     $studentpassword = $_POST["spassword"];

//     // Query the database to check if the username and password are correct
     $sql = "SELECT * FROM student_details WHERE S_email = '$studentemail' AND S_password = '$studentpassword'";
     $result = mysqli_query($conn, $sql);

//     // If a matching record is found, the login is successful
     if (mysqli_num_rows($result) == 1) {
         echo "Login successful!";
         // Redirect to the home page or any other authenticated page
          header("Location: Student_Dashboard.html");
     } else {
         echo "Invalid email or password!";
     }
 }

// // Close the database connection
 mysqli_close($conn);
?>
<!-- function login() {
    // Get the username and password from the form
    var username = document.getElementById("semail").value;
    var password = document.getElementById("spassword").value;
  
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
  
    // Set the request method and the URL
    xhr.open("POST", "logintry.html");
  
    // Set the request headers
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
    // Create the request body
    var body = "semail=" + username + "&spassword=" + password;
  
    // Send the request
    xhr.send(body);
  
    // Handle the response
    xhr.onload = function() {
      if (xhr.status == 200) {
        // The login was successful
        var response = xhr.responseText;
        if (response == "Login successful!") {
          // Redirect to the home page or any other authenticated page
          window.location.href = "Student_Dashboard.html";
        } else {
          // The login was unsuccessful
          alert("Invalid email or password!");
        }
      } else {
        // There was an error with the request
        alert("An error occurred!");
      }
    };
  } -->
