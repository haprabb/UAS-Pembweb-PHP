<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-purple: #6f42c1;
            --secondary-purple: #8854d0;
        }
        
        body {
            min-height: 100vh;
            background: radial-gradient(circle at top right, var(--secondary-purple), var(--primary-purple));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .register-wrapper {
            width: 100%;
            max-width: 900px;
            display: flex;
            gap: 2rem;
            padding: 2rem;
        }
        
        .register-container {
            flex: 1;
            background: rgba(255, 255, 255, 0.95);
            padding: 3rem;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .register-title {
            color: var(--primary-purple);
            font-size: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .form-floating {
            margin-bottom: 1.5rem;
            transform-style: preserve-3d;
        }

        .form-floating input {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 1.5rem 1rem;
            transition: all 0.3s ease;
        }

        .form-floating input:focus {
            border-color: var(--primary-purple);
            box-shadow: 0 0 15px rgba(111, 66, 193, 0.2);
            transform: translateZ(20px);
        }

        .btn-register {
            background: linear-gradient(45deg, var(--primary-purple), var(--secondary-purple));
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(111, 66, 193, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(111, 66, 193, 0.4);
            background: linear-gradient(45deg, var(--secondary-purple), var(--primary-purple));
        }

        /* Decorative Elements */
        .decoration-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: floatCircle 8s infinite ease-in-out;
        }

        @keyframes floatCircle {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(20px, -20px) scale(1.1); }
        }

        .circle-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .circle-2 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            right: 10%;
            animation-delay: -2s;
        }

        /* Glowing Effect */
        .glow {
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 50%, 
                rgba(111, 66, 193, 0.2), 
                transparent 50%);
            animation: glowPulse 4s infinite alternate;
        }

        @keyframes glowPulse {
            0% { opacity: 0.5; transform: scale(0.8); }
            100% { opacity: 0.8; transform: scale(1.2); }
        }

        /* 3D Card Tilt Effect */
        .register-container {
            transition: transform 0.3s ease;
        }

        .register-container:hover {
            transform: rotateX(5deg) rotateY(5deg);
        }

        /* Input Focus Animation */
        .form-floating label {
            transition: all 0.3s ease;
        }

        .form-floating input:focus + label {
            color: var(--primary-purple);
            transform: translateY(-1.5rem) scale(0.85);
        }

        /* Loading Spinner */
        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-purple);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="glow"></div>
    <div class="decoration-circle circle-1"></div>
    <div class="decoration-circle circle-2"></div>

    <div class="register-wrapper">
        <div class="register-container animate__animated animate__zoomIn">
            <h2 class="register-title animate__animated animate__slideInDown">Create Account</h2>
            <form id="registerForm">
                <div class="form-floating animate__animated animate__fadeInRight" style="animation-delay: 0.2s">
                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                    <label for="nama">Nama Lengkap</label>
                </div>
                
                <div class="form-floating animate__animated animate__fadeInLeft" style="animation-delay: 0.4s">
                    <input type="email" class="form-control" id="akun" placeholder="Email" required>
                    <label for="akun">Email</label>
                </div>
                
                <div class="form-floating animate__animated animate__fadeInRight" style="animation-delay: 0.6s">
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                
                <div class="form-floating animate__animated animate__fadeInLeft" style="animation-delay: 0.8s">
                    <input type="password" class="form-control" id="konfirmasi_password" placeholder="Konfirmasi Password" required>
                    <label for="konfirmasi_password">Konfirmasi Password</label>
                </div>
                
                <button type="submit" class="btn btn-register w-100 mt-4 animate__animated animate__bounceIn" style="animation-delay: 1s">
                    Daftar Sekarang
                    <div class="loading-spinner ms-2"></div>
                </button>
                
                <div class="text-center mt-4 animate__animated animate__fadeIn" style="animation-delay: 1.2s">
                    <p class="mb-0">Sudah punya akun? 
                        <a href="login.php" class="text-decoration-none" style="color: var(--primary-purple); font-weight: 600;">
                            Login disini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 3D Tilt Effect
        const container = document.querySelector('.register-container');
        
        container.addEventListener('mousemove', (e) => {
            const rect = container.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 30;
            const rotateY = -(x - centerX) / 30;
            
            container.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        container.addEventListener('mouseleave', () => {
            container.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
        });

        // Form Submit Animation
        const form = document.getElementById('registerForm');
        const spinner = document.querySelector('.loading-spinner');
        
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const button = form.querySelector('button[type="submit"]');
            button.disabled = true;
            spinner.style.display = 'inline-block';
            
            // Simulate form submission
            setTimeout(() => {
                button.disabled = false;
                spinner.style.display = 'none';
                // Add your form submission logic here
            }, 2000);
        });
    </script>
</body>
</html>




