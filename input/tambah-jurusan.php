<?php
include "../service/koneksi.php";

session_start();

if (!isset($_SESSION["username"])) {
    echo "halaman khusus admin, silahkan login";
    die();
}

if ($_SESSION["role"] != 'admin'){
    echo("halaman khusus admin!!");
    exit();
}

if (isset($_POST['nama_jurusan'])) {
    $namaJurusan = $_POST['nama_jurusan'];

    $query = "INSERT INTO tbjurusan (`nama_jurusan`) VALUES ('$namaJurusan')";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        header("Location: ../data/data-jurusan.php");
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
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <title>Tambah Jurusan</title>
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
            <li><a href="../data/data-siswa.php">Data Siswa</a></li>
            <li><a href="../data/data-jurusan.php">Data Jurusan</a></li>
            <li><a href="../login.php">Login</a></li>
            <li><a href="../register.php">Register</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </header>
    <main>
        <h3>Tambah Jurusan</h3>
        <form action="" method="post">
            <label for="nama_jurusan">Jurusan</label>
            <input type="text" name="nama_jurusan" placeholder="masukan jurusan">
            <button type="submit">Simpan</button>
        </form>
    </main>
    <footer>

    </footer>
</body>

</html>