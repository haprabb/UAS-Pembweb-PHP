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
function getAllUsers($conn) {
    $stmt = $conn->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUsersById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function updateUsers($conn, $id, $data) {
    if (!isset($data['nama_pengunjung']) || !isset($data['email_pengunjung']) || 
        !isset($data['role_pengunjung']) || !isset($data['gambar_pengunjung'])) {
        return false;
    }

    $sql = "UPDATE users SET name = ?, email = ?, role = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        $data['nama_pengunjung'],
        $data['email_pengunjung'],
        $data['role_pengunjung'], 
        $data['gambar_pengunjung'],
        $id
    ]);
}

function deleteUsers($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    return $stmt->execute([$id]);
}

$conn = getPDOConnection();
$users = [];

// Handle CRUD operations


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $users = getUsersById($conn, $_GET['id']);
    if ($users) {
        echo json_encode($users);
        exit;
    }
}

if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
    $id = $_GET['id'];
    if (updateUsers($conn, $id, $_POST)) {
        header("Location: ../admin/adminUser.php");
        exit;
    }
}

if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
    $id = $_GET['id'];
    if (deleteUsers($conn, $id)) {
        header("Location: ../admin/adminUser.php");
        exit;
    }
}

if ($conn) {
    $users = getAllUsers($conn);
}
?>