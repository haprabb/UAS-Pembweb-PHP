<?php

function getRatingUser($connection, $id)
{
    $con = $connection;
    $query = "SELECT rating FROM reviews where user_id='$id' AND rating > 0";
    $result = $con->query($query);
    $con = null;
    $results = $result->fetchAll(PDO::FETCH_ASSOC);
    $totalRating = 0;
    $jumlahRating = count($results);
    foreach ($results as $result) {
        $totalRating += $result['rating'];
    }

    if ($jumlahRating == 0) {
        $rating = 0;
    } else {
        $rating = $totalRating / $jumlahRating;
    }
    return [$jumlahRating, $rating];
}
