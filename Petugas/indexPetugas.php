<?php
include '../koneksi.php';
session_start();

$query = "SELECT * FROM tb_login;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../datatables/datatables.css">
    <script src="../datatables/datatables.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <title>Anti korupsi, kolusi, dan nepotisme</title>
</head>

<script>
$(document).ready(function() {
    $('#dt').DataTable();
});
</script>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand">
                <img src="../assets/KPK.png" alt="Logo KPK" height="80">
            </span>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-3">Laporkan Bersama!</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Supported by KPK</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Anti korupsi, kolusi, dan nepotisme <cite title="Source Title"> !!!</cite>
            </figcaption>
        </figure>
        <a href="indexLaporan.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-file"></i> Cek
            Laporan</a>
        <a href="../logout.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-user-times"></i> Logout</a>
        <?php
        if (isset($_SESSION['eksekusi'])) :
        ?>

        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>
                <?php
                    echo $_SESSION['eksekusi'];
                    ?>
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php

            session_destroy();
        endif;
        ?>

        <div class="table-responsive">
            <table id="dt" class="table align-middle table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            <center>No</center>
                        </th>
                        <th scope="col">username</th>
                        <th scope="col">Password</th>
                        <th scope="col">level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while (
                        $result = mysqli_fetch_assoc($sql)
                    ) {
                    ?>
                    <tr>
                        <th scope="row">
                            <center><?php echo ++$no; ?>.</center>
                        </th>
                        <td><?php echo $result['username']; ?></td>
                        <td><?php echo $result['password']; ?></td>
                        <?php if ($result['level'] == 'admin') : ?>
                        <td class="fw-bolder bg-success">
                            <?php echo $result['level']; ?>
                        </td>
                        <?php else : ?>
                        <td class="fw-bolder bg-secondary">
                            <?php echo $result['level']; ?>
                        </td>
                        <?php endif ?>

                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="p-2 align-middle text-center bg-secondary">
        <img src="../assets/gedungKPK.png" width="80px" alt="">
        <h6 class="mt-2 text-light">Made By Izdihar Izzan Wibowo XII RPL 2 | 2024©</h6>
    </div>

</body>

</html>