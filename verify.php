<?php
session_start();
include("koneksi.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($con, "SELECT * FROM user where username='$username' and password='$password'");

    $hitung = mysqli_num_rows($cek);

    if ($hitung > 0) {
        $_SESSION['log'] = 'true';

        header('location:indexx.php');
    } else {
        header('location:login.php');
    };
};
