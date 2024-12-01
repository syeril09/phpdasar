<?php
session_start();

// Cek apakah user sudah login atau belum
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Ambil data mahasiswa
$mahasiswa = query("SELECT * FROM mahasiswa");

// Jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <!-- Form pencarian -->
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id = "keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>

    <br>
    <div id="container">

    <!-- Tabel data mahasiswa -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row): ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= htmlspecialchars($row["id"]); ?>">Ubah</a> |
                        <a href="hapus.php?id=<?= htmlspecialchars($row["id"]); ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                    <td><img src="img/<?= ($row["gambar"]); ?>" width="50" alt="Gambar"></td>
                    <td><?= ($row["nrp"]); ?></td>
                    <td><?= ($row["nama"]); ?></td>
                    <td><?= ($row["email"]); ?></td>
                    <td><?= ($row["jurusan"]); ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <script src="js/script.js"></script>
</body>
</html>


