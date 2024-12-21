<?php
// session_start();
// require_once 'config/connection.php';

// // Cek login
// if (!isset($_SESSION['user_id'])) {
//     header('Location: auth/login.php');
//     exit();
// }

// // Ambil data tiket
// $stmt = $pdo->query("SELECT * FROM tickets ORDER BY departure_time");
// $tickets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>TravelKuy - Explore The World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style1.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">TravelKuy</div>
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#destinations">Destinasi</a>
            <a href="#features">Fitur</a>
            <a href="#about">Tentang</a>
            <a href="auth/login.php" class="book-btn">Login</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Jelajahi Keindahan Dunia</h1>
            <p>Temukan pengalaman perjalanan tak terlupakan bersama kami</p>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Mau kemana?">
                <input type="date" class="search-input">
                <button class="search-btn">Cari Sekarang</button>
            </div>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section class="destinations" id="destinations">
        <div class="section-title">
            <h2>Destinasi Populer</h2>
            <p>Temukan tempat-tempat menakjubkan untuk liburan Anda</p>
        </div>

        <div class="destination-grid">
            <!-- Destination Cards -->
            <!-- Card 1 -->
            <div class="destination-card">
                <div class="destination-img">
                    <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4" alt="Bali">
                </div>
                <div class="destination-info">
                    <h3>Bali</h3>
                    <p>Nikmati keindahan pantai dan budaya yang memukau di Pulau Dewata</p>
                    <span class="price">Mulai Rp 5.000.000</span>
                    <a href="#" class="book-btn">Pesan Sekarang</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="destination-card">
                <div class="destination-img">
                    <img src="https://images.unsplash.com/photo-1570789210967-2cac24afeb00" alt="Raja Ampat">
                </div>
                <div class="destination-info">
                    <h3>Raja Ampat</h3>
                    <p>Jelajahi surga bawah laut dengan keindahan terumbu karang</p>
                    <span class="price">Mulai Rp 8.000.000</span>
                    <a href="#" class="book-btn">Pesan Sekarang</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="destination-card">
                <div class="destination-img">
                    <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2" alt="Labuan Bajo">
                </div>
                <div class="destination-info">
                    <h3>Labuan Bajo</h3>
                    <p>Temui komodo dan nikmati pemandangan laut yang memukau</p>
                    <span class="price">Mulai Rp 6.500.000</span>
                    <a href="#" class="book-btn">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="section-title">
            <h2>Mengapa Memilih Kami?</h2>
            <p>Keunggulan layanan kami untuk perjalanan Anda</p>
        </div>

        <div class="features-grid">
            <div class="feature-item">
                <i class="fas fa-globe feature-icon"></i>
                <h3>Destinasi Terbaik</h3>
                <p>Pilihan destinasi wisata terbaik dengan pengalaman tak terlupakan</p>
            </div>

            <div class="feature-item">
                <i class="fas fa-dollar-sign feature-icon"></i>
                <h3>Harga Terjangkau</h3>
                <p>Dapatkan harga terbaik untuk setiap perjalanan Anda</p>
            </div>

            <div class="feature-item">
                <i class="fas fa-headset feature-icon"></i>
                <h3>Dukungan 24/7</h3>
                <p>Tim support kami siap membantu Anda kapan saja</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>TravelKuy</h4>
                <p>Jelajahi dunia bersama kami dengan pengalaman tak terlupakan</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Kontak</h4>
                <p>Email: info@travelkuy.com</p>
                <p>Phone: +62 123 456 789</p>
                <p>Alamat: Jl. Travel No. 123, Jakarta</p>
            </div>

            <div class="footer-section">
                <h4>Link Cepat</h4>
                <p><a href="#">Tentang Kami</a></p>
                <p><a href="#">Syarat & Ketentuan</a></p>
                <p><a href="#">Kebijakan Privasi</a></p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 TravelKuy. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>