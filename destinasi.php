<?php

include "query-db/users.php";
include "config/connection.php";

$userID = $_COOKIE["logusid"];
$gambarUser = getImageUser(getConnection(), $userID)[0]['image'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Travel</title>
    <link rel="stylesheet" href="styles/destinasi.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style1.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            transition: all 0.4s ease;
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #6366f1, #3b82f6, #2dd4bf);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }

        .navbar-nav .nav-link {
            position: relative;
            padding: 8px 20px;
            margin: 0 5px;
            font-weight: 500;
            color: #374151;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2.5px;
            background: linear-gradient(135deg, #6366f1, #3b82f6);
            transition: all 0.4s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .navbar-nav .nav-link:hover {
            color: #3b82f6;
        }

        .navbar-nav .nav-link:hover:before {
            width: 70%;
        }

        .navbar-nav .nav-link.active:before {
            width: 70%;
        }

        .login-btn {
            background: linear-gradient(135deg, #6366f1, #3b82f6);
            border: none;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        .user-profile img {
            border: 2px solid #3b82f6;
            transition: all 0.3s ease;
        }

        .user-profile:hover img {
            transform: scale(1.1);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        .dropdown-item {
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, #6366f1, #3b82f6);
            color: white;
        }

        .dropdown-item:hover i {
            color: white;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(1rem);
                opacity: 0;
            }

            100% {
                transform: translateY(0rem);
                opacity: 1;
            }
        }

        .slideIn {
            animation: slideIn 0.4s ease-in-out;
        }

        .navbar.scrolled {
            padding: 15px 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
                TravelKuy<span class="text-primary">.</span>
            </a>

            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <!-- Menu Items -->
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="destinasi.php">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>

                    <!-- Login/Profile Section -->
                    <?php if (!isset($_COOKIE['logus135'])): ?>
                        <li class="nav-item ms-3">
                            <a href="auth/login.php" class="btn btn-primary login-btn rounded-pill">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle user-profile d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="images/user/<?= $gambarUser ?>" alt="User Profile" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <span class="d-none d-lg-inline fw-medium"><?php echo $_COOKIE['logusname']; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end slideIn" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="auth/profile.php">
                                        <i class="fas fa-user me-2 text-primary"></i>Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="auth/settings.php">
                                        <i class="fas fa-cog me-2 text-primary"></i>Pengaturan
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="logic/logout.php">
                                        <i class="fas fa-sign-out-alt me-2"></i>Keluar
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>