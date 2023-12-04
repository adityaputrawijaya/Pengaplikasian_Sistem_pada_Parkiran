<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "app parkir");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query($sql) {
    global $koneksi;
    return mysqli_query($koneksi, $sql);
}

function hitung($sql) {
    return mysqli_num_rows($sql);
}

function ts($time) {
    $jam = $time / (60 * 60);
    return ceil($jam);
}
?>
