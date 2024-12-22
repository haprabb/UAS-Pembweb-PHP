<?php

function getHistoryUser($connection, $id){
    $con = $connection;
    $query = "SELECT COUNT(*) as total_pemesanan FROM history where user_id='$id'";
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


function getHistoryPesananUser($connection,$id){
    $con = $connection;
    $query = "SELECT * FROM history ORDER BY departure_time DESC";
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll(PDO::FETCH_ASSOC);
    
    if ($result->num_rows > 0) {
        $historyItems = "";
        while ($row = $result->fetch_assoc()) {
            $historyItems .= "<div class='history-item'>";
            $historyItems .= "<div class='history-details'>";
            $historyItems .= "<h3>" . htmlspecialchars($row['from_location']) . " ke " . htmlspecialchars($row['to_location']) . "</h3>";
            $historyItems .= "<p><strong>Kode Pemesanan:</strong> " . htmlspecialchars($row['booking_code']) . "</p>";
            $historyItems .= "<p><strong>Waktu Keberangkatan:</strong> " . date("d M Y, H:i", strtotime($row['departure_time'])) . "</p>";
            $historyItems .= "<p><strong>Status:</strong> " . ucfirst(htmlspecialchars($row['status'])) . "</p>";
            $historyItems .= "<a href='#' class='btn'>Lihat Detail</a>";
            $historyItems .= "</div>";
            $historyItems .= "</div>";
        }
        return $historyItems;
    } else {
        return "<p>Tidak ada riwayat pemesanan.</p>";
    }

}

?>