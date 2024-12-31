<?php
include "koneksi.php";

// Validasi NIS dari URL
if (isset($_GET['nis'])) {
    $nis = mysqli_real_escape_string($connect, $_GET['nis']);

    // Ambil data dari database untuk mengecek keberadaan data
    $query = "SELECT * FROM datasiswa WHERE nis='$nis'";
    $sql = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($sql);

    // Jika data ditemukan
    if ($data) {
        // Cek apakah file foto ada dan hapus jika ada
        if (!empty($data['foto']) && is_file("images/" . $data['foto'])) {
            unlink("images/" . $data['foto']);
        }

        // Hapus data dari database
        $query2 = "DELETE FROM datasiswa WHERE nis='$nis'";
        $sql2 = mysqli_query($connect, $query2);

        // Redirect jika berhasil
        if ($sql2) {
            header("Location: index.php?status=sukses");
            exit;
        } else {
            echo "Data gagal dihapus: " . mysqli_error($connect);
        }
    } else {
        echo "Data tidak ditemukan!";
    }
} else {
    echo "NIS tidak valid!";
}
?>
