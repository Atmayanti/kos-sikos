<?php
include '../koneksi.php';
$id_kamar=$_POST['idkamar'];
$lantai=$_POST['lantaikamar'];
$harga=$_POST['hargakamar'];
$fasilitas=$_POST['fasilitaskamar'];
$status="Tidak Ditempati";
	
if(isset($_POST['simpan'])){
		extract($_POST);
		$nama_file   = $_FILES['fotokamar']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['fotokamar']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_kamar.".".$tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto="-";
	
	$sql = 
	"INSERT INTO kamar
		VALUES('$id_kamar','$lantai','$harga','$fasilitas','$status','$file_foto')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=kamar");
}
?>