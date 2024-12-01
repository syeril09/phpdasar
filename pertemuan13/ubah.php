<?php
require 'functions.php';

// Ambil data di URL (menggunakan sanitasi untuk menghindari SQL Injection)
$id = htmlspecialchars($_GET["id"]);

// Ambil data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// Proses perubahan data
if( isset($_POST["submit"]) ) {
    if( ubah($_POST) > 0 ) {
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data"> <!-- Perbaiki enctyp menjadi enctype -->
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>"> <!-- Menyertakan ID -->
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>"> <!-- Menyertakan nama gambar lama -->
        
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label> <br>
                <img src="img/<?= $mhs['gambar']; ?>" width="40"> <br> <!-- Menampilkan gambar lama -->
                <input type="file" name="gambar" id="gambar"> <!-- Input untuk mengunggah gambar baru -->
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>
