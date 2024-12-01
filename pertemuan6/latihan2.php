<?php
$mahasiswa = [
    [
    "nrp" => "043040023",
    "nama" => "syeril kirania adela putri",
    "email" => "adelasyeril@gmail.com",
    "jurusan" => "rekayasa perangkat lunak",
    "gambar" => "syeril.jpg"
    ]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
<?php foreach( $mahasiswa as $mhs ) : ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>" width="150px">
        <li>nama:<?= $mhs ["nama"] ;?></li>
        <li>NRP:<?= $mhs ["nrp"] ;?></li>
        <li>jurusan:<?= $mhs ["jurusan"] ;?></li>
        <li>email:<?= $mhs ["email"] ;?></li>
    </ul>
<?php endforeach; ?>

</body>
</html>



