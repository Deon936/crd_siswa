<?php
// Include the database connection file
include "koneksi.php";

// Capture the data sent via POST from the form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Generate a new name for the image with the current timestamp to avoid name conflicts
$fotobaru = date('dmYHis') . $foto;
$path = "images/" . $fotobaru;

// Try to upload the file
if (move_uploaded_file($tmp, $path)) {
    // Prepare the query to insert the student data
    $query = "INSERT INTO datasiswa (nis, nama, jenis_kelamin, telp, alamat, foto) 
              VALUES ('$nis', '$nama', '$jenis_kelamin', '$telp', '$alamat', '$fotobaru')";
    
    // Execute the query
    $sql = mysqli_query($connect, $query);
    
    if ($sql) {
        // If the data was successfully inserted, redirect to the main page
        header("Location: index.php");
    } else {
        // If there was an error, display an error message
        echo "Error: Failed to save the data. Please try again.";
    }
} else {
    // If the file upload fails, display an error message
    echo "Error: The image file could not be uploaded. Please try again.";
}
?>
