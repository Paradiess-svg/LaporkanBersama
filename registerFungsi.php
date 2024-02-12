<?php
include 'koneksi.php';
function tambah_data($data){

    $nama = $data['name'];
    $password = md5($data['password']);

    $query = "INSERT INTO tb_masyarakat VALUES(null, '$nama','$password' )";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}