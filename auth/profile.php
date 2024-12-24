<?php


include "../query-db/history.php";
include "../query-db/reviews.php";
include "../query-db/users.php";
include "../config/connection.php";

// Cek login user
if (!isset($_COOKIE['logus135']) && $_COOKIE["logusrole"] != "admin") {
    header("Location: ../auth/login.php");
    exit();
}

// Ambil data user dari cookie
$userName = $_COOKIE['logusname'];
$userEmail = $_COOKIE['logusemail']; // Pastikan email disimpan dalam cookie saat login
$userID = $_COOKIE["logusid"];

$dataHistoryUser = getJumlahHistoryUser(getConnection(), $userID);

$dataRatingUser = getRatingUser(getConnection(), $userID);
$gambarUser = getImageUser(getConnection(), $userID)[0]['image'];
$duaHistoryUser = getHistoryUser2Row(getConnection(), $userID);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TravelKuy - Explore The World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style1.css">
    <link rel="stylesheet" href="../styles/navbar.css">
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
            background: rgba(0, 0, 0, 0.5);
            padding: 5px;
            color: white;
            font-size: 12px;
            cursor: pointer;
        }

        .profile-name {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
            color: black;
        }

        .profile-email {
            font-size: 16px;
            opacity: 0.9;
            color: black;
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            margin: 0 auto 20px;
            overflow: hidden;
            position: relative;
            background: #f0f0f0;
            cursor: pointer;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .profile-avatar:hover img {
            opacity: 0.7;
        }

        .edit-avatar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .profile-avatar:hover .edit-avatar {
            opacity: 1;
        }

        f.profile-avatar {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }

        .profile-avatar .edit-avatar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 14px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        .profile-avatar:hover .edit-avatar {
            opacity: 1;
        }

        #panel {
            display: none;
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
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../destinasi.php">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="../logic/logout.php" onclick="return confirm(`Yakin ingin logout?`)"><button class="btn btn-danger px-4 py-2 rounded-pill" id="logoutButton">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar">
                <img src="../images/user/<?= $gambarUser ?>" alt="Profile Picture" id="profileImage" class="rounded-circle border" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <h1 class="profile-name"><?= htmlspecialchars($userName) ?></h1>

        </div>

        <div class="profile-stats">
            <div class="stat-card">
                <div class="stat-number">
                    <?= $dataHistoryUser[0]['total_pemesanan'] ?>
                </div>
                <div class="stat-label">Total Perjalanan</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $dataRatingUser[1] ?></div>
                <div class="stat-label">Rating</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $dataRatingUser[0] ?></div>
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
                <?php if (count($duaHistoryUser) == 0) { ?>
                <?php } else { ?>
                    <div class="booking-history">
                        <div class="booking-card">
                            <div class="booking-header">
                                <strong><?= $duaHistoryUser[0]['from_location'] ?> → <?= $duaHistoryUser[0]['to_location'] ?></strong>
                                <span class="booking-status status-paid"><?= $duaHistoryUser[0]['status']?></span>
                            </div>
                            <div class="booking-date"><?= date('D-M-Y', strtotime($duaHistoryUser[0]['departure_time'])) ?></div>
                        </div>
                    </div>
                <?php } ?>

                <h3 class="mt-4">Semua Riwayat Pembelian</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ticket ID</th>
                                <th>Nama Pengguna</th>
                                <th>Tanggal Pembelian</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pdo = getConnection();
                            $query = "SELECT * FROM purchases";
                            $stmt = $pdo->query($query);
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['ticket_id'] . "</td>";
                                echo "<td>" . $row['user_name'] . "</td>";
                                echo "<td>" . date('d-m-Y', strtotime($row['purchase_date'])) . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td><a href='print.php?id=" . $row['id'] . "' class='btn btn-outline-light border border-secondary text-dark btn-sm'>Lihat History</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container text-center mt-5">
                <!-- Tombol Update -->
                <button type="button" class="btn btn-outline-light border border-secondary text-dark me-3" id="flip">
                    Update Foto
                </button>
            </div>
            <div id="panel">
                <!-- Form untuk upload gambar -->
                <form action="../logic/update-profile-user.php" method="post" enctype="multipart/form-data" id="updateAvatarForm" class="text-center mt-4">
                    <div class="mb-3">
                        <input type="hidden" name="user-id" value="<?= $_COOKIE["logusid"] ?>">
                        <input type="hidden" name="user-name" value="<?= $_COOKIE["logusname"] ?>">
                        <label for="avatarInput" class="form-label">Pilih Gambar Baru</label>
                        <input type="file" id="avatarInput" class="form-control" accept="image/*" name="update-image">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Gambar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#panel").slideToggle("slow");
            });
        });
    </script>

</body>

</html>