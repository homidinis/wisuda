<?php
$servername = "localhost";
$username = "wisuser";
$password = "wispwd";

// Create connection
$conn = new mysqli($servername, $username, $password,"wisudapresensi");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>