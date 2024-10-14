<?php include 'koneksi.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKK 2024 | Website Galeri Foto</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-image: url('assets/images/login-bg.jpg'); /* Add your background image */
            background-size: cover;
            background-position: center;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-weight: bold;
        }
        .btn-danger {
            background-color: #ff4d4d; /* Customize button color */
            border: none;
        }
        .btn-danger:hover {
            background-color: #ff1a1a; /* Darker shade on hover */
        }
        .link-danger {
            color: #ff4d4d; /* Customize link color */
        }
        .link-danger:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center">Halaman Login</h4>
                        <p class="text-center">Login Akun</p>
                        <?php 
                        $submit = @$_POST['submit'];
                        if ($submit == 'Login') {
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);
                            $sql = mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password'");
                            $cek = mysqli_num_rows($sql);
                            if ($cek != 0) {
                                $sesi = mysqli_fetch_array($sql);
                                echo '<div class="alert alert-success">Login Berhasil!!!</div>';
                                $_SESSION['username'] = $sesi['Username'];
                                $_SESSION['user_id'] = $sesi['UserID'];
                                $_SESSION['email'] = $sesi['Email'];
                                $_SESSION['nama_lengkap'] = $sesi['NamaLengkap'];
                                echo '<meta http-equiv="refresh" content="0.8; url=./">';
                            } else {
                                echo '<div class="alert alert-danger">Login Gagal!!!</div>';
                                echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                            }
                        }
                        ?>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <input type="submit" value="Login" class="btn btn-danger btn-block my-3" name="submit">
                            <p class="text-center">Belum Punya Akun? <a href="daftar.php" class="link-danger">Daftar Sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
