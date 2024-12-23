<?php
require_once(__DIR__ . '/../ticketing_system/db.php');

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data pembelian dan tiket terkait
$query = "SELECT p.*, t.name as ticket_name, t.departure, t.destination, t.price 
          FROM purchases p
          JOIN tickets t ON p.ticket_id = t.id 
          WHERE p.id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .ticket-container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .ticket-details {
            margin-bottom: 30px;
        }
        .print-btn {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <h2>Detail Pembelian Tiket</h2>
            <p class="text-muted">ID Pembelian: <?= $data['id'] ?></p>
        </div>

        <div class="ticket-details">
            <div class="row mb-3">
                <div class="col-md-4"><strong>Nama Penumpang:</strong></div>
                <div class="col-md-8"><?= htmlspecialchars($data['user_name']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Nama Tiket:</strong></div>
                <div class="col-md-8"><?= htmlspecialchars($data['ticket_name']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Keberangkatan:</strong></div>
                <div class="col-md-8"><?= htmlspecialchars($data['departure']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Tujuan:</strong></div>
                <div class="col-md-8"><?= htmlspecialchars($data['destination']) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Harga:</strong></div>
                <div class="col-md-8">Rp <?= number_format($data['price'], 0, ',', '.') ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Tanggal Pembelian:</strong></div>
                <div class="col-md-8"><?= date('d-m-Y H:i:s', strtotime($data['purchase_date'])) ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4"><strong>Jumlah Tiket:</strong></div>
                <div class="col-md-8"><?= $data['quantity'] ?></div>
            </div>
        </div>

        <div class="print-btn">
            <button onclick="window.print()" class="btn btn-primary">Cetak Tiket</button>
            <a href="profile.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

