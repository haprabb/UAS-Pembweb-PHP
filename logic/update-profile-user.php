<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['update-image'])) {
    $uploadDir = '../images/user/';
    $uploadFile = $uploadDir . basename($_FILES['update-image']['name']);

    // Validasi dan upload file
    if (move_uploaded_file($_FILES['update-image']['tmp_name'], $uploadFile)) {
        echo "File berhasil diunggah.";
        // Simpan nama file ke database jika perlu
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }
}
