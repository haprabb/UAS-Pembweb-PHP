<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Travel.ID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="split-screen">
        <!-- Left Side - Travel Image -->
        <div class="left">
            <div class="left-content">
                <h2>Discover Your Next Adventure</h2>
                <p>Join us and explore the world's most beautiful destinations. Your journey begins here.</p>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="right">
            <div class="login-container">
                <div class="login-header">
                    <h1>Welcome Back!</h1>
                    <p>Sign in to continue your journey</p>
                </div>
                
                <form class="login-form" action="../logic/login-auth.php" method="POST">
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input" placeholder="Enter your email" required>
                        <i class="fas fa-envelope"></i>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input" placeholder="Enter your password" required>
                        <i class="fas fa-lock"></i>
                    </div>

                    <button type="submit" name="button-login" class="login-btn">
                        Sign In
                    </button>
                </form>
                
                <div class="login-footer">
                    <p>Don't have an account? <a href="register.php">Create Account</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>























