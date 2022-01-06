<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">
	<br><br>
	<h3>Data Penyewa</h3>
	<hr>
	<div>
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th class="bg-success text-white">No</th>
				<th class="bg-success text-white">ID Penyewa</th>
				<th class="bg-success text-white">Nama</th>
				<th class="bg-success text-white">Foto</th>
				<th class="bg-success text-white">Jenis Kelamin</th>
				<th class="bg-success text-white">Alamat</th>
				<th class="bg-success text-white">Status</th>
			</tr>
			<?php
			$nomor = 1;
			include '../koneksi.php';
			$sql = "SELECT * FROM penyewa";
			$q_tampil_penyewa = mysqli_query($db, $sql);
			if (mysqli_num_rows($q_tampil_penyewa) > 0) {
				while ($r_tampil_penyewa = mysqli_fetch_array($q_tampil_penyewa)) {
					if (($r_tampil_penyewa['fotopenyewa'] == '-') or empty($r_tampil_penyewa['fotopenyewa'])) {
						$foto = 'profile.png';
					} else {
						$foto = $r_tampil_penyewa['fotopenyewa'];
					}
			?>
					<tr>
						<td><?php echo $nomor ?></td>
						<td><?php echo $r_tampil_penyewa['idpenyewa'] ?></td>
						<td><?php echo $r_tampil_penyewa['namapenyewa'] ?></td>
						<td><img src="../images/<?php echo $foto; ?>" width=70px height=70px alt="profil"></td>
						<td><?php echo $r_tampil_penyewa['jeniskelaminpenyewa'] ?></td>
						<td><?php echo $r_tampil_penyewa['alamatpenyewa'] ?></td>
						<td><?php echo $r_tampil_penyewa['statuspenyewa'] ?></td>
					</tr>
			<?php
					$nomor++;
				}
			} else {
				echo "Data tidak ditemukan";
			}
			?>
		</table>
	</div>
	<script>
		window.print();
	</script>
</div>