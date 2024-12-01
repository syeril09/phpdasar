<?php
usleep(500000);
require '../functions.php';

$keyword = $_GET["keyword"];


$query = "SELECT * FROM mahasiswa
WHERE
nama LIKE '%$keyword%' OR
nrp LIKE '%$keyword%' OR
email LIKE '%$keyword%' OR
jurusan LIKE '%$keyword%'";

$mahasiswa = query($query);

?>
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
