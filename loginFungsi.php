<?php
include 'koneksi.php';

session_start();

// Mengambil data Login
$nama = $_POST['nama'];
$password = md5($_POST['password']);

// Mengambil data dari tabel users
$query = mysqli_query($conn, "SELECT * FROM tb_masyarakat WHERE nama = '$nama' AND password = '$password'");
// Menghitung jumlah data
$cek = mysqli_num_rows($query);

// Jika User ditemukan lebih dari 1 maka user di temukann
if ($cek > 0) {
    $qry = mysqli_fetch_array($query);
    $_SESSION['id_masyarakat'] = $qry['id_masyarakat'];
    $_SESSION['nama'] = $qry['nama'];
    $_SESSION['password'] = $qry['password'];

    header("location:Pengaduan/index.php");
} else {
    header("location:login.php?pesan=gagal");
}
//INGAT! PASSWORD MD TAK BOLEH VARCHAR(12), MINIMAL 50 KARAKTER, KARENA ENSCRIPSI!
