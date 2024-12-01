<!DOCTYPE html>
<html>
<head>
    <title>POST</title>
</head>
<body>
<?php if( isset($_POST["submit"])  ) : ?>
    <h1>Hallo, Selamat datang <?= $_POST["nama"]; ?></h1>
<?php endif; ?>

    <form action="latihan4.php" method="post">
        masukkan nama :
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim!</button>
</form>
</body>
</html>