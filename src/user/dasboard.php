<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['a_global']) || !isset($_SESSION['a_global']->role) || $_SESSION['a_global']->role != 1) {
    header('Location: index.php');
    exit;
}

require 'db.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE role = 1");

if ($query && mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_object($query);
} else {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Recycle | Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a50e33a747.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="js-sidebar">
            <!-- Bagian Sidebar -->
            <div class="h-100">
                <!-- Logo Sidebar -->
                <div class="sidebar-logo">
                    <a href="#">e-Recycle</a>
                </div>
                <!-- Menu Sidebar -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Dashboard
                    </li>
                    <li class="sidebar-item">
                        <a href="dasboard.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="data-transaksi.php" class="sidebar-link collapsed">
                            <i class="fa-solid fa-table pe-2"></i>Data Transaksi
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="data-masyarakat.php" class="sidebar-link collapsed">
                            <i class="fa-solid fa-table pe-2"></i>Data Masyarakat
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="main">
            <!-- Navbar -->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <i class="fa-solid fa-user fa-lg text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="profil.php" class="dropdown-item">Profil</a>
                                <a href="logout.php" class="dropdown-item" onclick="return confirm('Yakin?')">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main Content -->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <!-- Header Content -->
                    <div class="mb-3">
                        <h4>Dashboard - Admin</h4>
                    </div>
                    <!-- Row Content -->
                    <div class="row">
                        <!-- Card Content -->
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                            Selamat Datang <?= $user->nama_user ?>
                                            </h4>
                                            <p class="mb-2">
                                                Masuk ke halaman Dasboard sebagai Admin
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Content -->
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                Gunakan Dashboard dengan baik
                                            </h4>
                                            <p class="mb-2">
                                                Patuhi segala aturan yang ada walaupun admin
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer mt-auto py-3 text-white">
                <div class="container text-center">
                    <span class="text-muted">&copy; 2024 e-Recycle. All rights reserved.</span>
                </div>
            </footer>
        </div>
    </div>
    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- My Javascript -->
    <script src="../js/script.js"></script>
</body>

</html>