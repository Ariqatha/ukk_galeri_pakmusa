<div class="container my-4 p-5 bg-hero rounded shadow">
    <div class="py-5 text-white text-center">
        <p class="display-5 fw-bold">Galeri Sekolah</p>
        <p class="fs-4 col-md-8 mx-auto">SMKN 4 BOGOR</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php 
        $tampil = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID");
        foreach($tampil as $tampils):
        ?>
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm border-light">
                <img src="uploads/<?= $tampils['NamaFile'] ?>" class="card-img-top object-fit-cover" style="aspect-ratio: 16/9;">
                <div class="card-body">
                    <h5 class="card-title"><?= $tampils['JudulFoto'] ?></h5>
                    <p class="card-text text-muted">by: <?= $tampils['Username'] ?></p>
                    <a href="?url=detail&&id=<?= $tampils['FotoID'] ?>" class="btn btn-primary">Detail</a>
                    <a href="delete_photo.php?id=<?= $tampils['FotoID'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this photo?');">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .bg-hero {
        background-image: url('assets/images/hero-background.jpg'); /* Add your background image */
        background-size: cover;
        background-position: center;
        opacity: 0.8; /* Slight transparency for overlay effect */
    }
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }
    .object-fit-cover {
        object-fit: cover;
        border-radius: 0.5rem 0.5rem 0 0; /* Round top corners */
    }
</style>
