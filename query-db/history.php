<?php

function getHistoryUser($connection, $id){
    $con = $connection;
    $query = "SELECT COUNT(*) as total_pemesanan FROM history where user_id='$id'";
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


?>