<!DOCTYPE html>

<?php
include '../koneksi.php';
session_start();


$id_laporan = '';
$judul = '';
$laporan = '';
$status = '';
$komentar = '';

if (isset($_GET['ubah'])) {
    $id_laporan = $_GET['ubah'];

    $query = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $judul = $result['judul'];
    $laporan = $result['laporan'];
    $status = $result['status'];



    //var_dump($result);

    //die();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="asset/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="asset/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="asset/favicon-16x16.png">
    <link rel="manifest" href="asset/site.webmanifest">

    <title>Laporkan Bersama!</title>
</head>

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
                Anti korupsi, kolusi, dan nepotisme <cite title="Source Title">!!!</cite>
            </figcaption>
        </figure>
        <div class="container">
            <form method="post" action="prosesLaporan.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id_laporan ?>" name="id_laporan">
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input required type="text" name="judul" class="form-control" id="judul"
                            value="<?php echo $result['judul']; ?>" disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="laporan" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input required type="text" name="laporan" class="form-control" id="laporan"
                            value="<?php echo $result['laporan']; ?>" disabled>
                    </div>

                </div>
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto Laporan</label>
                    <div class="col-sm-10">
                        <div class="col-sm-10">
                        </div>
                        <img style="width: 150px;" src="../img/<?php echo $result['foto_laporan']; ?>" alt="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jkel" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select required id="jkel" name="status" class="form-select">
                            <option <?php if ($status == 'Belum Diverifikasi/Divalidasi') {
                                        echo "selected";
                                    } ?> value="Belum Diverifikasi/Divalidasi">Belum Diverifikasi/Divalidasi</option>
                            <option <?php if ($status == 'Sedang Diverifikasi/Divalidasi') {
                                        echo "selected";
                                    } ?> value="Sedang Diverifikasi/Divalidasi">Sedang Diverifikasi/Divalidasi</option>
                            <option <?php if ($status == 'Dalam Investigasi Petugas') {
                                        echo "selected";
                                    } ?> value="Dalam Investigasi Petugas">Dalam Investigasi Petugas</option>
                            <option <?php if ($status == 'Laporan Tidak Valid!') {
                                        echo "selected";
                                    } ?> value="Laporan Tidak Valid!">Laporan Tidak Valid!</option>
                            <option <?php if ($status == 'Laporan Selesai') {
                                        echo "selected";
                                    } ?> value="Laporan Selesai">Laporan Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="komentar" class="col-sm-2 col-form-label">Komentar</label>
                    <div class="col-sm-10">
                        <textarea required class="form-control" name="komentar" id="komentar"
                            rows="3"><?php echo $komentar ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row mt-3">
                    <div class="col">
                        <?php
                        if (isset($_GET['ubah'])) {
                        ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i
                                class="fa fa-floppy-o mx-1" aria-hidden="true"></i>Simpan Perubahan</button>
                        <?php
                        } else {
                        ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary"><i
                                class="fa fa-floppy-o mx-1" aria-hidden="true"></i>Tambah</button>
                        <?php
                        }
                        ?>
                        <a href="indexLaporan.php" type="button" class="btn btn-danger"><i class="fa fa-reply mx-1"
                                aria-hidden="true"></i>Batal</a>
                    </div>
            </form>
        </div>

        <div class="p-2 align-middle text-center ">
            <img src="../assets/gedungKPK.png" width="80px" alt="">
            <h6 class="mt-2">Made By Izdihar Izzan Wibowo XII RPL 2 | 2024©</h6>
        </div>
</body>

</html>