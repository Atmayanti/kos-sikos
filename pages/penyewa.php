<style>
	.crud-btn {
		padding: 4px;
		background-color: rgba(2, 177, 2, 0.1);
		border-radius: 4px;
	}

	.crud-btn:hover {
		background-color: rgba(1, 100, 1, 0.2);
	}
</style>
<div class="label-page">
	<h3>Tampil Data Penyewa</h3>
</div>
<br>
<div class="d-flex">
	<span class="col-8">
		<a class="btn btn-success text-white" href="index.php?p=penyewa-create">Tambah Penyewa</a>
	</span>
	<span class="col-11">
		<form method="post" class="form-inline">
			<input type="text" class="form-control col-3 ml-2" name="cari" placeholder="Masukkan kata kunci">
			<button type="submit" class="btn btn-success ml-1" name="search" style="padding-left: 2%; padding-right: 2%;">Cari</button>
		</form>
	</span>
</div>
<br>
<table class="table table-bordered table-striped table-hover">
	<tr class="bg-success text-white">
		<th>No</th>
		<th>ID Penyewa</th>
		<th>Nama Penyewa</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Foto</th>
		<th>Opsi</th>
	</tr>
	<?php
	$batas = 5;
	extract($_GET);
	if (empty($hal)) {
		$posisi = 0;
		$hal = 1;
		$nomor = 1;
	} else {
		$posisi = ($hal - 1) * $batas;
		$nomor = $posisi + 1;
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$pencarian = trim(mysqli_real_escape_string($db, $_POST['cari']));
		if ($pencarian != "") {
			$sql = "SELECT * FROM penyewa WHERE idpenyewa LIKE '%$pencarian%'
					OR namapenyewa LIKE '%$pencarian%'
					OR jeniskelaminpenyewa LIKE '%$pencarian%'
					OR alamatpenyewa LIKE '%$pencarian%'";
			$query = $sql;
			$queryJml = $sql;
		} else {
			$query = "SELECT * FROM penyewa LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM penyewa";
			$no = $posisi * 1;
		}
		//escape
	} else {
		$query = "SELECT * FROM penyewa LIMIT $posisi, $batas"; //menampilkan dengan batas
		$queryJml = "SELECT * FROM penyewa"; //menampilkan all
		$no = $posisi * 1;
	}

	$q_tampil_penyewa = mysqli_query($db, $query);
	if (mysqli_num_rows($q_tampil_penyewa) > 0) {
		while ($r_tampil_penyewa = mysqli_fetch_array($q_tampil_penyewa)) {
			//tampilan
			if ($r_tampil_penyewa['fotopenyewa'] == '-' or empty($r_tampil_penyewa) or $r_tampil_penyewa['fotopenyewa'] == NULL) {
				$foto = 'profile.png';
			} else {
				$foto = $r_tampil_penyewa['fotopenyewa'];
			}

	?>
			<tr>
				<td><?php echo $nomor ?></td>
				<td><?php echo $r_tampil_penyewa['idpenyewa'] ?></td>
				<td><?php echo $r_tampil_penyewa['namapenyewa'] ?></td>
				<td><?php echo $r_tampil_penyewa['jeniskelaminpenyewa'] ?></td>
				<td><?php echo $r_tampil_penyewa['alamatpenyewa'] ?></td>
				<td><img src="images/<?php echo $foto ?>" width="50px" height="35px" alt="profil"></td>
				<td>
					<span><a class="crud-btn text-success" style="text-decoration: none;" href="index.php?p=penyewa-read&idpenyewa=<?php echo $r_tampil_penyewa['idpenyewa']?>">Detail</a></span>
					<span><a class="crud-btn text-success" style="text-decoration: none;" href="index.php?p=penyewa-update&idpenyewa=<?php echo $r_tampil_penyewa['idpenyewa']?>">Edit</a></span>
					<span><a class="crud-btn text-success" style="text-decoration: none;" href="proses/penyewa-delete-proses.php?idpenyewa=<?php echo $r_tampil_penyewa['idpenyewa']?>" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">Hapus</a></span>
				</td>
			</tr>
	<?php $nomor++;
		}
	} else {
		echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
	}
	?>
</table>
<?php
	if (isset($_POST['cari'])) {
		if ($_POST['cari'] != '') {
			echo "<div style:'float:left'>";
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Data Hasil Pencarian: <b>".$jml."</b>";
			echo "</div>";
		}
	} else {
		echo "<div style:'float:left'>";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Jumlah Data: <b>".$jml."</b>";
		echo "</div>";
		?>
		<div class="pagination" style="float: right;">
			<?php
				$jml_hal = ceil($jml / $batas);
				for ($i=1; $i <= $jml_hal ; $i++) { 
					if ($i != $hal) {
						echo "<a href='?p=penyewa&hal=$i'>$i</a>";
					} else {
						echo "<a class='active'>$i</a>";
					}
					
				}
			?>
			<a target="_blank" href="pages/penyewa-read-all.php"><img src="images/printer.png" height="30px"></a>
		</div>
		<br><br>
		<?php
	}
?>