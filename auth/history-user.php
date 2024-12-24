<?php
include "../config/connection.php";
include "../query-db/users.php";

// Cek login user
if (!isset($_COOKIE['logus135']) && $_COOKIE["logusrole"] != "admin") {
    header("Location: ../auth/login.php");
    exit();
}

$userID = $_COOKIE["logusid"];
$pdo = getConnection();

// Query untuk mendapatkan riwayat pemesanan
$query = "SELECT h.*, 
                 (SELECT COUNT(*) 
                  FROM reviews 
                  WHERE reviews.user_id = h.user_id AND reviews.ticket_id = h.ticket_id) AS has_review 
          FROM history h 
          WHERE h.user_id = :user_id 
          ORDER BY h.departure_time DESC";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userID]);
$historyData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil gambar pengguna
$gambarUser = getImageUser(getConnection(), $userID);

if(count($gambarUser) > 0){
    $gambarUser = getImageUser(getConnection(), $userID)[0]['image'];
}else{
    $gambarUser = "default-photo.jpg";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/style1.css">6666666666666666666666666666666666666666\

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
                        <a class="nav-link" href="../ticketing_system/index.php">Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">Tentang</a>
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
                                <img src="../images/user/<?= $gambarUser ?>" alt="User Profile" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
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
    <div class="container" style="margin-top: 200px;">
        <h1 class="text-center mb-4">Detail History Pemesanan</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Booking Code</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Departure</th>
                    <th>Status</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historyData as $history): ?>
                    <tr>
                        <td><?= $history['id'] ?></td>
                        <td><?= $history['booking_code'] ?></td>
                        <td><?= $history['from_location'] ?></td>
                        <td><?= $history['to_location'] ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($history['departure_time'])) ?></td>
                        <td>
                            <span class="badge <?= $history['status'] == 'cancelled' ? 'bg-danger' : ($history['status'] == 'confirmed' ? 'bg-success' : 'bg-warning') ?>">
                                <?= ucfirst($history['status']) ?>
                            </span>
                        </td>
                        <td><?= $history['quantity'] ?></td>
                        <td>
                            <?php if ($history['status'] != 'cancelled' && $history['status'] != 'pending'): ?>
                                <?php if ($history['has_review'] == 0): ?>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal" data-id="<?= $history['id'] ?>" data-ticket="<?= $history['ticket_id'] ?>">Ulasan</button>
                                <?php else: ?>
                                    <span class="text-success">Sudah Direview</span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>


        </table>
    </div>

    <!-- Modal untuk Ulasan -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../logic/submit-review.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel">Beri Ulasan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" value="<?= $userID ?>">
                        <input type="hidden" id="ticket_id" name="ticket_id" value="">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" step="0.1" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komentar</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('reviewModal').addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const ticketId = button.getAttribute('data-ticket');
            document.getElementById('ticket_id').value = ticketId;
        });
    </script>
    <script>
        document.getElementById('rating').addEventListener('input', function() {
            const value = parseFloat(this.value);
            if (value > 5) {
                this.value = 5; // Set nilai maksimum menjadi 5
            }
            if (value < 1) {
                this.value = 1; // Set nilai minimum menjadi 1
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>