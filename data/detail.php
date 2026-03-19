<?php
include "../service/koneksi.php";
include "../service/proses-login.php";

// $sql = "SELECT tbsiswa.*,  tbjurusan.nama_jurusan
//         FROM tbsiswa
//         INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id";

// if (isset($_GET['id']) && !empty($_GET['id'])) {
//     $id_jurusan = $_GET['id'];
//     $sql = "SELECT tbsiswa.*,  tbjurusan.nama_jurusan
//             FROM tbsiswa
//             INNER JOIN tbjurusan ON tbsiswa.id_jurusan = tbjurusan.id
//             WHERE tbsiswa.id_jurusan = '$id_jurusan'";
// }
// $result = mysqli_query($koneksi, $sql);

if (!isset($_SESSION['username'])) {
    echo "halaman khusus admin, silahkan login! ";
    exit();
}

if ($_SESSION["role"] != 'admin'){
    echo("halaman khusus admin!!");
    exit();
}

$id_jurusan = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbjurusan WHERE id ='$id_jurusan'");
$dataJurusan = mysqli_fetch_assoc($query);

$querySiswa = mysqli_query($koneksi, "SELECT * FROM tbsiswa WHERE id_jurusan ='$id_jurusan'");



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
        <ul type="none" class="name">
            <li>
                <span>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo $_SESSION["username"];
                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
                </span>
            </li>
        </ul>
        <ul type="none">
            <li><a href="../index.php">Home</a></li>
            <li><a href="data-siswa.php">Data Siswa</a></li>
            <li><a href="data-jurusan.php">Data Jurusan</a></li>
            <li><a href="../login.php">Login</a></li>
            <li><a href="../register.php">Register</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </header>
    <main>
        <h2>Siswa jurusan <?=  $dataJurusan['nama_jurusan']; ?></h2>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>kelas</th>
                <th>edit</th>
                <th>hapus</th>
            </tr>

            <?php
            if ($querySiswa && mysqli_num_rows($querySiswa) > 0) {
                while ($row = mysqli_fetch_assoc($querySiswa)) { ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['kelas']; ?></td>
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