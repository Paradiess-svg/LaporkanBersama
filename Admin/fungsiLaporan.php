<?php
include '../koneksi.php';


function ubah_data($data){
    $id_laporan = $data['id_laporan'];
    $judul = $data['judul'];
    $laporan = $data['laporan'];
    $status = $data['status'];
    $komentar = $data['komentar'];

    $queryshow = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
    $sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);

    $query = "UPDATE tb_laporan SET status='$status', komentar='$komentar' WHERE id_laporan='$id_laporan';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}



?>