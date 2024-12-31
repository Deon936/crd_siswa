<html>
     <!-- Link to external CSS file -->
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/form2.css">

<!-- Font Awesome CDN for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<head>
    <title>CRUD Data Siswa</title>
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
    <h1>Tambah Data Siswa</h1>
    <div class="container">
        <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
            <table cellpadding="8">
                <tr class="form-group">
                    <td>NIS</td>
                    <td><input type="text" name="nis" required></td>
                </tr>
                <tr class="form-group">
                    <td>Nama</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr class="form-group">
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                    </td>
                </tr>
                <tr class="form-group">
                    <td>Telepon</td>
                    <td><input type="text" name="telp" required></td>
                </tr>
                <tr class="form-group">
                    <td>Alamat</td>
                    <td><textarea name="alamat" required></textarea></td>
                </tr>
                <tr class="form-group">
                    <td>Foto</td>
                    <td><input type="file" name="foto" accept="image/*" required></td>
                </tr>
            </table>
            <hr>
            <input type="submit" value="Simpan">
            <a href="index.php">Batal</a>
        </form>
    </div>
</body>
</html>
