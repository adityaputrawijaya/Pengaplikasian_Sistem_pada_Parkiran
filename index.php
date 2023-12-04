<?php

include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['No_kendaraan'])) {
    $No_kendaraan = $_POST['No_kendaraan'];
    $Jenis_kendaraan = $_POST['Jenis_kendaraan'];
    $Jam_masuk = $_POST['Jam_masuk'];

    $x = query("INSERT INTO tb_kendaraan (no_kendaraan, jenis_kendaraan, jam_masuk, jam_keluar, status) VALUES ('$No_kendaraan', '$Jenis_kendaraan', '$Jam_masuk', '', 'belum selesai')");


    if ($x) {
        $_SESSION['notif'] = 'Berhasil menambah data';
        header("location: ./");
        die();
    } else {
        $_SESSION['notif'] = 'Gagal menambah data';
        header("location: ./");
        die('gagal');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins&display=swap');
    </style>
    <link rel="stylesheet" href="style.css?<?= time() ?>">
    <title>Parkir Program</title>
</head>
<body>
    <div class="container">
        <div class="menu">
            <a class="active" href="./">MASUK</a>
            <a href="./keluar.php">KELUAR</a>
            <a href="list.php">LIST AKTIF</a>
        </div>

        <form action="" method="post">
            <?php if (isset($_SESSION['notif'])) { ?>
                <div class="notif">
                    <p><?= $_SESSION['notif'] ?></p>
                </div>
                <?php unset($_SESSION['notif']); } ?>

            <label for="No_kendaraan">No Kendaraan</label>
            <input type="text" required name="No_kendaraan">

            <label for="Jenis_kendaraan">Jenis Kendaraan</label>
            <select name="Jenis_kendaraan">
                <option value="motor">Motor</option>
            </select>

            <label for="Jam_masuk">Jam Masuk</label>
            <input type="time" name="Jam_masuk" value="<?= date('H:i') ?>" required>

            <button>Tambah</button>
        </form>
    </div>
</body>
</html>
