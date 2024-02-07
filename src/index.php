<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['a_global']->nama_user)) {
    header('Location: login.php');
    exit;
}

require 'db.php';

$query = mysqli_query($conn, "SELECT * FROM users");
$user = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - e-Recycle</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-recycle me-2"></i>e-Recycle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home me-1"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pengumuman.php"><i class="fas fa-star me-1"></i>Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="transaksi.php"><i class="fas fa-dollar-sign me-1"></i>Transaksi</a>
                    </li>
                </ul>
                <span class="navbar-text" onclick="return confirm('Yakin ingin Logout?')">
                    <a href="logout.php"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-6">Selamat Datang, <?php echo ucfirst($_SESSION['a_global']->nama_user); ?> di e-Recycle</h1>
            <hr class="my-4">
            <p class="lead">Mari bersama-sama menjaga lingkungan dengan cara yang mudah dan menyenangkan.</p>
            <hr class="my-4">
            <p>Kunjungi platform kami untuk memulai mendaur ulang dan berkontribusi pada lingkungan.</p>
            <a class="btn btn-primary btn-lg" href="https://id.wikipedia.org/wiki/Daur_ulang" target="_blank" role="button">Mulai Sekarang</a>
        </div>
        <hr class="my-4">
    </div>
    <footer class="footer mt-auto py-3 text-white">
        <div class="container text-center">
            <span class="text-muted">&copy; 2024 e-Recycle. All rights reserved.</span>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
