<?php
// Load file koneksi.php
include "koneksi.php";

// Get form data
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$ubah_foto = isset($_POST['ubah_foto']); // Check if photo update is requested

// Check if new photo is uploaded
if ($ubah_foto) {
    // Handle file upload
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    // Rename file and set the path
    $fotobaru = date('dmYHis') . $foto;
    $path = "images/" . $fotobaru;

    if (move_uploaded_file($tmp, $path)) {
        // Update the data including the new photo
        $query = "UPDATE datasiswa SET 
                  nim = '$nim', 
                  nama = '$nama', 
                  jenis_kelamin = '$jenis_kelamin', 
                  telp = '$telp', 
                  alamat = '$alamat', 
                  foto = '$fotobaru' 
                  WHERE nis = '$nis'";
    } else {
        echo "Gagal mengupload foto baru.";
        exit;
    }
} else {
    // If no new photo, update without changing the photo
    $query = "UPDATE datasiswa SET 
              nim = '$nim', 
              nama = '$nama', 
              jenis_kelamin = '$jenis_kelamin', 
              telp = '$telp', 
              alamat = '$alamat' 
              WHERE nis = '$nis'";
}

// Execute the query
$sql = mysqli_query($connect, $query);

if ($sql) {
    // If the update is successful, redirect to the main page
    header("location: index.php");
} else {
    // If the query fails, show an error message
    echo "Maaf, terjadi kesalahan saat mencoba untuk memperbarui data.";
    echo "<br><a href='form_ubah.php?nis=" . urlencode($nis) . "'>Kembali Ke Form</a>";
}
?>
