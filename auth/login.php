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
