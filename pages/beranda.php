<div id="content" class="d-flex">
	<div class="col-5" style="margin-right: 50px;">
		<p><span id="tanggalwaktu"></span></p>
		<script>
			var tw = new Date();
			if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
			else(a = tw.getTime());
			tw.setTime(a);
			var tahun = tw.getFullYear();
			var hari = tw.getDay();
			var bulan = tw.getMonth();
			var tanggal = tw.getDate();
			var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
			var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
			document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun + " | " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10) ? "0" : "") + tw.getMinutes() + (" WIB ");
		</script>
		<br><br><br><br>
		<h1>SELAMAT DATANG</h1>
		<h2>Bagaimana Cuanmu Hari Ini?</h2><br>
		<h5>MeKos hadir sebagai mitra bisnis kamu dalam mengelola kos.
			Kamu cukup registrasi dan kami akan membantumu bertemu dengan cuan,
			eh maksudnya pelanggan. Salam sehat MeKos.
		</h5>
	</div>
	<div><br><img src="images/person.jpg" alt="gambar" width="100%" height="100%"></div>
</div>