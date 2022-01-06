<?php
include'../koneksi.php';

$id_penyewa=$_POST['idpenyewa'];
$nama=$_POST['namapenyewa'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$status=$_POST['status'];

If(isset($_POST['simpan'])){
	
		extract($_POST);
		$nama_file   = $_FILES['fotopenyewa']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['fotopenyewa']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_penyewa.".".$tipe_file;
		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		@unlink ("$folder");
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto=$foto_awal;
	
	mysqli_query($db,
		"UPDATE penyewa
		SET namapenyewa='$nama',jeniskelaminpenyewa='$jenis_kelamin',alamatpenyewa='$alamat',statuspenyewa = '$status',fotopenyewa='$file_foto'
		WHERE idpenyewa='$id_penyewa'"
	);
	header("location:../index.php?p=penyewa");
}
