<?php
include "service/koneksi.php";
$register_message = "";

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbuser (`username`, `password`) VALUES ('$username', '$password')";

    if ($koneksi->query($sql)) {
        $register_message = "Anda telah berhasil membuat akun";
        header("Location:login.php");
        exit();
        } else {
            $register_message = "Cobalagi";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login-register.css?v=<?php echo time(); ?>">
    <title>Regisret</title>
</head>
<body>
    <header>
        <ul type="none">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="#">Register</a></li>
        </ul>
    </header>
    <h2>Register</h2>
    <i></i>
    <form action="" method="POST">
        <input type="text" placeholder="username" name="username" required>
        <input type="password" placeholder="password" name="password" required>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>