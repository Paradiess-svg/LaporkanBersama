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
            <form method="post" action="proses.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id_laporan ?>" name="id_laporan">
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input required type="text" name="judul" class="form-control" id="judul"
                            placeholder="Ex: Kades Sukamundur menerima suap" value="<?php echo $judul ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input required type="text" name="laporan" class="form-control" id="nama"
                            placeholder="Ex: Suap diduga dari perusahaan swasta setempat agar dilancarkan project tambang mereka, yang jelas merugikan masyarakat lokal"
                            value="<?php echo $laporan ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto Laporan</label>
                    <div class="col-sm-10">
                        <input <?php if (!isset($_GET['ubah'])) {
                                    echo "required";
                                } ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
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
                            <a href="index.php" type="button" class="btn btn-danger"><i class="fa fa-reply mx-1"
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