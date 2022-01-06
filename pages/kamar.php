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
<div id="label-page">
	<h3>Tampil Data Kamar</h3>
</div>
<br>
<div class="d-flex">
	<!--tombol tambah-->
	<span class="col-8">
		<a href="index.php?p=kamar-create" class="btn btn-success text-white">Tambah Kamar</a>
	</span>
	<span class="col-11">
		<!-- Search Bar -->
		<form method="post" class="form-inline">
			<input class="form-control mr-sm-2 col-3" type="text" placeholder="Masukkan kata kunci" name="cari">
			<button class="btn btn-success" type="submit" name="search" value="search" style="padding-left: 2%; padding-right: 2%;">Cari</button>
		</form>
	</span>
</div>
<br>
<table class="table table-bordered table-striped table-hover">
	<tr class="bg-success text-white">
		<th>No</th>
		<th>ID Kamar</th>
		<th>Foto</th>
		<th>Lantai</th>
		<th>Harga</th>
		<th>Fasilitas</th>
		<th id="label-opsi">Opsi</th>
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
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$pencarian = trim(mysqli_real_escape_string($db, $_POST['cari']));
		if ($pencarian != "") {
			$sql = "SELECT * FROM kamar WHERE idkamar LIKE '%$pencarian%'
						OR lantaikamar LIKE '%$pencarian%'
						OR hargakamar LIKE '%$pencarian%'
						OR fasilitaskamar LIKE '%$pencarian%'";

			$query = $sql;
			$queryJml = $sql;
		} else {
			$query = "SELECT * FROM kamar LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM kamar";
			$no = $posisi * 1;
		}
	} else {
		$query = "SELECT * FROM kamar LIMIT $posisi, $batas";
		$queryJml = "SELECT * FROM kamar";
		$no = $posisi * 1;
	}

	$q_tampil_kamar = mysqli_query($db, $query);
	if (mysqli_num_rows($q_tampil_kamar) > 0) {
		while ($r_tampil_kamar = mysqli_fetch_array($q_tampil_kamar)) {
			if (empty($r_tampil_kamar['fotokamar']) or ($r_tampil_kamar['fotokamar'] == '-'))
				$foto = "kos1.jpg";
			else
				$foto = $r_tampil_kamar['fotokamar'];

			//IMPLEMENTASI ARRAY
			$array = array(
				"nomor" => $nomor,
				"id" => $r_tampil_kamar['idkamar'],
				"foto" => $foto,
				"lantai" => $r_tampil_kamar['lantaikamar'],
				"harga" => $r_tampil_kamar['hargakamar'],
				"fasilitas" => $r_tampil_kamar['fasilitaskamar']
			); 
			echo "<tr>";
			foreach ($array as $key => $val) {
				if ($key == "foto") {
	?>
					<td><img src="images/<?php echo $foto; ?>" width=50px height=35px></td>
			<?php
				} else if ($key == "harga") {
					echo "<td>Rp." . $val . ";-</td>";
				} else {
					echo "<td>$val</td>";
				}
			}
			?>
			<td>
				<span><a class="crud-btn text-success" style="text-decoration: none;" target="_blank" href="pages/kamar-read.php?idkamar=<?php echo $r_tampil_kamar['idkamar']; ?>">Detail</a></span>
				<span><a class="crud-btn text-success" style="text-decoration: none;" href="index.php?p=kamar-update&idkamar=<?php echo $r_tampil_kamar['idkamar']; ?>">Edit</a></span>
				<span><a class="crud-btn text-success" style="text-decoration: none;" href="proses/kamar-delete-proses.php?idkamar=<?php echo $r_tampil_kamar['idkamar']; ?>" onclick="return confirm ('Apakah Anda yakin akan menghapus data ini?')">Hapus</a></span>
			</td>
			</tr>
	<?php $nomor++;
		}
	} else {
		echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
	} ?>
</table>
<?php
if (isset($_POST['cari'])) {
	if ($_POST['cari'] != '') {
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
} else { ?>
	<div style="float: left;">
		<?php
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Jumlah Data : <b>$jml</b>";
		?>
	</div>
	<div class="pagination" style="float: right;">
		<?php
		$jml_hal = ceil($jml / $batas);
		for ($i = 1; $i <= $jml_hal; $i++) {
			if ($i != $hal) {
				echo "<a href=\"?p=kamar&hal=$i\">$i</a>";
			} else {
				echo "<a class=\"active\">$i</a>";
			}
		}
		?>
		<a target="_blank" href="pages/kamar-read-all.php"><img src="images/printer.png" height="30px"></a>
	</div>
	<br><br>
<?php
}
?>