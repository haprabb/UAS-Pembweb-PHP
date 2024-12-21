<?php
session_start();
// / Cek jika user belum login, redirect ke halaman login
if (!isset($_SESSION['user'])) {
   header("Location: auth/login.php");
   exit();
   
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Profil Pengguna</title>
   <style>
       .profile-container {
           max-width: 600px;
           margin: 50px auto;
           padding: 20px;
           box-shadow: 0 0 10px rgba(0,0,0,0.1);
       }
       .logout-btn {
           background-color: #dc3545;
           color: white;
           padding: 10px 20px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           text-decoration: none;
       }
       .logout-btn:hover {
           background-color: #c82333;
       }
   </style>
<head>
<body>
   <div class="profile-container">
       <h2>Selamat Datang, <?php echo $_SESSION['user']['nama'] ?? 'Pengguna'; ?></h2>
       <p>Email: <?php echo $_SESSION['user']['email'] ?? '-'; ?></p>
       
       <a href="../index.php" class="logout-btn">Logout</a>
   </div>
<body>
<html>