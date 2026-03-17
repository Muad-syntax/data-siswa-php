<?php
include "../service/koneksi.php";

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
    <title>Data Jurusan</title>
</head>

<body>
    <header>
        <a href="../index.php">Home</a>
        <a href="data-siswa.php">Data Siswa</a>
        <a href="#">Data Jurusan</a>
    </header>
    <h3>Data Jurusan</h3>
    <form action="" method="post">
        <input type="text" placeholder="cari jurusan" name="nama_jurusan" required>
        <button>cari</button>
    </form>
    <a href="../input/tambah-jurusan.php">Tambah jurusan</a>
    <table border="1" cellpadding="8" cellspacing="0" class="table">
        <tr>
            <th>Id</th>
            <th>Jurusan</th>
            <th>Aksi</th>
            <th>Detail</th>
        </tr>
         <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama_jurusan']; ?></td>
                    <td>
                        <a href="#">Edit</a> | <a href="#">Hapus</a>
                    </td>
                     <td>
                        <a href="#">Detail</a>
                    </td>
                </tr>


        <?php }
        } else {
            echo "Data tidak ditemukan";
        }
        ?>
    </table>
</body>

</html>