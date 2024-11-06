<?php
session_start();
session_regenerate_id();
require_once "koneksi.php";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectLogin = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($selectLogin) > 0) {
        $row = mysqli_fetch_assoc($selectLogin);

        if ($row['email'] == $email && $row['password'] == $password) {
            $_SESSION['EMAILNYABRO'] = $row['email'];
            $_SESSION['NAMALENGKAPNYA'] = $row['nama_lengkap'];
            header("Location: kasir.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>

    <div class="container justify-content-center">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mt-2">
                                <label class="form-label" for="">Email</label>
                                <input type="email" class="form-control" placeholder="Isi Email Anda" name="email"
                                    required>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="">Password</label>
                                <input type="password" class="form-control" placeholder="Isi password Anda"
                                    name="password" required>
                            </div>
                            <div class="mt-3" align="right">
                                <button class="btn btn-primary" type="submit" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="bootstrap-5.3.3/dist/js/bootstrap.min.js">
</body>

</html>