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

$query = mysqli_query($conn, "SELECT * FROM users ");
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
    <title>Data Transaksi - Recycle</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
                            <a class="nav-link text-white" href="dasboard.php">
                                <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
                            </a>
                        </li>
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
    <div class="container">
        <div class="bg-primary text-white px-2 py-4 mb-4 mt-4 rounded">
            <h3 class="font-semibold">Data Masyarakat</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped bg-white rounded-lg shadow-md">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Perumahan</th>
                        <th scope="col">Blok</th>
                        <th scope="col">Rt</th>
                        <th scope="col">Tanggal Login</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $transaksi = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
                    if (mysqli_num_rows($transaksi) > 0) {
                        while ($row = mysqli_fetch_array($transaksi)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_user']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['perumahan']; ?></td>
                                <td><?= $row['blok']; ?></td>
                                <td><?= $row['rt']; ?></td>
                                <td><?= $row['tanggal_login']; ?></td>
                                <td>
                                    <button class="btn btn-success">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
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
                            <td colspan="8" class="py-2 px-4">Tidak Ada Data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- MAIN END -->

    <!-- FOOTER -->
    <footer class="ml-56">
        <hr>
        <div class="container p-4">
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