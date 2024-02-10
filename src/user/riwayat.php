<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$nama_user = isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : '';

require 'db.php';

// Mengambil riwayat pembayaran untuk pengguna yang saat ini login
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE nama='$nama_user' ORDER BY tanggal_bayar DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>e-Recyle | Beranda</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a50e33a747.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">e-Recycle</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Homepage <?= $nama_user ?></li>
                    <li class="sidebar-item">
                        <a href="homepage.php" class="sidebar-link"> <i class="fa-solid fa-list pe-2"></i>Beranda </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="pengumuman.php" class="sidebar-link"> <i class="fa-solid fa-table pe-2"></i>Pengumuman </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="transaksi.php" class="sidebar-link"> <i class="fa-solid fa-table pe-2"></i>Transaksi </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="riwayat.php" class="sidebar-link"> <i class="fa-solid fa-clock-rotate-left pe-2"></i>Riwayat </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <i class="fa-solid fa-user fa-lg text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="logout.php" class="dropdown-item" onclick="return confirm('Yakin?')">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content Body -->
            <div class="container-fluid">
                <div class="card border-0">
                    <div class="card-header">
                        <h5 class="card-title">
                            Riwayat Transaksi
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Bayar</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if (mysqli_num_rows($transaksi) > 0) {
                                        while ($row = mysqli_fetch_array($transaksi)) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= ucwords($row['nama']); ?></td>
                                                <td class=""><?= $row['tanggal_bayar']; ?></td>
                                                <td><?= $row['status'] ?></td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="7" class="py-2 px-4">Tidak Ada Data</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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