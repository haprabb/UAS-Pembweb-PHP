<?php

include "query-db/users.php";
include "config/connection.php";

$userID = $_COOKIE["logusid"];
$gambarUser = getImageUser(getConnection(), $userID)[0]['image'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - TravelKuy</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="styles/navbar.css">
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
                        <a class="nav-link" href="ticketing_system/index.php">Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">Tentang</a>
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
    <section class="pt-5" style="margin-top: 100px;">
        <div class="container text-center">
            <h1 class="mb-4">Tentang Kami</h1>
            <p class="mb-5">Kami adalah tim kreatif yang bersemangat untuk menyediakan pengalaman terbaik dalam merencanakan perjalanan Anda.</p>
            <div class="row">
                <!-- Anggota Tim -->
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow">
                        <img src="images/owner/diaz.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Anggota 1" style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Diaz Rangga Saksena</h5>
                            <h5 class="card-title">K3522020</h5>
                            <p class="card-text">UI/UX Designer</p>
                            <p><i class="fas fa-envelope me-2"></i>diazsaksena20@student.uns.ac.id</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow">
                        <img src="images/owner/Cahyo.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Anggota 2" style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Lasminanto Nur Cahyo</h5>
                            <h5 class="card-title">K3522038</h5>
                            <p class="card-text">Frontend Developer</p>
                            <p><i class="fas fa-envelope me-2"></i>nurcahyo01@student.uns.ac.id</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow">
                        <img src="images/owner/wildan.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Anggota 3" style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Muhammad Wildan Azizi</h5>
                            <h5 class="card-title">K3522050</h5>
                            <p class="card-text">Frontend Developer</p>
                            <p><i class="fas fa-envelope me-2"></i>budi@travelkuy.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="images/owner/ridwan.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Anggota 4" style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Ridwanul Bakhri</h5>
                            <h5 class="card-title">K3522068</h5>
                            <p class="card-text">Back-End Developer</p>
                            <p><i class="fas fa-envelope me-2"></i>ridwanulbakhri@student.uns.ac.id</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="images/owner/haprab2.jpg" class="card-img-top rounded-circle mx-auto mt-3" alt="Anggota 5" style="width: 150px; height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Rizqi Satya Haprabu</h5>
                            <h5 class="card-title">K3522072</h5>
                            <p class="card-text">Back-End Developer</p>
                            <p><i class="fas fa-envelope me-2"></i>andi@travelkuy.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>