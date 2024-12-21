<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../styles/register.css">
    <style>
        .form-floating input {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(111, 66, 193, 0.2);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .form-floating input:focus {
            border-color: var(--primary-purple);
            box-shadow: 0 0 20px rgba(111, 66, 193, 0.3);
            background: white;
        }

        .form-floating label {
            color: #6f42c1;
            padding-left: 1rem;
        }

        .register-container {
            animation: fadeInUp 1s ease-out;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-register {
            background: linear-gradient(45deg, var(--primary-purple), var(--secondary-purple));
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 15px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(111, 66, 193, 0.4);
            background: linear-gradient(45deg, var(--secondary-purple), var(--primary-purple));
        }

        .floating-bubble {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
            animation: bubbleFloat 8s infinite ease-in-out;
        }

        @keyframes bubbleFloat {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(-20px, -20px); }
            50% { transform: translate(20px, -40px); }
            75% { transform: translate(-20px, -20px); }
        }

        .form-floating input:focus + label {
            color: var(--secondary-purple);
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .register-title {
            animation: glow 2s infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 5px rgba(111, 66, 193, 0.2);
            }
            to {
                text-shadow: 0 0 20px rgba(111, 66, 193, 0.6);
            }
        }

        .login-text {
            color: #333 !important;
            font-weight: 500;
        }

        .login-link {
            color: var(--primary-purple) !important;
            text-decoration: none !important;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .login-link:hover {
            color: var(--secondary-purple) !important;
            text-decoration: underline !important;
        }

        .password-feedback {
            font-size: 0.875rem;
            margin-top: 0.25rem;
            color: #dc3545;
            display: none;
        }

        .form-floating input.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }

        .form-floating input.is-valid {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
    </style>
</head>
<body>

<div class="position-absolute w-100 h-100 overflow-hidden">
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 100px; height: 100px; top: 10%; left: 10%; animation-delay: 0.2s"></div>
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 150px; height: 150px; top: 60%; left: 80%; animation-delay: 0.4s"></div>
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 80px; height: 80px; top: 80%; left: 20%; animation-delay: 0.6s"></div>
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 120px; height: 120px; top: 30%; left: 70%; animation-delay: 0.8s"></div>
</div>

<div class="register-wrapper">
    <div class="register-container">
        <h2 class="register-title animate__animated animate__fadeInDown">Create Account</h2>
        
        <form id="registerForm" action="../logic/register-auth.php" method="POST">
            <div class="form-floating mb-4 animate__animated animate__fadeInLeft" style="animation-delay: 0.3s">
                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required maxlength="15">
                <label for="name">Full Name</label>
            </div>

            <div class="form-floating mb-4 animate__animated animate__fadeInLeft" style="animation-delay: 0.5s">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-3 animate__animated animate__fadeInLeft" style="animation-delay: 0.7s">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                <div class="password-feedback" id="passwordFeedback">Password harus minimal 8 karakter</div>
            </div>

            <div class="form-floating mb-2 animate__animated animate__fadeInLeft" style="animation-delay: 0.9s">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                <label for="confirmPassword">Confirm Password</label>
                <div class="password-feedback" id="confirmPasswordFeedback">Password tidak cocok</div>
            </div>

            <button type="submit" name="button-register" class="btn btn-register w-100 mb-4 animate__animated animate__fadeInUp" style="animation-delay: 1.1s" id="submitBtn" disabled>Register</button>
            
            <p class="text-center login-text animate__animated animate__fadeInUp" style="animation-delay: 1.3s">
                Already have an account? 
                <a href="login.php" class="login-link">Login here</a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const passwordFeedback = document.getElementById('passwordFeedback');
const confirmPasswordFeedback = document.getElementById('confirmPasswordFeedback');
const submitBtn = document.getElementById('submitBtn');

function validatePasswords() {
    let isValid = true;

    // Validate password length
    if(password.value.length < 8) {
        password.classList.add('is-invalid');
        password.classList.remove('is-valid');
        passwordFeedback.style.display = 'block';
        isValid = false;
    } else {
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        passwordFeedback.style.display = 'none';
    }

    // Validate password match
    if(password.value !== confirmPassword.value || confirmPassword.value === '') {
        confirmPassword.classList.add('is-invalid');
        confirmPassword.classList.remove('is-valid');
        confirmPasswordFeedback.style.display = 'block';
        isValid = false;
    } else {
        confirmPassword.classList.remove('is-invalid');
        confirmPassword.classList.add('is-valid');
        confirmPasswordFeedback.style.display = 'none';
    }

    // Enable/disable submit button
    submitBtn.disabled = !isValid;
}

password.addEventListener('input', validatePasswords);
confirmPassword.addEventListener('input', validatePasswords);

document.getElementById('registerForm').addEventListener('submit', function(e) {
    if(password.value.length < 8 || password.value !== confirmPassword.value) {
        e.preventDefault();
        validatePasswords();
    }
});

// Input animation on focus
document.querySelectorAll('.form-floating input').forEach(input => {
    input.addEventListener('focus', function() {
        this.classList.add('animate__animated', 'animate__pulse');
    });
    
    input.addEventListener('blur', function() {
        this.classList.remove('animate__animated', 'animate__pulse');
    });
});
</script>

</body>
</html>























