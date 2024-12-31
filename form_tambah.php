<html>
<link rel="stylesheet" href="css/form.css">
<head>
<body>
    <h1 style="text-align: center;">Tambah Data Siswa</h1>
    <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                    <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                </td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telp" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" required></textarea></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" accept="image/*" required></td>
            </tr>
        </table>
        <hr>
        <div style="text-align: center;">
            <input type="submit" value="Simpan">
            <a href="index.php">Batal</a>
        </div>
    </form>
</body>
</html>
