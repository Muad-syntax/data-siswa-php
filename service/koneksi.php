<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "data_siswa";

$koneksi = mysqli_connect(
    $host,
    $user,
    $pass,
    $database
);

if (!$koneksi){
    die("koneksi gagal" . mysqli_connect_error());
}
