<div class="conntainer d-flex">
	<div class="col-5" style="margin-right: 60px;">
		<h3>Tambah Data Penyewa</h3>
		<br>
		<form action="proses/penyewa-create-proses.php" method="post" class="form" enctype="multipart/form-data">
			<div class="input-field">
				<label for="idpenyewa">ID Penyewa</label>
				<input class="form-control mb-2" type="text" name="idpenyewa" placeholder="Masukkan ID Penyewa">
			</div>
			<div class="input-field">
				<label for="namapenyewa">Nama Penyewa</label>
				<input class="form-control mb-2" type="text" name="namapenyewa" placeholder="Masukkan Nama Penyewa">
			</div>
			<div class="input-field">
				<label for="jenis_kelamin">Jenis Kelamin</label><br>
				<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki</input><br>
				<input type="radio" name="jenis_kelamin" value="Perempuan" class="mb-2">Perempuan</input>
			</div>
			<div class="input-field">
				<label for="alamat">Alamat</label>
				<textarea name="alamat" class="form-control mb-2" placeholder="Masukkan Alamat Lengkap"></textarea>
			</div>
			<div class="input-field">
				<label for="foto">Upload Foto</label>
				<input class="form-control p-1 mb-2" type="file" name="foto">
			</div>
			<div class="mt-2">
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success mt-3" style="width: 100%;">
			</div>
		</form>
	</div>
	<div class="gambar">
		<br>
		<img src="images/people.jpg" alt="gambar orang" class="gambars" width="110%" height="90%">
	</div>
</div>