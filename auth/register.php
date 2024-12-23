<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Travel.ID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Menggunakan style yang sama dengan login.php */
        :root {
            --primary: #2563eb;
            --secondary: #3b82f6;
            --accent: #10b981;
            --white: #ffffff;
            --light: #f8fafc;
            --dark: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            overflow: hidden;
        }

        .split-screen {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        /* Left Side - Travel Image */
        .left {
            flex: 1.5;
            position: relative;
            overflow: hidden;
        }

        .left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1682687220742-aba13b6e50ba') center/cover no-repeat;
            animation: scaleImage 20s infinite alternate;
        }

        .left::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to right,
                rgba(37, 99, 235, 0.2),
                rgba(59, 130, 246, 0.1)
            );
        }

        .left-content {
            position: relative;
            z-index: 1;
            padding: 40px;
            color: var(--white);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .left-content h2 {
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 20px;
        }

        .left-content p {
            font-size: 1.2rem;
            max-width: 600px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            margin-bottom: 40px;
        }

        /* Right Side - Register Form */
        .right {
            flex: 1.2;
            padding: 30px;
            max-height: 100vh;
            overflow-y: auto;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            padding: 20px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .register-header h1 {
            color: var(--dark);
            font-size: 2.2rem;
            margin-bottom: 10px;
        }

        .register-header p {
            color: #64748b;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 14px 45px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s;
            background: var(--light);
        }

        .form-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(37,99,235,0.1);
            background: var(--white);
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .register-btn {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .register-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37,99,235,0.3);
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-footer {
            text-align: center;
            margin-top: 30px;
            color: #64748b;
        }

        .register-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .register-footer a:hover {
            color: var(--secondary);
        }

        @keyframes scaleImage {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .split-screen {
                flex-direction: row;
            }

            .left {
                flex: 1;
            }

            .right {
                flex: 1.2;
            }

            .register-container {
                padding: 15px;
            }
        }

        @media (max-width: 992px) {
            .split-screen {
                flex-direction: column;
            }

            .left {
                flex: none;
                height: 300px;
            }

            .right {
                flex: none;
                height: calc(100vh - 300px);
                padding: 20px;
            }

            .left-content {
                padding: 30px;
            }

            .left-content h2 {
                font-size: 2.2rem;
            }

            .register-container {
                max-width: 500px;
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .left {
                height: 250px;
            }

            .right {
                height: calc(100vh - 250px);
                padding: 15px;
            }

            .left-content h2 {
                font-size: 2rem;
            }

            .left-content p {
                font-size: 1rem;
            }

            .register-header h1 {
                font-size: 1.8rem;
            }

            .register-header p {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .left {
                height: 200px;
            }

            .right {
                height: calc(100vh - 200px);
                padding: 10px;
            }

            .register-container {
                padding: 15px;
            }

            .form-input {
                padding: 12px 40px;
                font-size: 0.9rem;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .register-btn {
                padding: 12px;
                font-size: 1rem;
            }

            .register-footer {
                font-size: 0.9rem;
            }
        }

        /* Fix untuk device dengan layar pendek */
        @media (max-height: 700px) {
            .form-group {
                margin-bottom: 15px;
            }

            .register-header {
                margin-bottom: 20px;
            }

            .form-input {
                padding: 10px 40px;
            }

            .register-btn {
                padding: 10px;
            }
        }

        /* Landscape mode untuk mobile */
        @media (max-height: 500px) {
            .split-screen {
                flex-direction: row;
            }

            .left {
                flex: 1;
                height: 100vh;
            }

            .right {
                flex: 1.2;
                height: 100vh;
            }

            .register-container {
                padding: 10px;
            }

            .form-group {
                margin-bottom: 10px;
            }
        }

        /* Additional Enhancements */
        .form-input:focus + i {
            color: var(--accent);
        }

        .register-btn {
            margin-top: 10px;
        }

        .form-group.success .form-input {
            border-color: var(--accent);
        }

        .form-group.error .form-input {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 5px;
            display: none;
        }

        .form-group.error .error-message {
            display: block;
        }

        /* Loading State */
        .register-btn.loading {
            background: var(--secondary);
            pointer-events: none;
            position: relative;
        }

        .register-btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin: -10px 0 0 -10px;
            border: 2px solid var(--white);
            border-top-color: transparent;
            border-radius: 50%;
            animation: button-loading-spinner 1s linear infinite;
        }

        @keyframes button-loading-spinner {
            from {
                transform: rotate(0turn);
            }
            to {
                transform: rotate(1turn);
            }
        }

        /* Improved Scrollbar */
        .right::-webkit-scrollbar {
            width: 8px;
        }

        .right::-webkit-scrollbar-track {
            background: var(--light);
            border-radius: 10px;
        }

        .right::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="split-screen">
        <!-- Left Side - Travel Image -->
        <div class="left">
            <div class="left-content">
                <h2>Begin Your Adventure</h2>
                <p>Join our community of travelers and discover amazing destinations around the world.</p>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="right">
            <div class="register-container">
                <div class="register-header">
                    <h1>Create Account</h1>
                    <p>Start your journey with us today</p>
                </div>
                
                <form class="register-form" action="../logic/register-auth.php" method="POST" id="registerForm">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-input" placeholder="Enter your full name" required>
                        <i class="fas fa-user"></i>
                        <div class="error-message">Please enter your full name</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input" placeholder="Enter your email" required>
                        <i class="fas fa-envelope"></i>
                        <div class="error-message">Please enter a valid email address</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input" placeholder="Create a password" required>
                        <i class="fas fa-lock"></i>
                        <div class="error-message">Password must be at least 8 characters</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-input" placeholder="Confirm your password" required>
                        <i class="fas fa-lock"></i>
                        <div class="error-message">Passwords do not match</div>
                    </div>
                    
                    <button type="submit" name="button-register" class="register-btn">
                        Create Account
                    </button>
                </form>
                
                <div class="register-footer">
                    <p>Already have an account? <a href="login.php">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form validation
        const form = document.getElementById('registerForm');
        form.addEventListener('submit', function(e) {
            let hasError = false;
            const password = form.querySelector('input[name="password"]');
            const confirmPassword = form.querySelector('input[name="confirm_password"]');
            
            // Reset previous errors
            form.querySelectorAll('.form-group').forEach(group => {
                group.classList.remove('error');
            });

            // Validate password length
            if (password.value.length < 8) {
                password.parentElement.classList.add('error');
                hasError = true;
            }

            // Validate password match
            if (password.value !== confirmPassword.value) {
                confirmPassword.parentElement.classList.add('error');
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
            } else {
                const button = form.querySelector('.register-btn');
                button.classList.add('loading');
            }
        });
    </script>
</body>
</html>























