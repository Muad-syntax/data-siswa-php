<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($koneksi, "SELECT * FROM tbsiswa WHERE id = '$id'");
    $row = mysqli_fetch_assoc($data);

    if (!$row) {
        die("Data tidak ditemukan");
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi, "UPDATE tbsiswa SET nama='$nama', kelas='$kelas' WHERE id='$id'");
    header("Location: data-siswa.php");
    exit();
}
?>