<?php
include "../config/connection.php";

// Cek login user
if (!isset($_COOKIE['logus135']) && $_COOKIE["logusrole"] != "admin") {
    header("Location: ../auth/login.php");
    exit();
}

$userID = $_COOKIE["logusid"];
$pdo = getConnection();
$query = "SELECT * FROM history WHERE user_id = :user_id ORDER BY departure_time DESC";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userID]);
$historyData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail History Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
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
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal" data-id="<?= $history['id'] ?>" data-ticket="<?= $history['ticket_id'] ?>">Ulasan</button>
                            <?php endif; ?>
                            <?php if ($history['status'] != 'cancelled'): ?>
                                <button class="btn btn-danger btn-sm cancel-btn" data-id="<?= $history['id'] ?>">Batalkan</button>
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
        document.querySelectorAll('.cancel-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                if (confirm('Yakin ingin membatalkan pesanan ini?')) {
                    fetch('../logic/cancel-booking.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                id: id
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Pesanan berhasil dibatalkan.');
                                location.reload();
                            } else {
                                alert('Gagal membatalkan pesanan.');
                            }
                        });
                }
            });
        });

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

</body>

</html>