<?php
$conn = mysqli_connect('localhost', 'root', 'db_siswa'); // Sertakan password jika ada
if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal: " . mysqli_connect_error();
    exit();
}
$sql = "CREATE DATABASE tabel_siswa";
if (mysqli_query($conn, $sql)) {
    echo "Database berhasil dibuat";
} else {
    echo "Gagal membuat database: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
