<?php
include 'koneksi.php';
$id_penyewa = $_GET['idpenyewa'];
$sql = "SELECT * FROM penyewa WHERE idpenyewa = '$id_penyewa'";
$q_tampil_penyewa = mysqli_query($db, $sql);
$r_tampil_penyewa = mysqli_fetch_array($q_tampil_penyewa);

if (empty($r_tampil_penyewa['fotopenyewa']) or ($r_tampil_penyewa['fotopenyewa'] == '-'))
	$foto = "profile.png";
else
	$foto = $r_tampil_penyewa['fotopenyewa'];
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container" id="content">
	<br>
	<div>
		<h3>Detil Penyewa</h3>
	</div>
	<hr>
	<div>
		<table class="table table-hover table-stiped table-bordered">
			<tr>
				<th>Foto</th>
				<td>
					<img src="images/<?php echo $foto; ?>" width=70px height=75px>
				</td>
			</tr>
			<tr>
				<th>ID Penyewa</th>
				<td><?php echo $r_tampil_penyewa['idpenyewa'] ?></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?php echo $r_tampil_penyewa['namapenyewa'] ?></td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td><?php echo $r_tampil_penyewa['jeniskelaminpenyewa'] ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?php echo $r_tampil_penyewa['alamatpenyewa'] ?></td>
			</tr>
			<tr>
				<th>Status</th>
				<td><?php echo $r_tampil_penyewa['statuspenyewa'] ?></td>
			</tr>
		</table>
	</div>
	<div style=" float:right;">
		<span class="btn btn-success"><a href="index.php?p=penyewa" style="text-decoration: none; color: white;">Kembali</a></span>
	</div>
	<br>
</div>
