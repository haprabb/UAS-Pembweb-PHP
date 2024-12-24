<?php
include '../config/connection.php';

$action = $_GET['action'] ?? '';
$conn = getConnection();

if ($action === 'getCities') {
    $query = "SELECT DISTINCT departure FROM tickets UNION SELECT DISTINCT destination FROM tickets";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $cities = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($cities);
} elseif ($action === 'searchTickets') {
    $departure = $_GET['departure'];
    $destination = $_GET['destination'];
    $query = "SELECT * FROM tickets WHERE departure = :departure AND destination = :destination";
    $stmt = $conn->prepare($query);
    $stmt->execute(['departure' => $departure, 'destination' => $destination]);
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tickets);
} elseif ($action === 'getAllTickets') {
    $query = "SELECT * FROM tickets";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tickets);
}elseif ($action === 'buyTicket') {
    $ticketId = $_POST['ticket_id'];
    $buyerName = $_POST['buyer_name'];
    $quantity = $_POST['quantity'];
    $userId = $_COOKIE['logusid']; // Assuming user ID is stored in cookies

    // Generate booking code
    $bookingCode = strtoupper(substr(md5(uniqid()), 0, 10));

    // Fetch ticket details
    $query = "SELECT * FROM tickets WHERE id = :ticket_id";
    $stmt = $conn->prepare($query);
    $stmt->execute(['ticket_id' => $ticketId]);
    $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($ticket) {
        // Insert into history
        $query = "INSERT INTO history (user_id, ticket_id, booking_code, from_location, to_location, departure_time, status, quantity) VALUES (:user_id, :ticket_id, :booking_code, :from_location, :to_location, NOW(), 'confirmed', :quantity)";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'ticket_id' => $ticketId,
            'booking_code' => $bookingCode,
            'from_location' => $ticket['departure'],
            'to_location' => $ticket['destination'],
            'quantity' => $quantity
        ]);

        $query = "INSERT INTO purchases (user_id, ticket_id, purchases_date, quantity, user_name) VALUES (:user_id, :ticket_id, NOW(), :quantity)";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'ticket_id' => $ticketId,
            'quantity' => $quantity,
            'user_name' => $buyerName
        ]);

        echo json_encode(['message' => 'Tiket berhasil dibeli!']);
    } else {
        echo json_encode(['message' => 'Tiket tidak ditemukan!']);
    }
}

$conn = null;
?>
