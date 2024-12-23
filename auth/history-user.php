<?php
include "../query-db/users.php";
include "../query-db/history.php";
include "../config/connection.php";

$userID = $_COOKIE["logusid"];
$gambarUser  = getImageUser(getConnection(), $userID)[0]['image'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>TravelKuy - Explore The World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/historyUser.css">
    
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                Riwayat Perjalanan<span class="text-primary">.</span>
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

    <div class="history-container container py-5">
        <h2 class="text-center mb-4">Riwayat Pemesanan</h2>
        <?php
        // Mendapatkan koneksi dan data riwayat pemesanan dari database
        $historyData = getHistoryPesananUser(getConnection(), $userID); // Asumsi `getHistory` sudah dibuat di `history.php`

        if (!empty($historyData)) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped table-hover align-middle">';
            echo '<thead class="table-success text-center">';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Kode Pemesanan</th>';
            echo '<th>Asal</th>';
            echo '<th>Tujuan</th>';
            echo '<th>Waktu Keberangkatan</th>';
            echo '<th>Status</th>';
            echo '<th>Rating</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $no = 1;
            foreach ($historyData as $history) {
                echo '<tr>';
                echo '<td class="text-center">' . $no++ . '</td>';
                echo '<td>' . htmlspecialchars($history['booking_code']) . '</td>';
                echo '<td>' . htmlspecialchars($history['from_location']) . '</td>';
                echo '<td>' . htmlspecialchars($history['to_location']) . '</td>';
                echo '<td>' . htmlspecialchars($history['departure_time']) . '</td>';
                echo '<td class="text-center">';
                echo '<span class="badge bg-' . (htmlspecialchars($history['status']) == 'confirmed' ? 'success' : 'warning') . '">';
                echo htmlspecialchars(ucfirst($history['status']));
                echo '</span>';
                echo '</td>';
                echo '<td class="text-center">';
                echo '<button class="btn btn-sm btn-success rating-btn" data-id="' . htmlspecialchars($history['booking_code']) . '" data-bs-toggle="modal" data-bs-target="#ratingModal">';
                echo '<i class="fas fa-star"></i> Beri Rating';
                echo '</button>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="text-center text-muted">Tidak ada riwayat pemesanan.</p>';
        }
        ?>
    </div>

    <!-- Modal Rating -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingModalLabel">Beri Penilaian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ratingForm">
                        <input type="hidden" id="bookingCode" name="booking_code" value="">
                        <p class="text-center">Silakan beri penilaian untuk pemesanan ini:</p>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-outline-warning rating-value" data-value="1">1</button>
                            <button type="button" class="btn btn-outline-warning rating-value" data-value="2">2</button>
                            <button type="button" class="btn btn-outline-warning rating-value" data-value="3">3</button>
                            <button type="button" class="btn btn-outline-warning rating-value" data-value="4">4</button>
                            <button type="button" class="btn btn-outline-warning rating-value" data-value="5">5</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="submitRating">Kirim Rating</button>
                </div>
            </div>
        </div>
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