<?php

include "../config/connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

if (isset($_POST["button-login"])) {

    $con = getConnection();
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $con->query($query);
    $result = $result->fetchAll();
    if (count($result) < 1) {
        $con = null;
        echo <<<SCRIPT
        <script>
            alert('Akun tersebut belum terdaftar!');
            document.location.href = "../auth/login.php";
        </script>
        SCRIPT;
        exit();
    } else {
        if (password_verify($password, $result[0]['password'])) {
            $con = null;
            setcookie("logus135", $result[0]['password'], time() + (60 * 60 * 24), "/");
            echo <<<SCRIPT
        <script>
            alert('Berhasil Login!');
            document.location.href = "../index.php";
        </script>
        SCRIPT;
            exit();
        } else {
            $con = null;
            echo <<<SCRIPT
                <script>
                    alert('Gagal login! Username atau Password salah');
                    document.location.href = "../auth/login.php";
                </script>
            SCRIPT;
            exit();
        }
    }
}
