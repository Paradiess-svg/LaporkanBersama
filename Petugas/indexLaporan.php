<?php
include '../koneksi.php';
session_start();

$query = "SELECT * FROM tb_laporan;";
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
        <a href="indexPetugas.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Cek
            Petugas</a>
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
                        <th scope="col">Id Laporan</th>
                        <th scope="col">judul Laporan</th>
                        <th scope="col">Inti Laporan</th>
                        <th scope="col">Foto Laporan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Hasil Penyelidikan</th>
                        <th scope="col">Aksi</th>
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
                        <td><?php echo $result['id_laporan']; ?></td>
                        <td><?php echo $result['judul']; ?></td>
                        <td><?php echo $result['laporan']; ?></td>
                        <td><img style="width: 150px;" src="../img/<?php echo $result['foto_laporan']; ?>" alt=""></td>
                        <?php
                            if ($result['status'] == 'Laporan Selesai') : ?>
                        <td class="fw-bolder bg-success text-white">
                            <?php echo $result['status']; ?>
                        </td>
                        <?php elseif ($result['status'] == 'Dalam Investigasi Petugas') : ?>
                        <td class="fw-bolder bg-white text-info">
                            <?php echo $result['status']; ?>
                        </td>
                        <?php elseif ($result['status'] == 'Laporan Tidak Valid!') : ?>
                        <td class="fw-bolder bg-danger text-white">
                            <?php echo $result['status']; ?>
                        </td>
                        <?php elseif ($result['status'] == 'Sedang Diverifikasi/Divalidasi') : ?>
                        <td class="fw-bolder bg-info text-white">
                            <?php echo $result['status']; ?>
                        </td>
                        <?php else : ?>
                        <td class="fw-bolder bg-secondary text-warning">
                            <?php echo $result['status']; ?>
                        </td>
                        <?php endif ?>
                        <td><?php echo $result['komentar']; ?></td>
                        <td>

                            <a href="kelolaLaporan.php?ubah=<?php echo $result['id_laporan']; ?>" type="button"
                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        </td>
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