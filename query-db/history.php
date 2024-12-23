<?php

function getJumlahHistoryUser($connection, $id){
    $con = $connection;
    $query = "SELECT COUNT(*) as total_pemesanan FROM history where user_id='$id'";
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


function getHistoryPesananUser($connection,$id){
    $con = $connection;
    $query = "SELECT booking_code, from_location, to_location, departure_time, status 
                  FROM history WHERE user_id = '$id' ORDER BY departure_time DESC";
    $result = $con->query($query);
    $con = null;
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

function getHistoryUser2Row($connection,$id){
        $con = $connection;
        $query = "SELECT * FROM history ORDER BY departure_time DESC LIMIT 2";
        $result = $con->query($query);
        $con = null;
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}


?>