<?php
require_once '../config/database.php';

header('Content-Type: application/json');

$type = $_POST['type'] ?? '';
$date = $_POST['date'] ?? '';

$query = "SELECT * FROM tickets WHERE 1=1";
$params = [];

if ($type) {
    $query .= " AND type = ?";
    $params[] = $type;
}

if ($date) {
    $query .= " AND DATE(departure_time) = ?";
    $params[] = $date;
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tickets);