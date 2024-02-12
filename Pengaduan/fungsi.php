<?php
include '../koneksi.php';
function tambah_data($data, $files){

    $judul = $data['judul'];
    $laporan = $data['laporan'];


    echo $files['foto']['name'];

    $split = explode('.',$files['foto']['name']);
    $ekstensi = $split[count($split)-1];
    $foto = $judul.'.'.$ekstensi;
    $dir = "../img/";
    $tmpFile = $files['foto']['tmp_name'];

    move_uploaded_file($tmpFile, $dir.$foto);

    $query = "INSERT INTO tb_laporan VALUES(null, '$judul', '$laporan',  '$foto','Belum Diverifikasi/Divalidasi', 'Belum di cek oleh petugas')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data, $files){
    $id_laporan = $data['id_laporan'];
    $judul = $data['judul'];
    $laporan = $data['laporan'];

    $queryshow = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
    $sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);

    if($files['foto']['name'] ==""){
        $foto = $result['foto_laporan'];
    }else{
        $split = explode('.',$files['foto']['name']);
        $ekstensi = $split[count($split)-1];

        $foto = $result['judul'].'.'.$ekstensi;
        unlink("../img/".$result['foto_laporan']);
        move_uploaded_file($files['foto']['tmp_name'], '../img/'.$foto);
    }
    
    $query = "UPDATE tb_laporan SET judul='$judul', laporan = '$laporan', foto_laporan = '$foto', status= 'Belum Diverifikasi/Divalidasi', komentar= 'Belum di cek oleh petugas' WHERE id_laporan='$id_laporan';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data){
    $id_laporan = $data['hapus'];

    $queryshow = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
    $sqlshow = mysqli_query($GLOBALS['conn'] , $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);

    unlink("../img/".$result['foto_laporan']);

    $query="DELETE FROM tb_laporan WHERE id_laporan = '$id_laporan' ;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;

}

?>