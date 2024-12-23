<?php
// api.php

// Koneksi database
include('db.php');

// Menangani pencarian tiket berdasarkan dari dan tujuan
if (isset($_GET['from']) && isset($_GET['to'])) {
    $from = $_GET['from'];
    $to = $_GET['to'];

    $query = "SELECT * FROM tickets WHERE departure = ? AND destination = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();

    $tickets = [];
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }

    echo json_encode($tickets);
}

// Menangani pembelian tiket dan memasukkan data ke tabel purchases
if (isset($_POST['ticket_id']) && isset($_POST['user_name'])) {
    $ticket_id = $_POST['ticket_id'];
    $user_name = $_POST['user_name'];
    $purchase_date = date('Y-m-d H:i:s'); // Menambahkan tanggal dan waktu pembelian

    // Menambahkan pembelian ke tabel purchases
    $query = "INSERT INTO purchases (ticket_id, user_name, quantity, purchase_date) VALUES (?, ?, 1, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $ticket_id, $user_name, $purchase_date);
    $stmt->execute();

    // Update kursi yang tersedia setelah pembelian
    $update_query = "UPDATE tickets SET seat_available = seat_available - 1 WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("i", $ticket_id);
    $update_stmt->execute();

    // Melakukan pengecekan apakah data berhasil dimasukkan ke tabel purchases dan kursi diperbarui
    if ($stmt->affected_rows > 0 && $update_stmt->affected_rows > 0) {
        echo json_encode([
            "status" => "success", 
            "message" => "Ticket purchased successfully!"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Error in purchasing ticket."
        ]);
    }
}
?>
