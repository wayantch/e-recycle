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
            <a href="pengumuman.php" class="sidebar-link collapsed"> <i class="fa-solid fa-table pe-2"></i>Pengumuman </a>
          </li>
          <li class="sidebar-item">
            <a href="transaksi.php" class="sidebar-link collapsed"> <i class="fa-solid fa-table pe-2"></i>Transaksi </a>
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
          <h4>Tentang e-Recycle</h4>
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">Apa keuntungan utama menggunakan sistem pembayaran online seperti e-Recycle?</button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  Sistem pembayaran online seperti e-Recycle memberikan kemudahan bagi pengguna dalam melakukan pembayaran tanpa harus menggunakan uang tunai secara fisik. Ini memungkinkan transaksi yang lebih cepat, lebih aman, dan lebih nyaman.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">Bagaimana e-Recycle menyederhanakan proses pembayaran pembuangan sampah?</button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Dengan e-Recycle, pengguna dapat melakukan pembayaran pembuangan sampah secara online dengan mudah melalui platform yang intuitif. Ini mengurangi kerumitan administrasi dan memungkinkan pengguna untuk melacak riwayat pembayaran dengan lebih baik.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  Apa dampak positif dari penggunaan e-Recycle dalam hal pembayaran pembuangan sampah?
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Penggunaan e-Recycle untuk pembayaran pembuangan sampah dapat membantu mengurangi penggunaan uang tunai fisik, mengurangi risiko kehilangan atau pencurian uang, serta meningkatkan efisiensi dalam manajemen pembayaran di lingkungan perumahan.
                </div>
              </div>
              <img src="../image/homepage.png" width="100%">
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