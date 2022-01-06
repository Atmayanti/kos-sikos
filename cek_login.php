<?php
    session_start();
    $_SESSION['sesi'] = NULL;

    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $query = mysqli_query($db, "SELECT * FROM pemilik WHERE emailpemilik = '$email' AND passwordpemilik = '$password'");
        $sesi = mysqli_num_rows($query);

        if ($sesi == 1) {
            $data_pemilik = mysqli_fetch_array($query);
            $_SESSION['idpemilik'] = $data_pemilik['idpemilik'];
            $_SESSION['sesi'] = $data_pemilik['namapemilik'];

            echo "<script>alert('Anda berhasil login');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?user=$sesi'>";
        } else {
            echo "<script>alert('Anda gagal login');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php>";
        }
    } else {
        include "index.php";
    }
