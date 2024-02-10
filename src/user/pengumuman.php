<?php
session_start();


if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}

$nama_user = isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : '';

require 'db.php';

$query = mysqli_query($conn, "SELECT * FROM users");

if (isset($_SESSION['nama_user'])) {
  $nama_user = $_SESSION['nama_user'];
}

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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>e-Recyle | Pengumuman</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <!-- My CSS -->
  <link rel="stylesheet" href="../css/style.css" />
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
          <li class="sidebar-header">Homepage <?= $nama_user ?></li>
          <li class="sidebar-item">
            <a href="homepage.php" class="sidebar-link"> <i class="fa-solid fa-list pe-2"></i>Beranda </a>
          </li>
          <li class="sidebar-item">
            <a href="pengumuman.php" class="sidebar-link collapsed"> <i class="fa-solid fa-table pe-2"></i>Pengumuman</a>
          </li>
          <li class="sidebar-item">
            <a href="transaksi.php" class="sidebar-link collapsed"> <i class="fa-solid fa-table pe-2"></i>Transaksi</a>
          </li>
          <li class="sidebar-item">
            <a href="riwayat.php" class="sidebar-link collapsed"> <i class="fa-solid fa-clock-rotate-left pe-2"></i>Riwayat </a>
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
                <a href="logout.php" class="dropdown-item" onclick="return confirm('Yakin?')">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <main class="content px-3 py-2">
        <div class="container-fluid">
          <!-- Table Element -->
          <div class="card border-0">
            <div class="card-header">
              <h5 class="card-title">Pengumuman e-Recycle</h5>
              <h6 class="card-subtitle text-muted">📢 Pengumuman Penting: Pembayaran Pembuangan Sampah</h6>
              <p class="pt-2">
              <pre>
Hai semua tetangga!

Kami ingin mengingatkan bahwa mulai bulan ini, pembayaran pembuangan sampah akan dilakukan sebanyak 2 kali dalam sebulan. 
Pembayaran ini akan dilakukan secara online melalui platform e-Recycle.

Detail pembayaran:

Jumlah pembayaran: Rp 50.000,- per bulan
Jadwal pembayaran: 2 kali dalam sebulan (Tanggal 2 dan 27)
                
Dengan menggunakan e-Recycle, Anda dapat melakukan pembayaran dengan mudah dan nyaman tanpa harus repot membawa uang tunai. 
Jangan lupa untuk melakukan pembayaran tepat waktu agar proses pembuangan sampah dapat berjalan lancar.

Terima kasih atas partisipasi dan kerjasamanya!
                </pre>
              </p>
              <img src="../image/banner-1.png" width="100%">
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