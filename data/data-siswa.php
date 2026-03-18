<?php
include "../service/koneksi.php";
include "../service/proses-innerjoin-data-siswa.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <title>Data Siswa</title>
</head>

<body>
    <header>
        <ul type="none">
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Data Siswa</a></li>
            <li><a href="data-jurusan.php">Data Jurusan</a></li>
        </ul>
    </header>

    <main>
        <h3>Data Siswa</h3>
        <a href="../input/tambah-siswa.php" class="button">Tambah siswa</a>
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
                echo "Data tidak ditemukan";
            }
            ?>
        </table>
    </main>

    <footer>

    </footer>

</body>

</html>