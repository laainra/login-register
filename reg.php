<?php
include "conn.php";
session_start(); // Start the session

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $username = $_POST['username'];
  $password = md5($_POST['password']); // Encrypt the password with MD5


  // Check if the username or email already exists in the database
  $sql = "SELECT * FROM login WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // Display an error message
    echo 'Username or email already exists';
  } else {
    // Insert the user's data into the database
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
      // Save the user's session data
      $_SESSION['username'] = $username;
      // Redirect the user to the dashboard or home page
      header('Location: index.html');
    } else {
      // Display an error message
      echo 'Error: ' . mysqli_error($conn);
    }
  }

  // Close the database connection
  mysqli_close($conn);
}
?>