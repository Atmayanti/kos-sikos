<?php
include "../koneksi.php";

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">
	<br><br>
	<h3>Data Kamar</h3>
	<br>
	<div id="content">
		<table id="tabel-tampil" class="table table-bordered table-striped table-hover">
			<tr>
				<th id="label-tampil-no" class="bg-success text-white">No</th>
				<th class="bg-success text-white">ID Kamar</th>
				<th class="bg-success text-white">Foto</th>
				<th class="bg-success text-white">Lantai</th>
				<th class="bg-success text-white">Harga</th>
				<th class="bg-success text-white">Fasilitas</th>
			</tr>

			<?php
			$nomor = 1;
			$query = "SELECT * FROM kamar ORDER BY idkamar DESC";
			$q_tampil_kamar = mysqli_query($db, $query);
			if (mysqli_num_rows($q_tampil_kamar) > 0) {
				while ($r_tampil_kamar = mysqli_fetch_array($q_tampil_kamar)) {
					if (empty($r_tampil_kamar['fotokamar']) or ($r_tampil_kamar['fotokamar'] == '-'))
						$foto = "kos1.jpg";
					else
						$foto = $r_tampil_kamar['fotokamar'];
			?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $r_tampil_kamar['idkamar']; ?></td>
						<td><img src="../images/<?php echo $foto; ?>" width=70px height=70px></td>
						<td><?php echo $r_tampil_kamar['lantaikamar']; ?></td>
						<td>Rp.<?php echo $r_tampil_kamar['hargakamar']; ?>;-</td>
						<td><?php echo $r_tampil_kamar['fasilitaskamar']; ?></td>
					</tr>
			<?php $nomor++;
				}
			} ?>
		</table>
	</div>
	<script>
		window.print();
	</script>
</div>