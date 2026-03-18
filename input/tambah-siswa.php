<?php
include "../service/koneksi.php";
include "../service/proses-login.php";

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
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    
    <title>Tambah Siswa</title>
</head>

<body>
    <header>
        <ul type="none" class="name">
            <li><span><?= $_SESSION["username"] ?></span></li>
        </ul>
        <ul type="none">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../data/data-siswa.php">Data Siswa</a></li>
            <li><a href="../data/data-jurusan.php">Data Jurusan</a></li>
            <li><a href="../login.php">Login</a></li>
            <li><a href="../register.php">Register</a></li>
        </ul>
    </header>
    <main>
        <h3>Tambah data siswa</h3>
        <form action="../service/proses-simpan.php" method="post">
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
    </main>

    <footer>

    </footer>

</body>

</html>