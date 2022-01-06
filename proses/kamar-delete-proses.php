<?php
include'../koneksi.php';
$id_kamar=$_GET['idkamar'];

mysqli_query($db,
	"DELETE FROM kamar
	WHERE idkamar='$id_kamar'"
);

header("location:../index.php?p=kamar");
?>