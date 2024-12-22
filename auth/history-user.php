<?php
include "../query-db/users.php";
include "../config/connection.php";

$userID = $_COOKIE["logusid"];
$gambarUser  = getImageUser (getConnection(), $userID)[0]['image'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>TravelKuy - Explore The World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/historyUser .css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f1f1f1;
            padding: 60px 20px; /* Padding untuk menghindari navbar */
            color: #333;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            padding: 15px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: 0.5s;
        }

        .navbar-brand {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #6366f1, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }

        .navbar-nav .nav-link {
            padding: 8px 20px;
            margin: 0 5px;
            font-weight: 500;
            color: #374151;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #3b82f6;
        }

        .history-container {
            max-width: 900px;
            margin: 80px auto; /* Margin atas untuk menghindari navbar */
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        .history-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s ease;
        }

        .history-item:last-child {
            border-bottom: none;
        }

        .history-item:hover {
            background-color: #f7f7f7;
        }

        .history-details h3 {
            font-size: 1.4em;
            margin: 0;
            color: #2f00ff;
        }

        .history-details p {
            font-size: 1em;
            color: #666;
            margin: 8px 0;
        }

        .history-details p strong {
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #00ffbb;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9em;
            color: #777;
        }

        footer a {
            text-decoration: none;
            color: #4c8baf;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                TravelKuy<span class="text-primary">.</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>

                    <!-- Login/Profile Section -->
                    <?php if (!isset($_COOKIE['logus135'])): ?>
                        <li class="nav-item ms-3">
                            <a href="../auth/login.php" class="btn btn-primary login-btn rounded-pill">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle user-profile d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../images/user/<?= $gambarUser  ?>" alt="User  Profile" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <span class="d-none d-lg-inline fw-medium"><?php echo $_COOKIE['logusname']; ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end slideIn" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="../auth/profile.php">
                                        <i class="fas fa-user me-2 text-primary"></i>Profil Saya
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../auth/settings.php">
                                        <i class="fas fa-cog me-2 text-primary"></i>Pengaturan
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="../logic/logout.php">
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

    <!-- Riwayat Pemesanan -->
    <div class="history-container">
        <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'uas_pemweb');

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query untuk mendapatkan data
        $sql = "SELECT * FROM history WHERE user_id = '$userID' ORDER BY departure_time DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Looping data
            while ($row = $result->fetch_assoc()) {
                echo "<div class='history-item'>";
                echo "<div class='history-details'>";
                echo "<h3>" . htmlspecialchars($row['from_location']) . " ke " . htmlspecialchars($row['to_location']) . "</h3>";
                echo "<p><strong>Kode Pemesanan:</strong> " . htmlspecialchars($row['booking_code']) . "</p>";
                echo "<p><strong>Waktu Keberangkatan:</strong> " . date("d M Y, H:i", strtotime($row['departure_time'])) . "</p>";
                echo "<p><strong>Status:</strong> " . ucfirst(htmlspecialchars($row['status'])) . "</p>";
                echo "<a href='#' class='btn'>Lihat Detail</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-center'>Tidak ada riwayat pemesanan.</p>";
        }

        $conn->close();
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Travel Destinasi. Semua hak dilindungi. <a href="#">Kebijakan Privasi</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mengubah navbar saat scroll
        window.onscroll = function() {
            const navbar = document.querySelector('.navbar');
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };
    </script>
</body>

</html>