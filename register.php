<?php
include "service/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/?v=<?php echo time(); ?>">
    <title>Regisret</title>
</head>
<body>
    <header>
        <ul type="none">
            <li><a href="index.php">Home</a></li>
            <li><a href="data/data-siswa.php">Data Siswa</a></li>
            <li><a href="data/data-jurusan.php">Data Jurusan</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="#">Register</a></li>
        </ul>
    </header>
    <h2>Register</h2>
    <i></i>
    <form action="service/proses-register.php" method="POST">
        <input type="text" placeholder="username" name="username" required>
        <input type="password" placeholder="password" name="password" required>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>