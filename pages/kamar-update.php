 <?php
$id_kamar = $_GET['idkamar'];
$q_tampil_kamar = mysqli_query($db, "SELECT * FROM kamar WHERE idkamar='$id_kamar'");
$r_tampil_kamar = mysqli_fetch_array($q_tampil_kamar);
if (empty($r_tampil_kamar['fotokamar']) or ($r_tampil_kamar['fotokamar'] == '-'))
	$foto = "kos1.jpg";
else
	$foto = $r_tampil_kamar['fotokamar'];
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
<div id="label-page">
	<br> 
	<h3>Edit Data Kamar</h3><br>
</div>
<div id="content">
	<form action="proses/kamar-update-proses.php" method="post" enctype="multipart/form-data">
		<table class="table table-bordered col-9" id="tabel-input">
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;FOTO</th>
				<td class="isian-formulir">
					<img src="images/<?php echo $foto; ?>" width=70px height=75px style="margin-bottom: 10px;">
					<input class="btn btn-white" type="file" name="fotokamar" class="isian-formulir isian-formulir-border">
					<input type="hidden" name="foto_awal" value="<?php echo $r_tampil_kamar['fotokamar']; ?>">
				</td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;ID Kamar</th>
				<td class="isian-formulir"><input type="text" name="idkamar" value="<?php echo $r_tampil_kamar['idkamar']; ?>" readonly="readonly" class="isian-formulir"></td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;Lantai</th>
				<td class="isian-formulir"><input type="number" name="lantaikamar" value="<?php echo $r_tampil_kamar['lantaikamar']; ?>" class="isian-formulir"></td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;Harga</th>
				<td class="isian-formulir"><input type="number" name="hargakamar" value="<?php echo $r_tampil_kamar['hargakamar']; ?>" class="isian-formulir"></td>
			</tr>
			<tr>
				<th class="col-4 label-formulir">&nbsp;&nbsp;Fasilitas</th>
				<th class="isian-formulir"><textarea rows="2" cols="40" name="fasilitaskamar" class="isian-formulir"><?php echo $r_tampil_kamar['fasilitaskamar']; ?></textarea></th>
			</tr>
		</table>
		<p class="text-center"><input class="text-center btn btn-success text-white" type="submit" name="simpan" value="Simpan"></p>
	</form>
	<br>
</div>