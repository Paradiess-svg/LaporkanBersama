<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporkan Bersama! | Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
</head>

<body class="bg-secondary" style="height:100vh">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="col-7 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo "<div class='alert alert-danger' role='alert'>Username / Password tak sesuai, silakan coba lagi! </div>";
                        }
                    }
                    ?>

                    <h1 class="card-title text-center text-info mt-2 fs-1 fw-bold">Laporkan Bersama!<i class="fa fa-flag" aria-hidden="true"></i></h1>

                    <h2 class="card-title text-center text-success mb-4 fs-1"><img src="../assets/KPK.png" alt="" width="150px"></h2>

                    <form action="loginFungsi.php" method="post" class="col-10 mx-auto">
                        <div class="form-group mt-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <input type="submit" name="login" value="Login" class="form-control btn btn-primary">
                        </div>

                        <div class="form-group mt-4 mb-3">
                            <p>Belum terdaftar? Mohon konfirmasi akun anda kepada Admin</p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>