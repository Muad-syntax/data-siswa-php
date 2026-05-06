<?php
include "koneksi.php";
/**
 * @var mysqli $koneksi
 */
$id = $_POST['id'];

if (isset($_POST['id'])) {
    $sql = "DELETE FROM tbsiswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql);
}
header('Location: ../data/data-siswa.php');
exit();

?>