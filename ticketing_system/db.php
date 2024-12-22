<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "uas_pemweb";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}
?>
