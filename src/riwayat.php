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

$user_name = $_SESSION['a_global']->nama_user;

// Mengambil riwayat pembayaran untuk pengguna yang saat ini login
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE nama='$user_name' ORDER BY tanggal_bayar DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Recycle | Transaksi</title>
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

    <!-- MAIN -->
    <div class="container mt-4">
        <div class="bg-primary text-white px-2 py-4 mb-4 rounded">
            <h3 class="font-semibold">Riwayat Transaksi</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped bg-white rounded-lg shadow-md">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    if (mysqli_num_rows($transaksi) > 0) {
                        while ($row = mysqli_fetch_array($transaksi)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= ucwords($row['nama']); ?></td>
                                <td><?= $row['tanggal_bayar']; ?></td>
                                <td><?= ucwords($row['status']); ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="4" class="py-2 px-4">Tidak Ada Data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- MAIN END -->
</body>

</html>