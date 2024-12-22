<?php
include "../config/connection.php";

try {
    $conn = getConnection();
    $searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

    // Query to fetch data
    $stmt = $conn->prepare("SELECT id, name FROM destinations WHERE name LIKE :searchTerm ORDER BY name ASC");
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
