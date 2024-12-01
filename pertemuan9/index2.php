<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");



?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar<th>
            <th>NRP</th>
            <th>nama</th>
            <th>email</th>
            <th>jurusan</th>
        </tr>
            <?php $i = 1; ?>
            <?php while( $row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
             </td>
            <td><img src="img/<?php echo $row["gambar"];?>" width="50"></td>
            <td><?= $row ["nrp"]; ?></td>
            <td><?= $row ["nama"]; ?></td>
            <td><?= $row ["email"]; ?></td>
            <td><?= $row ["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?Php endwhile; ?>

    </table>
</body>
</html>
