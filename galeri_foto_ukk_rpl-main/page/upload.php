<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-light">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Halaman Upload</h4>
                    <?php 
                        // Handle form submission
                        $submit = @$_POST['submit'];
                        if ($submit == 'Simpan') {
                            $judul_foto = @$_POST['judul_foto'];
                            $deskripsi_foto = @$_POST['deskripsi_foto'];
                            $nama_file = @$_FILES['namafile']['name'];
                            $tmp_foto = @$_FILES['namafile']['tmp_name'];
                            $tanggal = date('Y-m-d');
                            $album_id = @$_POST['album_id'];
                            $user_id = @$_SESSION['user_id'];
                            if (move_uploaded_file($tmp_foto, 'uploads/' . $nama_file)) {
                                $insert = mysqli_query($conn, "INSERT INTO foto VALUES('', '$judul_foto', '$deskripsi_foto', '$tanggal', '$nama_file', '$album_id', '$user_id')");
                                echo '<div class="alert alert-success">Gambar Berhasil disimpan</div>';
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                            } else {
                                echo '<div class="alert alert-danger">Gambar gagal disimpan</div>';
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=upload">';
                            }
                        }

                        // Fetch album data
                        $album = mysqli_query($conn, "SELECT * FROM album");
                    ?>
                    <form action="?url=upload" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="judul_foto">Judul Foto</label>
                            <input type="text" id="judul_foto" class="form-control" required name="judul_foto">
                        </div>
                        <div class="form-group mb-3">
                            <label for="deskripsi_foto">Deskripsi Foto</label>
                            <textarea id="deskripsi_foto" name="deskripsi_foto" class="form-control" required cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="namafile">Pilih Gambar</label>
                            <input type="file" id="namafile" name="namafile" class="form-control" required>
                            <small class="text-danger">File Harus Berupa: *.jpg, *.png, *.gif</small>
                        </div>
                        <div class="form-group mb-4">
                            <label for="album_id">Pilih Album</label>
                            <select id="album_id" name="album_id" class="form-select" required>
                                <?php foreach ($album as $albums): ?>
                                <option value="<?= $albums['AlbumID'] ?>"><?= $albums['NamaAlbum'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger btn-block">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 1rem; /* Rounded corners */
    }
    .card-body {
        background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
    }
    h4.card-title {
        font-weight: bold;
        color: #dc3545; /* Bootstrap danger color */
    }
</style>
