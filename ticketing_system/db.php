<?php
$host = "localhost"; // Host database
$username = "root"; // Username database
$password = ""; // Password database 
$dbname = "uas_pemweb"; // Nama database

// Membuat koneksi ke database MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi database
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>
