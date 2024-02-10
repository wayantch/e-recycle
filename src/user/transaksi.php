<?php
session_start();
require 'db.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}
$user_name = isset($_SESSION['nama_user']) ? $_SESSION['nama_user'] : '';
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


if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telpon = $_POST['telpon'];
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>e-Recyle | Transaksi</title>
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
          <!-- Form Element -->
          <div class="card border-0">
            <div class="card-header">
              <h5 class="card-title">Transaksi</h5>
              <div class="mb-3 text-center">
                <img src="./image/Qr.jpg" width="200">
                <p><strong>Note:</strong> Masukan jumlah yang sudah tertera</p>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3 shadow-lg">
                  <input type="hidden" class="form-control" id="nama" name="nama" value="<?php echo $nama_user ?>" required/>
                </div>
                <div class="mb-3 shadow-lg">
                  <label for="telpon" class="form-label">No Hp :</label>
                  <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Masukan No HP" required/>
                </div>
                <div class="mb-3 shadow-lg">
                  <label for="alamat" class="form-label">Alamat :</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Perumahan Mekar Jaya Blok A No 1" required></textarea>
                </div>
                <div class="mb-3 shadow-lg">
                  <label for="bukti" class="form-label">Bukti Bayar</label>
                  <input class="form-control" type="file" id="bukti" name="bukti" required/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Bayar</button>
                <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
              </form>
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