<?php
session_start();
include '../config/connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil koneksi dari fungsi
    $pdo = getConnection();

    // Query untuk memeriksa email dan mengambil hash password
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        
        // Verifikasi password hash
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email;
            header("Location: ../index.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Login - Travel Website</title>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../styles/login.css">
<head>
<body>
   <div class="login-container">
       <div class="login-header">
           <h2>Selamat Datang</h2>
           <p>Silakan login untuk melanjutkan perjalanan Anda</p>
       </div>
       
       <form action="../logic/login-auth.php" method="POST" name="form-login">
           <div class="form-group">
               <label for="email">Email</label>
               <input type="email" id="email" name="email" required>
           </div>
           
           <div class="form-group">
               <label for="password">Password</label>
               <input type="password" id="password" name="password" required>
           </div>
           
           <button type="submit" class="login-btn" name="button-login">Masuk</button>
       </form>
       
       <div class="register-link">
           Belum punya akun? <a href="register.php">Daftar sekarang</a>
       </div>
   </div>
<body>
<html>
