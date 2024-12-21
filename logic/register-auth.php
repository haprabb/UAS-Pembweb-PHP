<?php

include "../config/connection.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

if (isset($_POST["button-register"])) {

    $con = getConnection();
    $query = "SELECT email FROM users WHERE email='$email'";
    $result = $con->query($query);
    $result = $result->fetchAll();
    if (count($result) > 0) {
        $con = null;
        echo <<<SCRIPT
        <script>
            alert('Akun tersebut sudah ada!');
            document.location.href = "../auth/register.php";
        </script>
        SCRIPT;
        exit();
    }else{

        $password = password_hash($password, PASSWORD_DEFAULT);

        $insert = "INSERT INTO users(name, email, password, role) VALUES('$name', '$email', '$password', 'user')";

        $con->exec($insert);
        $con = null;
        echo <<<SCRIPT
        <script>
            alert('Berhasil mendaftar!');
            document.location.href = "../auth/login.php";
        </script>
        SCRIPT;
        exit();
    }
}
