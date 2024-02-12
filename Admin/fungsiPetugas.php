<?php
include '../koneksi.php';
function tambah_data($data)
{

    $username = $data['username'];
    $password = md5($data['password']);
    $level = $data['level'];

    $query = "INSERT INTO tb_login VALUES(null, '$username','$password',  '$level'  )";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id = $data['id'];
    $username = $data['username'];
    $password = md5($data['password']);
    $level = $data['level'];

    $queryshow = "SELECT * FROM tb_login WHERE id = '$id';";
    $sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);

    $query = "UPDATE tb_login SET username='$username', password = '$password', level = '$level' WHERE id='$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id = $data['hapus'];

    $queryshow = "SELECT * FROM tb_login WHERE id = '$id';";
    $sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);

    $query = "DELETE FROM tb_login WHERE id = '$id' ;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}