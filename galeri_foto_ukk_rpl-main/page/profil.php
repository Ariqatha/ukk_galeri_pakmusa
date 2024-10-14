<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow-lg border-light">
                <div class="card-header text-center bg-primary text-white">
                    <h2 class="mb-0">Halaman Profil</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="assets/img/ariq.jpeg" alt="User Profile" class="rounded-square" width="150" height="150">
                    </div>
                    <h4 class="text-center">Nama Lengkap: <?= $_SESSION['nama_lengkap'] ?? 'Ariq Athallah Hidayat' ?></h4>
                    <p class="text-center text-muted">Username: <?= $_SESSION['username'] ?? 'Username Tidak Diketahui' ?></p>
                    <p class="text-center text-muted">Email: <?= $_SESSION['email'] ?? 'ariq7701@gmail.com' ?></p>
                    <p class="text-center text-muted">Bergabung Sejak: <?= $_SESSION['join_date'] ?? '14 Oktober 2024' ?></p>
                    <div class="text-center mt-4">
                        <a href="?url=edit_profile" class="btn btn-warning">Edit Profil</a>
                    </div>
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
        color: #333; /* Default text color */
    }
    .card {
        border-radius: 1rem;
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white for better readability */
    }
    .rounded-square {
        border-radius: 0.5rem; /* Square corners */
        border: 3px solid white; /* Optional border for the profile picture */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
    }
    .btn-warning {
        transition: background-color 0.3s;
    }
    .btn-warning:hover {
        background-color: #d39e00; /* Darker yellow on hover */
    }
</style>
