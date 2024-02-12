<?php
                        session_start();

                        if ($_SESSION['level'] === 'admin') { header("location:../Admin/indexPetugas.php");}
                        else{header("location:indexLaporan.php");
                        }?>
