<?php
include "../config/connection.php";

// Fungsi untuk mendapatkan koneksi PDO
function getPDOConnection() {
    try {
        $conn = getConnection();
        return $conn;
    } catch(PDOException $e) {
        echo "Koneksi database gagal: " . $e->getMessage();
        return null;
    }
}

// Fungsi CRUD
function getAllTickets($conn) {
    $stmt = $conn->query("SELECT * FROM tickets");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTicketById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM tickets WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function createTicket($conn, $data) {
    if (!isset($data['ticket_name']) || !isset($data['departure']) || 
        !isset($data['destination']) || !isset($data['price'])) {
        return false;
    }
    
    $sql = "INSERT INTO tickets (name, departure, destination, price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        $data['ticket_name'],
        $data['departure'], 
        $data['destination'],
        $data['price']
    ]);
}

function updateTicket($conn, $id, $data) {
    if (!isset($data['ticket_name']) || !isset($data['departure']) || 
        !isset($data['destination']) || !isset($data['price'])) {
        return false;
    }

    $sql = "UPDATE tickets SET name = ?, departure = ?, destination = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        $data['ticket_name'],
        $data['departure'],
        $data['destination'], 
        $data['price'],
        $id
    ]);
}

function deleteTicket($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM tickets WHERE id = ?");
    return $stmt->execute([$id]);
}

$conn = getPDOConnection();
$tickets = [];

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ticket_name'])) {
        if (createTicket($conn, $_POST)) {
            header("Location: ../admin/admin.php");
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $ticket = getTicketById($conn, $_GET['id']);
    if ($ticket) {
        echo json_encode($ticket);
        exit;
    }
}

if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
    $id = $_GET['id'];
    if (updateTicket($conn, $id, $_POST)) {
        header("Location: ../admin/admin.php");
        exit;
    }
}

if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
    $id = $_GET['id'];
    if (deleteTicket($conn, $id)) {
        header("Location: ../admin/admin.php");
        exit;
    }
}

if ($conn) {
    $tickets = getAllTickets($conn);
}
?>