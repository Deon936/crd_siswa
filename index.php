<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Data Siswa</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome CDN for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: login.php');
        exit;
    }
    ?>

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
        <div class="table-container">
            <table>
                <tr>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php
                include "koneksi.php";

                $query = "SELECT * FROM datasiswa";
                $sql = mysqli_query($connect, $query);

                if (mysqli_num_rows($sql) > 0) {
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<tr>";
                        $imagePath = "images/" . $data['foto'];
                        if (file_exists($imagePath) && !empty($data['foto'])) {
                            echo "<td><img src='" . $imagePath . "' alt='Foto'></td>";
                        } else {
                            echo "<td><img src='images/default.jpg' alt='Default'></td>";
                        }
                        echo "<td>" . $data['nis'] . "</td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td>" . $data['jenis_kelamin'] . "</td>";
                        echo "<td>" . $data['telp'] . "</td>";
                        echo "<td>" . $data['alamat'] . "</td>";
                        echo "<td class='actions'>
                                <a href='form_ubah.php?nis=" . urlencode($data['nis']) . "'>Ubah</a>
                                <a href='proses_hapus.php?nis=" . urlencode($data['nis']) . "'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
