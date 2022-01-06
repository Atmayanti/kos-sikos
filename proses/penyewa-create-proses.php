<?php
include '../koneksi.php';
$id_penyewa = $_POST['idpenyewa'];
$nama = $_POST['namapenyewa'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$status = $_POST['Tidak Menempati Kamar'];

if (isset($_POST['simpan'])) {
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];
	if (!empty($nama_file)) {
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_penyewa.".".$tipe_file;

		$folder = "../images/$file_foto";
		move_uploaded_file($lokasi_file, "$folder");
	} else {
		$file_foto="-";
	}
	$sql = "INSERT INTO penyewa
			VALUES ('$id_penyewa', '$nama', '$jenis_kelamin', '$alamat', '$status', '$file_foto')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=penyewa");
}
?>