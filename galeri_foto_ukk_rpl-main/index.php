<?php include 'koneksi.php'; session_start() ?>
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
            background-image: url('assets/img/lapangansmkn4.jpeg'); /* Path to your background image */
            background-size: cover; /* Ensures the image covers the entire body */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="?url=home">Gallery Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="?url=home">Home</a>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a class="nav-link" href="?url=upload">Upload</a>
                        <a class="nav-link" href="?url=album">Album</a>
                        <a class="nav-link" href="?url=profile"><?= ucwords($_SESSION['username']) ?></a>
                        <a href="?url=logout" class="nav-link">Logout</a>
                    <?php else: ?>
                        <a class="nav-link" href="login.php">Login</a>
                        <a class="nav-link" href="daftar.php">Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <?php 
        $url=@$_GET["url"];
        if($url=='home'){
            include 'page/home.php';
        } elseif($url=='profile'){
            include 'page/profil.php';
        } elseif($url=='upload'){
            include 'page/upload.php';
        } elseif($url=='album'){
            include 'page/album.php';
        } elseif($url=='like'){
            include 'page/like.php';
        } elseif($url=='komentar'){
            include 'page/komentar.php';
        } elseif($url=='detail'){
            include 'page/detail.php';
        } elseif($url=='logout'){
            session_destroy();
            header("Location: ?url=home");
        } else {
            include 'page/home.php';
        }
    ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
