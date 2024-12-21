<?php
session_start();
require_once 'config/connection.php';

// Cek login
if (!isset($_SESSION['user_id'])) {
    header('Location: auth/login.php');
    exit();
}

// Ambil data tiket
$stmt = $pdo->query("SELECT * FROM tickets ORDER BY departure_time");
$tickets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>TravelKuy - Explore The World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255,255,255,0.95);
            padding: 15px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            transition: 0.5s;
        }

        .navbar.scrolled {
            padding: 10px 8%;
            background: rgba(255,255,255,0.98);
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(45deg, #2980b9, #16a085);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            margin-left: 35px;
            font-weight: 500;
            transition: 0.3s;
            position: relative;
        }

        .nav-links a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #2980b9;
            left: 0;
            bottom: -5px;
            transition: 0.3s;
        }

        .nav-links a:hover:after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                            url('https://images.unsplash.com/photo-1502920917128-1aa500764cbd');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 4.5em;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .hero-content p {
            font-size: 1.3em;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease 0.3s forwards;
            opacity: 0;
        }

        .search-box {
            background: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 15px;
            display: flex;
            gap: 15px;
            margin-top: 30px;
            animation: fadeInUp 1s ease 0.6s forwards;
            opacity: 0;
        }

        .search-input {
            flex: 1;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .search-btn {
            padding: 15px 30px;
            background: linear-gradient(45deg, #2980b9, #16a085);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Popular Destinations */
        .destinations {
            padding: 100px 8%;
            background: #f9f9f9;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.8em;
            color: #333;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background: linear-gradient(45deg, #2980b9, #16a085);
            left: 25%;
            bottom: -10px;
        }

        .destination-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 35px;
        }

        .destination-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: 0.4s;
            position: relative;
        }

        .destination-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .destination-img {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .destination-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
        }

        .destination-card:hover .destination-img img {
            transform: scale(1.1);
        }

        .destination-info {
            padding: 25px;
        }

        .destination-info h3 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 15px;
        }

        .destination-info p {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .price {
            color: #2980b9;
            font-size: 1.3em;
            font-weight: 600;
            display: block;
            margin-bottom: 15px;
        }

        .book-btn {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(45deg, #2980b9, #16a085);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: 0.3s;
        }

        .book-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Features Section */
        .features {
            padding: 100px 8%;
            background: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .feature-item {
            padding: 30px;
        }

        .feature-icon {
            font-size: 3em;
            color: #2980b9;
            margin-bottom: 20px;
        }

        .feature-item h3 {
            margin-bottom: 15px;
            color: #333;
        }

        .feature-item p {
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #222;
            color: white;
            padding: 70px 8% 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-section h4 {
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        .footer-section p {
            line-height: 1.6;
            color: #bbb;
        }

        .social-links a {
            color: white;
            margin-right: 15px;
            font-size: 20px;
            transition: 0.3s;
        }

        .social-links a:hover {
            color: #2980b9;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #444;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 4%;
            }

            .hero-content h1 {
                font-size: 2.5em;
            }

            .search-box {
                flex-direction: column;
            }

            .destinations, .features {
                padding: 60px 4%;
            }
        }
    </style>
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