<?php
include'../koneksi.php';

$id_kamar=$_POST['idkamar'];
$lantai=$_POST['lantaikamar'];
$harga=$_POST['hargakamar'];
$fasilitas=$_POST['fasilitaskamar'];

If(isset($_POST['simpan'])){
	
		extract($_POST);
		$nama_file   = $_FILES['fotokamar']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['fotokamar']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_kamar.".".$tipe_file;
		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		@unlink ("$folder");
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto=$foto_awal;
	
	mysqli_query($db,
		"UPDATE kamar
		SET lantaikamar='$lantai',hargakamar='$harga',fasilitaskamar='$fasilitas',fotokamar='$file_foto'
		WHERE idkamar='$id_kamar'"
	);
	header("location:../index.php?p=kamar");
}
?>
