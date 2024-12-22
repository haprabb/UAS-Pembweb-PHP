<?php

function getRatingUser($connection, $id){
    $con = $connection;
    $query = "SELECT rating FROM reviews where user_id='$id'";
    $result = $con->query($query);
    $con = null;
    $results = $result->fetchAll(PDO::FETCH_ASSOC);
    $totalRating = 0;
    $jumlahRating = count($results);
    foreach($results as $result ){
        $totalRating += $result['rating'];
    }

    $rating = $totalRating/$jumlahRating;
    return $rating;
}


?>