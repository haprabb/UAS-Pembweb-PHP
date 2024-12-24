<?php
include "../config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $ticketId = $_POST['ticket_id'];
    $rating = floatval($_POST['rating']);
    $comment = trim($_POST['comment']);

    // Validasi rating
    if ($rating < 1 || $rating > 5) {
        echo "<script>alert('Rating harus antara 1 dan 5.'); window.history.back();</script>";
        exit();
    }

    try {
        $pdo = getConnection();
        $query = "INSERT INTO reviews (user_id, ticket_id, rating, comment) VALUES (:user_id, :ticket_id, :rating, :comment)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'ticket_id' => $ticketId,
            'rating' => $rating,
            'comment' => $comment
        ]);

        // Redirect ke halaman detail history setelah ulasan berhasil ditambahkan
        header("Location: ../pages/detail-history.php");
        exit();
    } catch (PDOException $e) {
        echo "<script>alert('Gagal menyimpan ulasan: {$e->getMessage()}'); window.history.back();</script>";
        exit();
    }
}
