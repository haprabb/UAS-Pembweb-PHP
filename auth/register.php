<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GoTravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/register.css">
</head>
<!-- Rest of the HTML remains the same -->
<body>
    <div class="container">
        <div class="auth-container">
            <div class="auth-inner">
                <div class="auth-image">
                    <div class="auth-image-content">
                        <h3>Welcome to GoTravel</h3>
                        <p>Your journey begins with us. Discover amazing destinations and create unforgettable memories.</p>
                    </div>
                </div>
                <div class="auth-form">
                    <div class="auth-tabs">
                        <div class="slider"></div>
                        <button class="nav-link active" onclick="switchForm('register')">Register</button>
                        <button class="nav-link" onclick="switchForm('login')">Login</button>
                    </div>

                    <div class="form-container">
                        <div class="form-section register-form">
                            <form id="registerForm" novalidate>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Full Name" required>
                                    <label for="name">Full Name</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                                    <label for="confirm_password">Confirm Password</label>
                                </div>
                                <button type="submit" class="btn btn-auth">Create Account</button>
                            </form>
                        </div>

                        <div class="form-section login-form">
                            <form id="loginForm" novalidate>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="login_email" placeholder="Email" required>
                                    <label for="login_email">Email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="login_password" placeholder="Password" required>
                                    <label for="login_password">Password</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-auth">Sign In</button>
                            </form>
                        </div>
                    </div>

                    <div class="social-login">
                        <p class="text-muted">Or continue with</p>
                        <a href="#" class="social-btn"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/register.js"></script>
</body>
</html>