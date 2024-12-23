<?php
include "config/connection.php";
include "query-db/users.php";

$userID = $_COOKIE["logusid"];
$gambarUser  = getImageUser (getConnection(), $userID)[0]['image'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Destinasi - TravelKuy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/destinasi.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa; /* Light background for better contrast */
        }

        .navbar {
            background-color: #ffffff; /* White background for navbar */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .section-title h2 {
            font-weight: 600;
            color: #333; /* Darker color for headings */
        }

        .destination-card {
            border: 1px solid #e0e0e0; /* Light border for cards */
            border-radius: 8px; /* Rounded corners */
            overflow: hidden; /* Prevent overflow */
            transition: transform 0.3s; /* Smooth hover effect */
        }

        .destination-card:hover {
            transform: scale(1.05); /* Scale effect on hover */
        }

        .destination-img img {
            height: 200px; /* Fixed height for images */
            object-fit: cover; /* Cover to maintain aspect ratio */
        }

        .destination-info {
            padding: 15px; /* Padding for content */
            background-color: #ffffff; /* White background for content */
        }

        .price {
            font-weight: bold;
            color: #007bff; /* Primary color for price */
        }

        .footer {
            background-color: #343a40; /* Dark footer */
            color: #ffffff; /* White text in footer */
        }

        .footer a {
            color: #ffffff; /* White links in footer */
        }

        .footer a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
                TravelKuy<span class="text-primary">.</span>
            </a>

            <!-- Search Bar -->
            <form class="d-flex ms-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>

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
                        <a class="nav-link" href="destinasi.php">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Tentang</a>
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
                            <img src="images/user/<?= $gambarUser  ?>" alt="User  Profile" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
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

    <!-- Destinations Section -->
    <section class="destinations py-5" id="destinations">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>Destinasi Wisata</h2>
                <p>Temukan tempat-tempat menakjubkan untuk liburan Anda</p>
            </div>

            <div class="row">
                <!-- Destination Cards -->
                <?php
                // Sample data for destinations
                $destinations = [
                    [
                        "name" => "Bali",
                        "description" => "Nikmati keindahan pantai dan budaya yang memukau di Pulau Dewata.",
                        "price" => "Mulai Rp 5.000.000",
                        "image" => "https://images.unsplash.com/photo-1537996194471-e657df975ab4"
                    ],
                    [
                        "name" => "Raja Ampat",
                        "description" => "Jelajahi surga bawah laut dengan keindahan terumbu karang.",
                        "price" => "Mulai Rp 8.000.000",
                        "image" => "https://images.unsplash.com/photo-1570789210967-2cac24afeb00"
                    ],
                    [
                        "name" => "Labuan Bajo",
                        "description" => "Temui komodo dan nikmati pemandangan laut yang memukau.",
                        "price" => "Mulai Rp 6.500.000",
                        "image" => "https://images.unsplash.com/photo-1518548419970-58e3b4079ab2"
                    ],
                    [
                        "name" => "Yogyakarta",
                        "description" => "Kunjungi Candi Borobudur dan nikmati budaya lokal yang kaya.",
                        "price" => "Mulai Rp 3.000.000",
                        "image" => "https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0"
                    ],
                    [
                        "name" => "Jakarta",
                        "description" => "Jelajahi ibu kota Indonesia dengan berbagai atraksi modern.",
                        "price" => "Mulai Rp 2.500.000",
                        "image" => "https://images.unsplash.com/photo-1518709268800-1c1c1c1c1c1c"
                    ],
                    [
                        "name" => "Lombok",
                        "description" => "Nikmati keindahan pantai dan gunung di Pulau Lombok.",
                        "price" => "Mulai Rp 4.000.000",
                        "image" => "https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0"
                    ],
                    [
                        "name" => "Sumba",
                        "description" => "Temukan keindahan alam dan budaya unik di Pulau Sumba.",
                        "price" => "Mulai Rp 7.000.000",
                        "image" => "https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0"
                    ],
                    [
                        "name" => "Bromo",
                        "description" => "Saksikan keindahan matahari terbit di Gunung Bromo.",
                        "price" => "Mulai Rp 3.500.000",
                        "image" => "https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0"
                    ],
                    [
                        "name" => "Flores",
                        "description" => "Jelajahi keindahan alam dan budaya di Pulau Flores.",
                        "price" => "Mulai Rp 5.500.000",
                        "image" => "https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0"
                    ],
                    [
                        "name" => "Tanjung Puting",
                        "description" => "Saksikan orangutan di habitat aslinya di Tanjung Puting.",
                        "price" => "Mulai Rp 6.000.000",
                        "image" => "https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0"
                    ],
                ];

                foreach ($destinations as $destination) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '    <div class="destination-card">';
                    echo '        <div class="destination-img">';
                    echo '            <img src="' . $destination["image"] . '" alt="' . $destination["name"] . '" class="img-fluid">';
                    echo '        </div>';
                    echo '        <div class="destination-info text-center">';
                    echo '            <h3>' . $destination["name"] . '</h3>';
                    echo '            <p>' . $destination["description"] . '</p>';
                    echo '            <span class="price">' . $destination["price"] . '</span>';
                    echo '            <a href="ticketing_system/index.php" class="btn btn-primary">Pesan Sekarang</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h4>TravelKuy<span class="text-primary">.</span></h4>
                    <p>Jelajahi dunia bersama kami dengan pengalaman tak terlupakan</p>
                    <div class="social-links">
                        <a href="#" class="me-2"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <h4>Kontak</h4>
                    <p>Email: info@travelkuy.com</p>
                    <p>Phone: +62 123 456 789</p>
                    <p>Alamat: Jl. Travel No. 123, Jakarta</p>
                </div>

                <div class="col-md-4 mb-3">
                    <h4>Link Cepat</h4>
                    <p><a href="#" class="text-white">Tentang Kami</a></p>
                    <p><a href="#" class="text-white">Syarat & Ketentuan</a></p>
                    <p><a href="#" class="text-white">Kebijakan Privasi</a></p>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center py-2">
            <p class="text-white">&copy; 2024 TravelKuy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>