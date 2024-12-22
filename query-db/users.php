<?php

function updateImage($connection, $id, $namaImage)
{
    $con = $connection;

    $query = "UPDATE users set image='$namaImage' WHERE id='$id'";
    $respon =  $con->exec($query);
    $con = null;
    return $respon;
}

function getImageUser($connection, $id)
{
    $con = $connection;
    $query = "SELECT image FROM users WHERE id='$id'";
    $respon =  $con->query($query);
    $con = null;
    $respon =  $respon->fetchAll(PDO::FETCH_ASSOC);
    return $respon;
}
