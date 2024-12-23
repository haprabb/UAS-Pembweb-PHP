<?php
include "../config/connection.php";

try {
    $conn = getConnection();

    // Query data destinasi
    $stmt = $conn->prepare("SELECT id, name, description, image_url, price FROM destinations");
    $stmt->execute();
    $destinations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return JSON response
    echo json_encode($destinations);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
