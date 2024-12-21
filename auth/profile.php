<?php
// Cek login user
if (!isset($_COOKIE['logus135'])) {
    header("Location: auth/login.php");
    exit();
}

// Ambil data user dari cookie
$userName = $_COOKIE['logusname'];
$userEmail = $_COOKIE['logusemail']; // Pastikan email disimpan dalam cookie saat login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?= $userName ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <style>
        .profile-container {
            max-width: 1000px;
            margin: 100px auto;
            padding: 20px;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            margin: 0 auto 20px;
            overflow: hidden;
            position: relative;
            background: #f0f0f0;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-avatar .edit-avatar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.5);
            padding: 5px;
            color: white;
            font-size: 12px;
            cursor: pointer;
        }

        .profile-name {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .profile-email {
            font-size: 16px;
            opacity: 0.9;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .stat-number {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        .profile-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .profile-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary-color);
        }

        .info-group {
            margin-bottom: 20px;
        }

        .info-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 16px;
            color: #333;
        }

        .edit-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .edit-btn:hover {
            background: var(--secondary-color);
        }

        .booking-history {
            margin-top: 20px;
        }

        .booking-card {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .booking-date {
            color: #666;
            font-size: 14px;
        }

        .booking-status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-paid {
            background: #dcfce7;
            color: #166534;
        }

        .status-pending {
            background: #fef9c3;
            color: #854d0e;
        }

        @media (max-width: 768px) {
            .profile-stats {
                grid-template-columns: 1fr;
            }
            
            .profile-container {
                padding: 10px;
            }
            
            .profile-header {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar">
                <img src="assets/images/default-avatar.png" alt="Profile Picture">
                <div class="edit-avatar">
                    <i class="fas fa-camera"></i> Ubah Foto
                </div>
            </div>
            <h1 class="profile-name"><?= htmlspecialchars($userName) ?></h1>
            <p class="profile-email"><?= htmlspecialchars($userEmail) ?></p>
        </div>

        <div class="profile-stats">
            <div class="stat-card">
                <div class="stat-number">12</div>
                <div class="stat-label">Total Perjalanan</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">4.8</div>
                <div class="stat-label">Rating</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">5</div>
                <div class="stat-label">Review</div>
            </div>
        </div>

        <div class="profile-content">
            <div class="profile-section">
                <h2 class="section-title">
                    <i class="fas fa-user"></i>
                    Informasi Pribadi
                </h2>
                <div class="info-group">
                    <div class="info-label">Nama Lengkap</div>
                    <div class="info-value"><?= htmlspecialchars($userName) ?></div>
                </div>
                <div class="info-group">
                    <div class="info-label">Email</div>
                    <div class="info-value"><?= htmlspecialchars($userEmail) ?></div>
                </div>
                <button class="edit-btn">
                    <i class="fas fa-edit"></i> Edit Profil
                </button>
            </div>

            <div class="profile-section">
                <h2 class="section-title">
                    <i class="fas fa-ticket-alt"></i>
                    Riwayat Pemesanan
                </h2>
                <div class="booking-history">
                    <div class="booking-card">
                        <div class="booking-header">
                            <strong>Jakarta → Bali</strong>
                            <span class="booking-status status-paid">Dibayar</span>
                        </div>
                        <div class="booking-date">20 Mar 2024</div>
                    </div>
                    <div class="booking-card">
                        <div class="booking-header">
                            <strong>Bandung → Yogyakarta</strong>
                            <span class="booking-status status-pending">Menunggu Pembayaran</span>
                        </div>
                        <div class="booking-date">25 Mar 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle avatar change
        document.querySelector('.edit-avatar').addEventListener('click', function() {
            // Implement avatar change functionality
            alert('Fitur ubah foto profil akan segera hadir!');
        });

        // Handle profile edit
        document.querySelector('.edit-btn').addEventListener('click', function() {
            // Implement profile edit functionality
            alert('Fitur edit profil akan segera hadir!');
        });
    </script>
</body>
</html>