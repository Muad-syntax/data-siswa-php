<?php
include "../service/koneksi.php";
include "../service/proses-selector-data-jurusan.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <title>Data Jurusan</title>
</head>

<body>
    <header>
        <ul type="none">
            <li><a href="../index.php">Home</a></li>
            <li><a href="data-siswa.php">Data Siswa</a></li>
            <li><a href="#">Data Jurusan</a></li>
        </ul>
    </header>

    <main>
        <h3>Data Jurusan</h3>
        <br><br>
        <form action="" method="post">
            <input type="text" placeholder="cari jurusan" name="nama_jurusan" required>
            <button>cari</button>
        </form>
        <br>
        <a href="../input/tambah-jurusan.php" class="button">Tambah jurusan</a>
        <br>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Id</th>
                <th>Jurusan</th>
                <th>Detail</th>
            </tr>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_jurusan']; ?></td>
                        <td>
                            <a href="detail.php?id=<?php echo $row['id']; ?>">Detail</a>
                        </td>
                    </tr>


            <?php }
            } else {
                echo "Data tidak ditemukan";
            }
            ?>
        </table>
    </main>
    <footer>

    </footer>

</body>

</html>