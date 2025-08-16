<?php
// step1 define the database

$servername = "localhost";
$username = "root";
$password = "";
$database = "ice-cream-shop";

// step2 create connection
$conn = new mysqli( $servername, $username, $password, $database);

// step3 check connection
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
?>