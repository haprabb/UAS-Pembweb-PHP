<?php

function getJadwalFrom($connection){
    $con = $connection;
    $query = "SELECT departure FROM tickets";
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll(PDO::FETCH_ASSOC);
}
function getJadwalTo($connection){
    $con = $connection;
    $query = "SELECT destination FROM tickets";
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll(PDO::FETCH_ASSOC);
}



?>