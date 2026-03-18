<?php
include "../service/koneksi.php";
$sql = "SELECT tbsiswa.*,  tbjurusan.nama_jurusan
        FROM tbsiswa
        INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_jurusan = $_GET['id'];
    $sql = "SELECT tbsiswa.*,  tbjurusan.nama_jurusan
            FROM tbsiswa
            INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id
            WHERE tbsiswa.id_jurusan = '$id_jurusan'";
}
$result = mysqli_query($koneksi, $sql);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <title>Detail</title>
</head>

<body>
    <header>
        <ul type="none">
            <li><a href="../index.php">Home</a></li>
            <li><a href="data-siswa.php">Data Siswa</a></li>
            <li><a href="data-jurusan.php">Data Jurusan</a></li>
        </ul>
    </header>
    <main>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>kelas</th>
                <th>jurusan</th>
                <th>edit</th>
                <th>hapus</th>
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
                            <a href="../input/edit-data.php?id=<?php echo $row['id']; ?>">edit</a>
                        </td>
                        <td>
                            <form action="../service/proses-hapus.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button>hapus</button>
                            </form>
                        </td>
                    </tr>

            <?php }
            } else {
                echo "Belum ada data siswa di jurusan ini";
            }
            ?>
        </table>
    </main>
</body>

</html>