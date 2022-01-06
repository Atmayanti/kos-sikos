<div class="container d-flex">
	<div class="col-5" style="margin-right: 60px;">
		<h3>Tambah Data Kamar</h3>
		<br>
		<form action="proses/kamar-create-proses.php" method="post" class="form" enctype="multipart/form-data">
			<div class="input-field">
				<label for="id_anggota">ID Kamar</label>
				<input class="form-control" type="text" placeholder="Masukkan ID Kamar" name="idkamar" required>
			</div>
			<div class="input-field">
				<label for="nama">Lantai</label>
				<input class="form-control" type="number" placeholder="Masukkan nomor lantai" name="lantaikamar" required>
			</div> 
			<div class="input-field">
				<label for="nama">Harga</label>
				<input class="form-control" type="number" placeholder="Harga Kamar" name="hargakamar" required>
			</div>
			<div class="input-field">
				<label for="alamat">Fasilitas</label>
				<textarea class="form-control" placeholder="Masukkan fasilitas kamar" name="fasilitaskamar"></textarea>
			</div>
			<div class="input-field">
				<label for="foto">Upload Foto Kamar</label>
				<input class="form-control" type="file" name="fotokamar" style="padding: 3px;">
			</div>
			<br>
			<input type="submit" name="simpan" value="Simpan" class="btn btn-success" style="width: 100%;">
		</form>
	</div>
	<div class="gambar">
		<br>
		<img src="images/bedroom.jpg" alt="gambar manusia" class="gambars" width="110%" height="100%">
	</div>
</div>