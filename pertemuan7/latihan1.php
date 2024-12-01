
<?php
$mahasiswa = [
    [
        "nrp" => "043040023",
        "nama" => "syeril kirania adela putri",
        "email" => "adelasyeril@gmail.com",
        "jurusan" => "rekayasa perangkat lunak",
        "gambar" => "syeril.jpg"
    ],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <li>
            <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>">
                <?= $mhs["nama"]; ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
