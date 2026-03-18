<?php
include "koneksi.php";
session_start();


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbuser WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;
        header('Location: ../data/data-siswa.php');
        exit();
    } else {
        echo "data user tidak ditemukan!!";
    }

 
}
?>