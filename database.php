<?php
$hostName = "localhost";
$userName = "admin";
$password = "admin";
$databaseName = "KIOSKDB";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
