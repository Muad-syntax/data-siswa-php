<?php
include "service/koneksi.php";
include "service/proses-login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/?v=<?php echo time(); ?>">
    <title>Login</title>
</head>
<body>
    <header>
        <ul type="none">
            <li><a href="index.php">Home</a></li>
            <li><a href="data/data-siswa.php">Data Siswa</a></li>
            <li><a href="data/data-jurusan.php">Data Jurusan</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </header>
    <h2>Login</h2>
    <form action="service/proses-login.php" method="POST">
        <input type="text" placeholder="username" name="username" required>
        <input type="password" placeholder="password" name="password" required>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>