<?php

include 'fungsiLaporan.php';
session_start();

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            // $berhasil= tambah_data($_POST);

            // if($berhasil){
            //     $_SESSION['eksekusi']= "Data Berhasil Ditambahkan";
            //     header("location: index.php");
            // }else{
            //     echo $berhasil;
            // }
//Program tambah_data tak akan Berfungsi karena tidak ada fitur tambah maupun delete
        } else if($_POST['aksi'] == "edit"){

            $berhasil = ubah_data($_POST);

            if($berhasil){
                $_SESSION['eksekusi']= "Data Berhasil Diperbarui";
                header("location: indexLaporan.php");
            }else{
                echo $berhasil;
            }
        }
    }

    // if(isset($_GET['hapus'])){

    //     $berhasil = hapus_data($_GET);

    //     if($berhasil){
    //         $_SESSION['eksekusi']= "Data Berhasil Dihapus";
    //         header("location: indexLaporan.php");
    //     }else{
    //         echo $berhasil;
    //     }
    // }
?>