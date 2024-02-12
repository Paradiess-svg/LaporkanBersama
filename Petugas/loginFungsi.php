<?php
include '../koneksi.php';

session_start();

// Mengambil data Login
$name = $_POST['name'];
$password = md5($_POST['password']);

// Mengambil data dari tabel users
$query = mysqli_query($conn, "SELECT * FROM tb_login WHERE username = '$name' AND password = '$password'");
// Menghitung jumlah data
$cek = mysqli_num_rows($query);

// Jika User ditemukan lebih dari 1 maka user di temukann
if ($cek > 0) {
    $qry = mysqli_fetch_array($query);
    $_SESSION['id_login'] = $qry['id_login'];
    $_SESSION['username'] = $qry['username'];
    $_SESSION['password'] = $qry['password'];
    $_SESSION['level'] = $qry['level'];

    header("location:log.php");
} else {
    header("location:login.php?pesan=gagal");
}
