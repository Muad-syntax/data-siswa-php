<?php
include "koneksi.php";
$sql = "SELECT tbsiswa.nama, tbsiswa.kelas, tbjurusan.nama_jurusan, tbsiswa.id FROM `tbsiswa` INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id";

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $get = $_POST['id'];
    $sql = "SELECT tbsiswa.nama, tbsiswa.kelas, tbjurusan.nama_jurusan, tbsiswa.id FROM `tbsiswa` INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id WHERE tbsiswa.nama = '$get'";
}


$result = mysqli_query($koneksi, $sql);
?>