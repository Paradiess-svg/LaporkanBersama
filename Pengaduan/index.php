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
    <title>Pengaduan</title>
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
    <div class="container mb-5">
        <h1 class="mt-3">Laporkan Bersama!</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Supported by KPK</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Anti korupsi, kolusi, dan nepotisme <cite title="Source Title"> !!!</cite>
            </figcaption>
        </figure>

        <a href="tambah.php" type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
            data-bs-target="#Modaltambah"> <i class="fa fa-plus"></i> Tambahkan Laporan</a>
        <a href="../logout.php" type="button" class="btn btn-danger mb-3"> <i class="fa fa-sign-out"></i> Logout</a>

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
                        <?php if ($result['status'] == 'Laporan Selesai') : ?>
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

                            <?php if ($result['status'] == 'Belum Diverifikasi/Divalidasi') : ?>
                            <a href="tambah.php?ubah=<?php echo $result['id_laporan']; ?>" type="button"
                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            <?php else : ?>
                            <a href="tambah.php?ubah=<?php echo $result['id_laporan']; ?>" type="button"
                                class="btn btn-success btn-sm disabled" aria-disabled="true"><i
                                    class="fa fa-pencil"></i></a>
                            <?php endif ?>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal<?= $result['id_laporan'] ?>"><i
                                    class="fa fa-trash"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $result['id_laporan'] ?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger fw-bold" id="exampleModalLabel">
                                                Konfirmasi</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-warning"><b>Perhatian! data yang terhapus tak dapat di
                                                    pulihkan</b></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a href="proses.php?hapus=<?php echo $result['id_laporan']; ?>"
                                                type="button" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal tambah -->
                            <div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger fw-bold" id="exampleModalLabel">
                                                Perhatian!</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-warning"><b>Syarat dan ketentuan</b></h4>
                                            <li><b>Pelapor wajib memberikan judul, deskripsi, dan foto yang cukup jelas
                                                    untuk membantu penyelidikan</li>
                                            <li><b>KPK hanya menangani kasus yang berhubungan dengan Korupsi, Suap,
                                                    Nepotisme dan kasus sejenis</li>
                                            <li><b>Diluar dari kasus yang disebutkan bukan tanggung jawab dari KPK</li>
                                            <li><b>Laporan yang salah atau hoax akan tidak ditindak lanjuti</li>
                                            <li><b>Pelapor memiliki hak untuk memberikan laporan sebebas-bebasnya</li>
                                            <li><b>Pelapor memiliki hak perlindungan dari pihak yang mengancam</li>
                                            <li><b>Pelapor adalah <i>incognito</i> atau menyamar dan tak dikenal,
                                                    memiliki hak absolute sebagai pelapor kejahatan korupsi, kolusi dan
                                                    nepotisme.</b></li>
                                            <div class=" mt-4 mb-3 text-center">
                                                <p>Supported by</p>
                                                <h5><b>Komisi Pemberantasan Korupsi</h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Urungkan</button>
                                            <a href="tambah.php" type="button" class="btn btn-primary">Iya saya
                                                setuju</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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