<?php
include 'koneksi.php';
session_start();
if (isset($_SESSION['sesi'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>MeKos | Aplikasi Kos Nomor 1</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="images/logo.png">
        <link rel="stylesheet" href="style-index.css">
    </head>

    <body>
        <!--NAVBAR-->
        <nav class="navbar navbar-expand-sm bg-light navbar-light" style="position: sticky;">
            <img src="images/logo.png" alt="logo" style="height: 3%; width: 3%; margin: 1% 1% 1% 3%;">
            <div class="col-7" id="nama-user">
                <h4>Hai <?php echo $_SESSION['sesi'] . "<br>"; ?></h4>
            </div>

            <!-- Links -->
            <ul class="navbar-nav">
                <!-- Dropdown -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=beranda">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notifikasi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Kelola Kos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Pengajuan Sewa</a>
                        <a class="dropdown-item" href="index.php?p=penyewa">Daftar Penyewa</a>
                        <a class="dropdown-item" href="index.php?p=kamar">Daftar Kamar Kos</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Transaksi
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Check In</a>
                        <a class="dropdown-item" href="#">Check Out</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" id="navbardrop" data-toggle="dropdown">
                        <img src="images/profile.png" style="margin-left: 10px; margin-top: 5px; height: 30px;" alt="profil">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Profil</a>
                        <a class="dropdown-item" href="logout.php">Keluar</a>
                    </div>
                </li>
            </ul>
            <hr>
        </nav>
        <br>

        <!--Scan Directory Pages-->
        <section class="container">
            <?php
            $pages_dir = 'pages';
            if (!empty($_GET['p'])) {
                $pages = scandir($pages_dir, 0);
                unset($pages[0], $pages[1]);
                $p = $_GET['p'];
                if (in_array($p . '.php', $pages)) {
                    include($pages_dir . '/' . $p . '.php');
                } else {
                    echo 'Halaman Tidak Ditemukan';
                }
            } else {
                include($pages_dir . '/beranda.php');
            }
            ?>
        </section>

        <footer class="page-footer font-small bg-light">
            <div class="container py-4 text-center text-md-left mt-5">
                <div class="row mt-3">
                    <div class="col-6">
                        <h6 class="text-uppercase font-weight-bold">MeKos</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>MeKos memanfaatkan teknologi untuk berkembang dari aplikasi cari kos menjadi aplikasi yang memudahkan calon anak kos
                            untuk booking properti kos dan juga melakukan pembayaran kos. Saat ini kami memiliki lebih dari 2 juta kamar kos yang
                            tersebar di lebih dari 140 kota di seluruh Indonesia.</p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-uppercase font-weight-bold">Kebijakan</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a href="#" class="kebijakan">Kebijakan Privasi</a>
                        </p>
                        <p>
                            <a href="#" class="kebijakan">Syarat dan Ketentuan Umum</a>
                        </p>
                    </div>
                    <div class="col-3" id="kontak">
                        <h6 class="text-uppercase font-weight-bold">Kontak</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <i class="fa fa-facebook-square"><a href="#" class="kontak">&nbsp; &nbsp; &nbsp;MeKos Atmayanti</a></i>
                        </p>
                        <p>
                            <i class="fa fa-envelope-square"><a href="mailto:me.atmayanti@gmail.com" class="kontak">&nbsp; &nbsp; &nbsp;me.atmayanti@gmail.com</a></i>
                        </p>
                        <p>
                            <i class="fa fa-instagram"><a href="#" class="kontak">&nbsp; &nbsp; &nbsp;MeKos_Atmayanti</a></i>
                        </p>
                        <p>
                            <i class="fa fa-twitter-square"><a href="#" class="kontak">&nbsp; &nbsp; &nbsp;MeKos_Atmayanti</a></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3 bg-secondary text-white">© 2020 Copyright: Atmayanti</div>
        </footer>
    </body>

    </html>
<?php
} else {
    echo "<script>
		alert('Anda Harus Login Dahulu!');
        document.location.href = 'login.php';
	</script>";
}
?>