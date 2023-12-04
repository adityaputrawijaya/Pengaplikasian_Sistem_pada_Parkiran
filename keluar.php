<?php
include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['cari_kendaraan'])) {
    $no_kendaraan  = $_POST['no_kendaraan'];
    $jam_keluar   = $_POST['jam_keluar'];

    $data = query("SELECT * FROM tb_kendaraan WHERE no_kendaraan='$no_kendaraan");

    $Totalhitung = hitung($data);

    if ($Totalhitung == 1) {
        $obj = mysqli_fetch_object($data);
        $tampil = true;

        $jenis_kendaraan = $obj->jenis_kendaraan;

        $lamaparkir = strtotime($jam_keluar) - strtotime($obj->jam_masuk);
        $lamaparkir = ts($lamaparkir);

        $m_harga = 4000;

        if ($jenis_kendaraan == "motor") {
            if ($lamaparkir > 8) {
                $jam_dendaparkir = $lamaparkir - 8;
                $totalDenda = $jam_dendaparkir * 1000; // Denda 1000 per jam melebihi 8 jam
                $totalharga = $m_harga * 8 + $totalDenda; // Biaya 8 jam pertama + denda
            } else {
                $totalharga = $m_harga * $lamaparkir;
            }
        }

        $totalBayar = $totalharga;
    } else {
        $_SESSION['notif'] = "Tidak ada data ditemukan";
        header("location: ./keluar.php");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <?php if (!isset($tampil)) { ?>
        <form action="" method="post">
            <?php if (isset($_SESSION['notif'])) { ?>
            <div class="notif">
                <p><?php echo $_SESSION['notif']; ?></p>
            </div>
            <?php } ?>

            <label for="no_kendaraan">No Kendaraan</label>
            <input name="no_kendaraan" type="text" required>

            <label for="jam_keluar">Jam Keluar</label>
            <input name="jam_keluar" type="time" value="<?= date('H:i') ?>" required>

            <input type="hidden" name="cari_kendaraan">

            <button>Cari Kendaraan</button>
        </form>
        <?php } ?>

        <?php if (isset($tampil)) { ?>
        <form action="">
            <label for="no_kendaraan">No Kendaraan</label>
            <input type="text" disabled value="<?= $obj->no_kendaraan; ?>">

            <label for="jenis_kendaraan">Jenis kendaraan</label>
            <input type="text" disabled value="<?= $obj->jenis_kendaraan; ?>">

            <label for="jam_masuk">Jam masuk</label>
            <input type="time" value="<?= $obj->jam_masuk; ?>" disabled>

            <label for="jam_keluar">Jam keluar</label>
            <input type="time" value="<?= $jam_keluar; ?>" disabled>

            <label for="lama_parkir">Lama Parkir</label>
            <input type="text" value="<?= $lamaparkir; ?>" disabled>

            <label for="denda">Denda</label>
            <input type="text" value="<?= isset($totalDenda) ? $totalDenda : 0; ?>" disabled>

            <label for="total_bayar">Total Bayar</label>
            <input type="text" value="<?= $totalBayar; ?>" disabled>

            <button>Selesaikan</button>
        </form>
        <?php } ?>
    </div>
</
