<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow-lg border-light">
                <div class="card-header text-center bg-danger text-white">
                    <h4 class="mb-0">Buat Album Baru</h4>
                </div>
                <div class="card-body">
                    <?php 
                    // Handle form submission
                    $submit = @$_POST['submit'];
                    if ($submit == 'Simpan') {
                        $nama_album = @$_POST['nama_album'];
                        $deskripsi_album = @$_POST['deskripsi_album'];
                        $tanggal = date('Y-m-d');
                        $user_id = @$_SESSION['user_id'];
                        $insert = mysqli_query($conn, "INSERT INTO album VALUES('', '$nama_album', '$deskripsi_album', '$tanggal', '$user_id')");
                        if ($insert) {
                            echo '<div class="alert alert-success" role="alert">Berhasil Membuat Album</div>';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Gagal Membuat Album</div>';
                            echo '<meta http-equiv="refresh" content="0.8; url=?url=album">';
                        }
                    }
                    ?>
                    <form action="?url=album" method="post">
                        <div class="form-group">
                            <label for="nama_album">Nama Album</label>
                            <input type="text" id="nama_album" class="form-control" required name="nama_album">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_album">Deskripsi Album</label>
                            <textarea id="deskripsi_album" name="deskripsi_album" class="form-control" required cols="30" rows="5"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger btn-block my-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-image: url('assets/img/lapangansmkn4.jpeg'); /* Replace with your background image */
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Keeps the background fixed during scrolling */
        color: #fff; /* Default text color */
    }
    .card {
        border-radius: 1rem;
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white for better readability */
    }
    .card-header {
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }
    .btn-danger {
        font-weight: bold;
        transition: background-color 0.3s;
    }
    .btn-danger:hover {
        background-color: #c82333; /* Darker red on hover */
    }
    label {
        color: #333; /* Dark color for labels for better readability */
    }
</style>
