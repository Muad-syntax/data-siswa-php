<?php
include "service/koneksi.php";

$sql = "SELECT tbsiswa.nama, tbsiswa.kelas, tbjurusan.nama_jurusan, tbsiswa.id FROM `tbsiswa` INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id";

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $get = $_POST['id'];
    $sql = "SELECT tbsiswa.nama, tbsiswa.kelas, tbjurusan.nama_jurusan, tbsiswa.id FROM `tbsiswa` INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id WHERE tbsiswa.nama = '$get'";
}


$result = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>

<body>
    <?php include "layout/header.html" ?>
    <h3>Data Siswa</h3>
    <a href="tambah-siswa.php">Tambah siswa</a>
    <br><br>
    <form action="" method="post">
        <input type="text" placeholder="cari id" name="id" required>
        <button type="submit">cari</button>
    </form>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0" class="table">
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>kelas</th>
            <th>jurusan</th>
            <th></th>
            <th>aksi</th>
            <th></th>
            
        </tr>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['nama_jurusan']; ?></td>
                    <td>
                        <a href="edit-data.php?id=<?php echo $row['id']; ?>">edit</a>
                    </td>
                    <td>
                        <form action="service/proses-hapus.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button>hapus</button>
                        </form>
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