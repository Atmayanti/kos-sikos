<?php
$id_penyewa = $_GET['idpenyewa'];
$sql = "SELECT * FROM penyewa WHERE idpenyewa = '$id_penyewa'";
$q_tampil_penyewa = mysqli_query($db, $sql);
$r_tampil_penyewa = mysqli_fetch_array($q_tampil_penyewa);
if (($r_tampil_penyewa == '-') or empty($r_tampil_penyewa)) {
	$foto = 'profile.png';
} else {
	$foto = $r_tampil_penyewa['fotopenyewa'];
}
?>
<style>
	.isian-formulir {
		margin-bottom: 10px;
		border: none;
		width: 100%;
		height: 100%;
		padding-left: 10px;
	}

	table,
	h3 {
		margin-left: 12%;
	}

	tr:hover {
		background-color: rgba(17, 247, 17, 0.324);
	}
	
</style>
<div>
	<br><br>
	<h3>Edit Data Penyewa</h3>
	<form action="proses/penyewa-update-proses.php" method="post" enctype="multipart/form-data">
		<table class="table table-bordered col-9" id="tabel-input">
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;FOTO</th>
				<td class="isian-formulir">
					<img src="images/<?php echo $foto; ?>" width=70px height=75px style="margin-bottom: 10px;">
					<input class="btn btn-white" type="file" name="fotopenyewa" class="isian-formulir isian-formulir-border">
					<input type="hidden" name="foto_awal" value="<?php echo $r_tampil_penyewa['fotopenyewa']; ?>">
				</td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;ID penyewa</th>
				<td class="isian-formulir"><input type="text" name="idpenyewa" value="<?php echo $r_tampil_penyewa['idpenyewa']; ?>" readonly="readonly" class="isian-formulir"></td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;Nama</th>
				<td class="isian-formulir"><input type="text" name="namapenyewa" value="<?php echo $r_tampil_penyewa['namapenyewa']; ?>" class="isian-formulir"></td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;Jenis Kelamin</th>
				<td class="isian-formulir"><input type="text" name="jenis_kelamin" value="<?php echo $r_tampil_penyewa['jeniskelaminpenyewa']; ?>" class="isian-formulir"></td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;Alamat</th>
				<th class="isian-formulir"><textarea rows="2" cols="40" name="alamat" class="isian-formulir"><?php echo $r_tampil_penyewa['alamatpenyewa']; ?></textarea></th>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;Status</th>
				<th class="isian-formulir"><textarea rows="2" cols="40" name="status" class="isian-formulir"><?php echo $r_tampil_penyewa['statuspenyewa']; ?></textarea></th>
			</tr>
		</table>
		<p class="text-center"><input class="text-center btn btn-success text-white" type="submit" name="simpan" value="Simpan"></p>
	</form>
</div>