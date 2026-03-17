<?php
include "koneksi.php";

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$id_jurusan = $_POST['id_jurusan'];

$query = "INSERT INTO tbsiswa (`nama`,`kelas`, `id_jurusan`) VALUES ('$nama', '$kelas','$id_jurusan')";
$result = mysqli_query($koneksi, $query);

if ($result){
    header ("Location: ../data-siswa.php");
    exit();
} else {
    echo 'Gagal menyimpan data: ' . mysqli_error($koneksi);
}
?>