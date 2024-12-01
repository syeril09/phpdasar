<?php
function salam($waktu, $nama){
    return "Selamat $waktu, $nama!";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan Function</title>
</head>
<body>
    <h1><?= salam("pagi", "syeril"); ?></h1>
</body>
</html>