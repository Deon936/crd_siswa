<?php
// Load file koneksi.php
include "koneksi.php";

// Get 'nis' from URL parameter
$nis = $_GET['nis'];

// Fetch data from the database for the given 'nis'
$query = "SELECT * FROM datasiswa WHERE nis = '$nis'";
$sql = mysqli_query($connect, $query);
$data = mysqli_fetch_array($sql);

// Check if data exists
if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<html>
     <!-- Link to external CSS file -->
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/form2.css">

<!-- Font Awesome CDN for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<head>
    <title>Ubah Data Siswa</title>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <h1>Data Siswa</h1>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="images/logo.png" alt="Logo" class="logo">
        <a href="index.php"><i class="fas fa-home"></i> Rumah</a>
        <a href="form_simpan.php"><i class="fas fa-user-plus"></i> Tambah Data</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1></h1>
        
        <form method="post" action="proses_ubah.php" enctype="multipart/form-data">
            <!-- Include 'nis' and 'nim' as hidden input fields -->
            <input type="hidden" name="nis" value="<?php echo $nis; ?>">
            <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($data['jenis_kelamin'] == "Laki-laki") ? "checked" : ""; ?>> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($data['jenis_kelamin'] == "Perempuan") ? "checked" : ""; ?>> Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><textarea name="alamat" required><?php echo $data['alamat']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>
                        <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                        <input type="file" name="foto" accept="image/*"><br>
                        <img src="images/<?php echo $data['foto']; ?>" width="100">
                    </td>
                </tr>
            </table>
            <hr>
            <div style="text-align: center;">
                <input type="submit" value="Ubah">
                <a href="index.php">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
