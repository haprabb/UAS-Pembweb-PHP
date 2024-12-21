<?php

include "../config/connection.php";



if (isset($_POST["login-form"])) {
    $con = getConnection();
    $query = "select * from users where";
    $result = $con->query($query);
    $result = $result->fetchAll();

    var_dump($result);
}
