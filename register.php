<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporkan Bersama! | Register</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head>

<body class="bg-secondary" style="height:100vh">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="col-7 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
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
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo "<div class='alert alert-danger' role='alert'>Nama / Password tak sesuai, silakan coba lagi! </div>";
                        }
                    }
                    ?>

                    <h1 class="card-title text-center text-info mt-2 fs-1 fw-bold">Laporkan Bersama!<i class="fa fa-flag" aria-hidden="true"></i> </h1>
                    <h2 class="card-title text-center text-success mb-4 fs-1">Register</h2>

                    <form action="registerProses.php" method="post" class="col-10 mx-auto">
                        <div class="form-group mt-3">
                            <label for="name" class="form-label">Nama</label>
                            <input required type="text" name="name" class="form-control" id="name" placeholder="Ex: Andika Pratomo">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small id="passwordHelpInline" class="text-muted">
                                Rekomendasi password 8 karakter.
                            </small>
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <input type="submit" name="aksi" value="register" class="form-control btn btn-primary">
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <p>Sudah terdaftar? <a href="login.php">Login disini</a></p>
                        </div>
                        <div class="form-group mt-4 mb-3 text-center">
                            <p>Supported by <img src="assets/KPK.png" alt="" width="150px"></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>