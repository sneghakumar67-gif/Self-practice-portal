<?php
$host = "https://warm-pithivier-774dc9.netlify.app/";
$user = "root";
$pass = ""; // keep empty for XAMPP unless you set a password
$dbname = "newportal";  // <-- Correct database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



