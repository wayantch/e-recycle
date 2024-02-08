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

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon']; // Perubahan pada bagian ini
    $bukti_bayar = $_FILES['bukti']['name'];

    // Memindahkan file yang di-upload ke folder tujuan
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bukti"]["name"]);
    move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file);

    // Query untuk memasukkan data ke dalam database
    $insert = mysqli_query($conn, "INSERT INTO transaksi (nama, alamat, telp, bukti) VALUES ('$nama', '$alamat', '$telpon', '$bukti_bayar')");

    if ($insert) {
        echo '<script>alert("Pembayaran Dalam Proses")</script>';
    } else {
        echo '<script>alert("Pembayaran Gagal")</script>';
    }
}
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

    <div class="container mt-5">
        <h2 class="text-center mb-4">Transaksi</h2>
        <form action="" method="post" enctype="multipart/form-data"> <!-- Perubahan pada atribut form -->
            <div class="mb-3 text-center">
                <p><strong>Note: </strong>Masukkan jumlah harga sesuai dengan yang sudah tertera!</p>
                <img src="./image/Qr.jpg" width="200" class="mb-2">
                <p><strong>Rp 45.000</strong></p>
            </div>
            <hr class="my-4">
            <div class="mb-3">
                <label for="nama" class="form-label"><strong>Nama:</strong></label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($_SESSION['a_global']->nama_user) ?>" required>
            </div>
            <div class="mb-3">
                <label for="telpon" class="form-label"><strong>No HP:</strong></label>
                <input type="number" class="form-control" id="telpon" name="telpon" value="" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label"><strong>Alamat:</strong></label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label"><strong>Bukti Bayar:</strong></label>
                <input type="file" class="form-control" name="bukti" id="file" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Apakah data sudah sesuai?')">Bayar</button>
        </form>
        <hr class="my-4">
    </div>

    <footer class="footer mt-auto py-3 text-white">
        <div class="container text-center">
            <span class="text-muted">&copy; 2024 e-Recycle. All rights reserved.</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
