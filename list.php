<?php include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$data = query("SELECT * FROM tb_kendaraan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><?php include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$data = query("SELECT * FROM tb_kendaraan");
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
        
        <table width="100%" border="1" cellspacing="0">
            <tr>
                <th>NO Kendaraan</th>
                <th>Jenis</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status</th>
            </tr>
            
            <?php foreach ($data as $k) { ?>
                <tr>
                    <td><?= $k['no_kendaraan'] ?></td>
                    <td><?= $k['jenis_kendaraan'] ?></td>
                    <td><?= $k['jam_masuk'] ?></td>
                    <td><?= $k['jam_keluar'] ?></td> <!-- Menambahkan informasi jam keluar -->
                    <td><?= $k['status'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

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
        <table width="100%" border="1" cellspacing="0">
            <tr>
                <th>NO Kendaraan</th>
                <th>Jenis</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status</th>
            </tr>
            <?php foreach ($data as $k) { ?>
                <tr>
                    <td><?= $k['no_kendaraan'] ?></td>
                    <td><?= $k['jenis_kendaraan'] ?></td>
                    <td><?= $k['jam_masuk'] ?></td>
                    <td><?= $k['jam_keluar'] ?></td>
                    <td><?= $k['status'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
