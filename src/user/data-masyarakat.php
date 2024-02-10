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

$query = mysqli_query($conn, "SELECT * FROM transaksi ");
if ($query) {
    $user = mysqli_fetch_object($query);
} else {
    die(mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Recycle | Data Transaksi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a50e33a747.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Bagian Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">e-Recycle</a>
                </div>
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
        <div class="main">
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
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Data Masyarakat</h4>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Masyarakat yang terdaftar
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Perumahan</th>
                                            <th scope="col">Blok</th>
                                            <th scope="col">Rt</th>
                                            <th scope="col" class="text-center">Tanggal Login</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $transaksi = mysqli_query($conn, "SELECT * FROM users ORDER BY  id ASC");
                                        if (mysqli_num_rows($transaksi) > 0) {
                                            while ($row = mysqli_fetch_array($transaksi)) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= ucwords($row['nama_user']); ?></td>
                                                    <td><?= ucwords($row['perumahan']); ?></td>
                                                    <td><?= ucwords($row['blok']); ?></td>
                                                    <td><?= ucwords($row['rt']); ?></td>
                                                    <td class="text-center"><?= $row['tanggal_login']; ?></td>
                                                    <td class="text-center">
                                                        <a href="hapus.php?idm=<?php echo $row['id'] ?>">
                                                            <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </a>
                                                    </td>
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