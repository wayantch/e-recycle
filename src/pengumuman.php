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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Recycle | Pengumuman</title>
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
                    <li class="nav-item">
                        <a class="nav-link active" href="riwayat.php"><i class="fa-solid fa-clock-rotate-left me-1"></i>Riwayat</a>
                    </li>
                </ul>
                <span class="navbar-text" onclick="return confirm('Yakin ingin Logout?')">
                    <a href="logout.php"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Pengumuman</h2>
        <div class="card">
            <div class="card-header text-left">
                <h5>Pengumuman Penting!</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Setiap bulan, kami memiliki jadwal pengambilan sampah yang telah ditetapkan, di mana pengambilan sampah dilakukan dua kali, tepatnya pada tanggal <strong>2</strong> dan tanggal <strong>25</strong>. Kami mengatur jadwal ini agar memberikan kenyamanan dan kebersihan bagi semua penghuni. Untuk setiap rumah tangga yang menggunakan layanan pengambilan sampah kami, biaya yang dikenakan adalah sebesar <strong>Rp 45.000</strong> per bulan. Dengan membayar biaya ini, Anda tidak hanya membantu menjaga lingkungan tetap bersih, tetapi juga mendukung keberlanjutan program pengelolaan sampah kami.</p>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <p class="card-text">Kepada seluruh warga, kami ingin mengingatkan pentingnya untuk selalu membuang sampah pada tempatnya. Kebiasaan ini sangatlah penting untuk menjaga kebersihan lingkungan kita. Mari kita bersama-sama menciptakan lingkungan yang bersih, sehat, dan nyaman untuk kita tinggali.

                    Dengan membuang sampah pada tempatnya, kita tidak hanya menjaga keindahan lingkungan tetapi juga mencegah terjadinya pencemaran lingkungan. Sampah yang dibuang sembarangan dapat menciptakan masalah kesehatan, merusak alam, dan bahkan mengganggu kehidupan hewan.

                    Oleh karena itu, marilah kita menjadi warga yang bertanggung jawab dengan membuang sampah pada tempatnya. Mari kita jaga bersama kebersihan lingkungan kita demi kesehatan dan kelestarian alam.

                    Terima kasih atas perhatiannya.</p>
            </div>
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