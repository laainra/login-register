<?php
include "conn.php";
session_start(); // Start the session

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $username = $_POST['username'];
  $password = md5($_POST['password']); // Encrypt the password with MD5

  // Check if the user exists in the database
  $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    // Save the user's session data
    $_SESSION['username'] = $username;
    // Redirect the user to the dashboard or home page
    header('Location: succeded.html');
  } else {
    // Display an error message
    echo 'Invalid username or password';
  }

  // Close the database connection
  mysqli_close($conn);
}
?>