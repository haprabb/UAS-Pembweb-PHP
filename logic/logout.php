<?php

setcookie("logusname", "", time() - 1, "/");
setcookie("logus135", "", time() - 1, "/");

echo <<<SCRIPT
    <script>
        alert('Berhasil logout!');
        document.location.href = "../index.php";
    </script>
SCRIPT;
