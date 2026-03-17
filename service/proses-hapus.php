<?php
include "koneksi.php";

$id = $_POST['id'];

if (isset($_POST['id'])) {
    $sql = "DELETE FROM tbsiswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql);
}
header('Location: ../data-siswa.php');
exit();

?>