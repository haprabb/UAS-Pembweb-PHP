<?php

include "../config/connection.php";

$name = $_POST["nama"];
$email = $_POST["akun"];
$password = $_POST["password"];

if (isset($_POST["submit-register"])) {


    $con = getConnection();
    $query = "SELECT email FROM users WHERE email='$email'";
    $result = $con->query($query);
    $result = $result->fetchAll();
    if (count($result) > 0) {
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
        echo <<<SCRIPT
        <script>
            alert('Berhasil mendaftar!');
            document.location.href = "../auth/login.php";
        </script>
        SCRIPT;
        exit();
    }
}
