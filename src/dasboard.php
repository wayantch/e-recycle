<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['a_global']->role) || $_SESSION['a_global']->role != 1) {
    header('Location: index.php');
    exit;
}

require 'db.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE role = 1");
$user = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Recycle</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container">
                <a class="navbar-brand text-white" href="#">
                    <i class="fas fa-recycle mr-2"></i>e-Recycle - Admin
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="dashboard.php">
                                <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
                            </a>
                        </li>
                        <!-- Tambahkan menu sesuai kebutuhan -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="profil.php">
                                <i class="fas fa-user mr-1"></i>Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="data-transaksi.php">
                                <i class="fas fa-clipboard mr-1"></i>Data Transaksi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="data-masyarakat.php">
                                <i class="fas fa-user-group mr-1"></i>Data Masyarakat
                            </a>
                        </li>
                        <li class="nav-item" onclick="return confirm('Keluar dari Admin?')">
                            <a class="nav-link text-white" href="logout.php">
                                <i class="fas fa-sign-out-alt mr-1"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- HEADER END -->

    <!-- MAIN -->
    <main>
        <div class="container mt-4">
            <div class="bg-primary text-white p-4 mb-4 rounded">
                <h3 class="text-2xl font-semibold">Selamat Datang, <?php echo ucwords($user->nama_user); ?> Di e-Recycle</h3>
                <p>Terakhir login pada <?php echo date('d F Y'); ?></p>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 class="text-2xl font-semibold">Gunakan Dasboard sebaik mungkin</h3>
                    <p>
                        Selamat datang di Dashboard Admin! Di sini Anda akan menemukan segala yang Anda butuhkan untuk mengelola aplikasi kami dengan efisien dan efektif. Dari melihat ringkasan penting hingga mengelola pengguna, mengakses laporan, dan melakukan banyak lagi, semuanya tersedia dalam satu tempat yang mudah diakses. Kami telah merancang dashboard ini untuk memberikan Anda visibilitas penuh dan kendali atas aplikasi kami, sehingga Anda dapat membuat keputusan yang tepat berdasarkan informasi yang akurat. Jelajahi fitur-fitur intuitif kami dan rasakan kemudahan dalam mengelola bisnis Anda di sini di Dashboard Admin.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-light">
        <div class="container py-3">
            <small>CopyRight &copy; 2024 - e-Recycle</small>
        </div>
    </footer>
    <!-- FOOTER -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
