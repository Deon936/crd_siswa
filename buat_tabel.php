<?php
$dbname = 'tabel_siswa'; // Nama database yang sudah dibuat
$host = 'localhost';
$password = '';
$username = 'root'; // Username
$cnn = mysqli_connect($host, $username, $password, $dbname);

// Membuat Koneksi
if (!$cnn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat Tabel
$sql = "CREATE TABLE data_siswa (
    nim CHAR(10) NOT NULL,
    nama VARCHAR(25) DEFAULT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') DEFAULT NULL,
    alamat VARCHAR(50) DEFAULT NULL,
    telp VARCHAR(15) DEFAULT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    CONSTRAINT pk_datasiswa PRIMARY KEY (nim)
)";
if (mysqli_query($cnn, $sql)) {
    echo "Tabel berhasil dibuat";
} else {
    echo "Tabel gagal dibuat: " . mysqli_error($cnn);
}

mysqli_close($cnn);
?>

