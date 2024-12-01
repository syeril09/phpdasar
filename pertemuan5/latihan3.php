<?php
$siswa = [
["syeril kirania adela putri","08753340", "Rekayasa Perangkat Lunak","adelasyeril@gmail.com"],
["Abiyasa rafif alfarezi", "08757289","desain komunikasi visual", "abiyasa@gmail.com"],
["zahra latifa","087542734","Teknik komputer dan jaringan", "latifa@gmail.com"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar siswa</title>
</head>
<body>
    <h1>Daftar siswa</h1>

    <?php foreach ($siswa as $s): ?>
        <ul>
            <li>Nama : <?= $s[0]; ?></li>
            <li>NIS : <?= $s[1]; ?></li>
            <li>Jurusan : <?= $s[2]; ?></li>
            <li>Email : <?= $s[3]; ?></li>
        </ul>
    <?php endforeach; ?>

</body>
</html>