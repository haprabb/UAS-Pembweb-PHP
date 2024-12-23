<?php

include "../query-db/users.php";
include "../config/connection.php";

$gambarUpload = $_FILES["update-image"];
$userID = $_POST["user-id"];
$userName = $_POST["user-name"];

$formatGambarUpload = explode(".", $gambarUpload["name"]);
$formatGambarUploadAkhir = end($formatGambarUpload);
$namaFileUpload = $formatGambarUpload[0];

$gambarUpload['name'] = "$userID-$userName.$formatGambarUploadAkhir";

if ($gambarUpload['error'] == 0) {
    if ($gambarUpload['size'] > 10_000_000) {
        echo <<<SCRIPT
        <script>
        alert('Ukuran Foto terlalu besar');
        document.location.href = "../auth/profile.php";
        </script>
        SCRIPT;
    } else {
        // Tentukan direktori tujuan
        $targetDir = __DIR__ . "/../images/user/";

        // Tentukan path lengkap untuk file yang akan disimpan
        $targetFile = $targetDir . $gambarUpload['name'];

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($gambarUpload["tmp_name"], $targetFile)) {
            $cekUbahImageUserDB = updateImage(getConnection(), $userID, $gambarUpload['name']);
            echo <<<SCRIPT
        <script>
        alert('Foto Profile berhasil diubah!');
        document.location.href = "../auth/profile.php";
        </script>
        SCRIPT;
        } else {
            echo <<<SCRIPT
        <script>
        alert('Gagal mengunggah file!');
        document.location.href = "../auth/profile.php";
        </script>
        SCRIPT;
        }
    }
} else {
    echo <<<SCRIPT
        <script>
        alert('Gambar belum dipilih!');
        document.location.href = "../auth/profile.php";
        </script>
        SCRIPT;
}
