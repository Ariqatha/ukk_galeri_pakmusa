<?php include 'koneksi.php'; ?>
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
         background-image: url('assets/img/background.jpg'); /* Background image */
         background-size: cover;
         background-position: center;
      }
      .card {
         border-radius: 1rem;
         background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent for better readability */
         box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      }
      .btn-danger {
         transition: background-color 0.3s, transform 0.3s;
      }
      .btn-danger:hover {
         background-color: #c82333; /* Darker red on hover */
         transform: scale(1.05); /* Slight scale effect */
      }
      .form-control:focus {
         box-shadow: none; /* Remove default focus shadow */
         border-color: #dc3545; /* Custom border color */
      }
      .link-danger {
         font-weight: bold;
      }
   </style>
</head>

<body>
   <div class="container">
      <div class="row justify-content-center align-items-center vh-100">
         <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title text-center">Halaman Daftar</h4>
                  <p class="text-center">Daftar Akun</p>
                  <?php
                  $submit = @$_POST['submit'];
                  if ($submit == 'Daftar') {
                     $username = @$_POST['username'];
                     $password = md5(@$_POST['password']);
                     $email = @$_POST['email'];
                     $nama_lengkap = @$_POST['nama_lengkap'];
                     $alamat = @$_POST['alamat'];
                     $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' OR Email='$email' "));
                     if ($cek == 0) {
                        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$email', '$nama_lengkap', '$alamat')");
                        echo '<div class="alert alert-success" role="alert">Daftar Berhasil, Silahkan Login!!</div>';
                        echo '<meta http-equiv="refresh" content="0.8; url=login.php">';
                     } else {
                        echo '<div class="alert alert-danger" role="alert">Maaf, Akun Sudah Ada</div>';
                        echo '<meta http-equiv="refresh" content="0.8; url=daftar.php">';
                     }
                  }
                  ?>
                  <form action="daftar.php" method="post">
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                     </div>
                     <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" required>
                     </div>
                     <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                     </div>
                     <input type="submit" value="Daftar" class="btn btn-danger my-3" name="submit">
                     <p class="text-center">Sudah Punya Akun? <a href="login.php" class="link-danger">Login Sekarang</a></p>
                  </form>
               </div>
            </div>
