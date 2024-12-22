<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <title>Login</title>
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
=======
    <title>GoTravel Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
        }
        .stat-card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .chart-container {
            height: 300px;
>>>>>>> Stashed changes
        }
    </style>
</head>
<body>

<<<<<<< Updated upstream
<div class="position-absolute w-100 h-100 overflow-hidden">
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 100px; height: 100px; top: 10%; left: 10%; animation-delay: 0.2s"></div>
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 150px; height: 150px; top: 60%; left: 80%; animation-delay: 0.4s"></div>
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 80px; height: 80px; top: 80%; left: 20%; animation-delay: 0.6s"></div>
    <div class="floating-bubble animate__animated animate__fadeIn" style="width: 120px; height: 120px; top: 30%; left: 70%; animation-delay: 0.8s"></div>
</div>

<div class="register-wrapper">
    <div class="register-container">
        <h2 class="register-title animate__animated animate__fadeInDown">Login Account</h2>
        
        <form id="registerForm" action="../logic/login-auth.php" method="POST">
            <div class="form-floating mb-4 animate__animated animate__fadeInLeft" style="animation-delay: 0.5s">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-3 animate__animated animate__fadeInLeft" style="animation-delay: 0.7s">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" name="button-login" class="btn btn-register w-100 mb-4 animate__animated animate__fadeInUp" style="animation-delay: 1.1s" id="submitBtn">Login</button>
            
            <p class="text-center login-text animate__animated animate__fadeInUp" style="animation-delay: 1.3s">
                Belum punya akun? 
                <a href="register.php" class="login-link">Register here</a>
            </p>
        </form>
=======
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar p-3">
            <div class="text-white mb-4">
                <h4>GoTravel Admin</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="#dashboard">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#services">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#settings">
                        <i class="fas fa-cog me-2"></i>Settings
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>Dashboard</h1>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card stat-card bg-primary text-white">
                        <div class="card-body">
                            <h5>Hotel Bookings</h5>
                            <h2>245</h2>
                            <p><i class="fas fa-hotel"></i> Active Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card bg-success text-white">
                        <div class="card-body">
                            <h5>Train Bookings</h5>
                            <h2>187</h2>
                            <p><i class="fas fa-train"></i> Active Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card bg-warning text-white">
                        <div class="card-body">
                            <h5>Travel Bookings</h5>
                            <h2>156</h2>
                            <p><i class="fas fa-car"></i> Active Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card bg-info text-white">
                        <div class="card-body">
                            <h5>Flight Bookings</h5>
                            <h2>298</h2>
                            <p><i class="fas fa-plane"></i> Active Users</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Management -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tambah Layanan</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="serviceTab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#hotel">Hotel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#train">Kereta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#travel">Travel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#flight">Pesawat</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="hotel">
                                    <form action="../logic/add-service.php" method="POST">
                                        <input type="hidden" name="service_type" value="hotel">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Hotel</label>
                                            <input type="text" name="hotel_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Lokasi</label>
                                            <input type="text" name="hotel_location" class="form-control" required>
                                        </div>
                                        <button type="submit" name="add_hotel" class="btn btn-primary">Tambah Hotel</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="train">
                                    <form action="../logic/add-service.php" method="POST">
                                        <input type="hidden" name="service_type" value="train">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kereta</label>
                                            <input type="text" name="train_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Rute</label>
                                            <input type="text" name="train_route" class="form-control" required>
                                        </div>
                                        <button type="submit" name="add_train" class="btn btn-primary">Tambah Kereta</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="travel">
                                    <form action="../logic/add-service.php" method="POST">
                                        <input type="hidden" name="service_type" value="travel">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Travel</label>
                                            <input type="text" name="travel_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Rute</label>
                                            <input type="text" name="travel_route" class="form-control" required>
                                        </div>
                                        <button type="submit" name="add_travel" class="btn btn-primary">Tambah Travel</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="flight">
                                    <form action="../logic/add-service.php" method="POST">
                                        <input type="hidden" name="service_type" value="flight">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Maskapai</label>
                                            <input type="text" name="airline_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Rute Penerbangan</label>
                                            <input type="text" name="flight_route" class="form-control" required>
                                        </div>
                                        <button type="submit" name="add_flight" class="btn btn-primary">Tambah Penerbangan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Chart -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistik Pengguna</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="userStats" class="chart-container"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
>>>>>>> Stashed changes
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<<<<<<< Updated upstream
<script>
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const passwordFeedback = document.getElementById('passwordFeedback');
const confirmPasswordFeedback = document.getElementById('confirmPasswordFeedback');
const submitBtn = document.getElementById('submitBtn');

// Input animation on focus
document.querySelectorAll('.form-floating input').forEach(input => {
    input.addEventListener('focus', function() {
        this.classList.add('animate__animated', 'animate__pulse');
    });
    
    input.addEventListener('blur', function() {
        this.classList.remove('animate__animated', 'animate__pulse');
    });
});
=======
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize charts
    const ctx = document.getElementById('userStats').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Hotel Users',
                data: [65, 59, 80, 81, 56, 55],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            },
            {
                label: 'Train Users', 
                data: [28, 48, 40, 19, 86, 27],
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            },
            {
                label: 'Flight Users',
                data: [45, 52, 67, 89, 75, 61],
                borderColor: 'rgb(54, 162, 235)',
                tension: 0.1
            },
            {
                label: 'Travel Bus Users',
                data: [33, 41, 50, 45, 39, 42],
                borderColor: 'rgb(255, 159, 64)',
                tension: 0.1
            }]
        }
    });
>>>>>>> Stashed changes
</script>

</body>
</html>
<<<<<<< Updated upstream























=======
>>>>>>> Stashed changes
