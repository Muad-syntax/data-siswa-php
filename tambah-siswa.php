<?php
include "service/koneksi.php";
$sql = "SELECT * FROM tbjurusan";

if (isset($_POST['nama_jurusan']) && !empty($_POST['nama_jurusan'])) {
    $get = $_POST['nama_jurusan'];
    $sql = "SELECT * FROM tbjurusan WHERE nama_jurusan = '$get'";
}
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include "layout/header.html" ?>
    <h3>Tambah data siswa</h3>
    <form action="service/proses-simpan.php" method="post">
        <label for="">Nama</label>
        <input type="text" name="nama" placeholder="masukan nama">

        <label for="">Kelas</label>
        <input type="text" name="kelas" placeholder="masukan kelas">




        <label for="">Jurusan</label>
        <select name="id_jurusan" id="jurusan" required>
            <option value="">--Pilih jurusan-- </option>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <option value="<?php echo $row['id']; ?>">
                        <?php echo $row['nama_jurusan']; ?>
                    </option>


            <?php }
            } else {
            }
            ?>
        </select>

        <button type="submit">simpan</button>
    </form>
</body>

</html>