<?php
include "koneksi.php";
/**
 * @var mysqli $koneksi
 */
$sql = "SELECT * FROM tbjurusan";

if (isset($_POST['nama_jurusan']) && !empty($_POST['nama_jurusan'])) {
    $get = $_POST['nama_jurusan'];
    $sql = "SELECT * FROM tbjurusan WHERE nama_jurusan = '$get'";
}
$result = mysqli_query($koneksi, $sql);

?>