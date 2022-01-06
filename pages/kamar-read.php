<?php
include "../koneksi.php";
$id_kamar = $_GET['idkamar'];
$q_tampil_kamar = mysqli_query($db, "SELECT * FROM kamar WHERE idkamar='$id_kamar'");
$r_tampil_kamar = mysqli_fetch_array($q_tampil_kamar);
if (empty($r_tampil_kamar['fotokamar']) or ($r_tampil_kamar['fotokamar'] == '-'))
	$foto = "kos1.jpg";
else
	$foto = $r_tampil_kamar['fotokamar'];
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">
	<br><br>
	<div id="label-page">
		<h3>Detil kamar</h3><br>
	</div>
	<div id="content">
		<table id="tabel-input" class="table table-bordered table-striped table-hover">
			<tr>
				<th>Foto Kamar</th>
				<td>
					<img src="../images/<?php echo $foto; ?>" width=70px height=75px>
				</td>
			</tr>
			<tr>
				<th>ID Kamar</th>
				<td><?php echo $r_tampil_kamar['idkamar']; ?></td>
			</tr>
			<tr>
				<th>Lantai</th>
				<td ><?php echo $r_tampil_kamar['lantaikamar']; ?></td>
			</tr>
			<tr>
				<th>Harga</th>
				<td><?php echo $r_tampil_kamar['hargakamar']; ?></td>
			</tr>
			<tr>
				<th>Fasilitas</th>
				<td><?php echo $r_tampil_kamar['fasilitaskamar']; ?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td><?php echo $r_tampil_kamar['statuskamar']; ?></td>
			</tr>
		</table>
	</div>
</div>

