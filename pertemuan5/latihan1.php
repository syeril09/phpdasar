<?php
$hari = array("Senin", "Selasa", "Rabu");

$bulan = ["januari", "Februari", "Maret",];
$arrl = [123, "tulisan", false];

var_dump($hari);
echo "<br>";
print_r($bulan);

echo $arrl[0];
echo "<br>";
echo $bulan[1];

var_dump($hari);
$hari[] = "Kamis";
echo "<br>";
var_dump($hari);



?>