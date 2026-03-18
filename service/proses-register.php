<?php
include "koneksi.php";
$register_message = "";

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbuser (`username`, `password`) VALUES ('$username', '$password')";

    if ($koneksi->query($sql)) {
        $register_message = "Anda telah berhasil membuat akun";
        // header("Location: ../login.php");
        // exit();
        } else {
            $register_message = "Cobalagi";
    }
}

?>