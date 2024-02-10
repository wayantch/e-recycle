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

// Jika tombol ceklis ditekan
if (isset($_POST['btn_sukses']) && isset($_POST['id_transaksi'])) {
    $id_transaksi = $_POST['id_transaksi'];

    // Perbarui status transaksi menjadi "Sukses"
    $update_query = mysqli_query($conn, "UPDATE transaksi SET status = 'Sukses' WHERE id = $id_transaksi");

    if ($update_query) {
        // Redirect atau lakukan tindakan lain setelah memperbarui status
        header('Location: data-transaksi.php');
        exit;
    } else {
        echo "Gagal memperbarui status transaksi.";
    }
}

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
    <title>e-Recyle | Data Transaksi</title>
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
                            <a href="" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
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
                        <h4>Data Transaksi</h4>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Riwayat Pembayaran
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">No Hp</th>
                                            <th scope="col">Bukti</th>
                                            <th scope="col" class="text-center">Tanggal Bayar</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $transaksi = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY  id DESC");
                                        if (mysqli_num_rows($transaksi) > 0) {
                                            while ($row = mysqli_fetch_array($transaksi)) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= ucwords($row['nama']); ?></td>
                                                    <td><?= ucwords($row['alamat']); ?></td>
                                                    <td><?= $row['telp']; ?></td>
                                                    <td><a href="bukti.php?id=<?= $row['id'] ?>"><img src="../uploads/<?= $row['bukti'] ?>" width="50"></a></td>
                                                    <td class="text-center"><?= $row['tanggal_bayar']; ?></td>
                                                    <td class="text-center">
                                                        <!-- Form untuk tombol ceklis -->
                                                        <form method="post">
                                                            <form method="post">
                                                                <input type="hidden" name="id_transaksi" value="<?= $row['id'] ?>">
                                                                <button type="submit" name="btn_sukses" class="btn btn-success <?= $row['status'] == 'Sukses' ? 'disabled' : '' ?>" onclick="return confirm('Yakin?')" <?= $row['status'] == 'Sukses' ? 'disabled' : '' ?>>
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                            </form>
                                                            <style>
                                                                .btn.disabled {
                                                                    cursor: not-allowed;
                                                                    background-color: #e9ecef;
                                                                    border-color: #e9ecef;
                                                                    color: #6c757d;
                                                                }
                                                            </style>
                                                        </form>

                                                        <!-- Tombol hapus -->
                                                        <a href="hapus.php?idh=<?php echo $row['id'] ?>">
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