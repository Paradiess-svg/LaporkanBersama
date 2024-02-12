<?php

include 'registerFungsi.php';
session_start();


        if($_POST['aksi'] == "register"){

            $berhasil= tambah_data($_POST);

            if($berhasil){
                $_SESSION['eksekusi']= "Berhasil Register, silakan kembali ke <a href='login.php'>login</a>";
                header("location: register.php");
            }else{
                echo $berhasil;
            }}else{
                $_SESSION['eksekusi']= "Register Gagal!";
                header("location: register.php");
            }
        
            ?>
