<?php
include "../service/koneksi.php";
include "../service/proses-login.php";
include "../service/proses-edit-data.php";
session_start();
if ($_SESSION["role"] != 'admin'){
    echo("halaman khusus admin!!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">
    <title>Edit</title>
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
        <h2>Edit Data Siswa</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>">

            <label>Kelas:</label>
            <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>">

            <button type="submit" name="submit">Simpan</button>
        </form>
    </main>
    <footer>

    </footer>
</body>

</html>