<?php

error_reporting(E_ALL);
$host = "localhost";
$user = "root";
$password = "";
$dbname = "log";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>