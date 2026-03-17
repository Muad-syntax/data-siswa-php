<?php
include "service/koneksi.php";
if (isset($_POST['nama_jurusan'])) {
    $namaJurusan = $_POST['nama_jurusan'];

    $query = "INSERT INTO tbjurusan (`nama_jurusan`) VALUES ('$namaJurusan')";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        header("Location: data-jurusan.php");
        exit();
    } else {
        echo 'Gagal menyimpan data: ' . mysqli_error($koneksi);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurusan</title>
</head>

<body>
    <?php include "layout/header.html" ?>
    <h3>Tambah Jurusan</h3>
    <form action="" method="post">
        <label for="nama_jurusan">Jurusan</label>
        <input type="text" name="nama_jurusan" placeholder="masukan jurusan">
        <button type="submit">Simpan</button>
    </form>
</body>

</html>