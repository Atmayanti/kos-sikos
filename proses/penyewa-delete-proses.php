<?php
include '../koneksi.php';
$id_penyewa = $_GET['idpenyewa'];
mysqli_query($db, 
"DELETE FROM penyewa WHERE idpenyewa = '$id_penyewa'"
);

header("location: ../index.php?p=penyewa");
?>