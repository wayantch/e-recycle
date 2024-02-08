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
    <title>Profil - Recycle</title>
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

    <!-- SECTION -->
    <div class="container">
        <div class="bg-primary text-white p-4 mb-4 mt-4 rounded">
            <h3 class="font-semibold">Profil - <?php echo ucwords($_SESSION['a_global']->nama_user); ?></h3>            
        </div>
        <div class="mt-3">
            <form action="" method="post" class="max-w-md">
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-600">Nama:</label>
                    <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($_SESSION['a_global']->nama_user); ?>" class="mt-1 form-control">
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                    <input type="text" name="username" id="username" value="<?php echo $_SESSION['a_global']->username ?>" class="mt-1 form-control">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Masukan Password Baru... (Opsional)" class="mt-1 form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Yakin untuk mengubah profil?')"><i class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $enkripsi = password_hash($password, PASSWORD_DEFAULT);

                $update = mysqli_query($conn, "UPDATE users SET
                nama_user = '" . $nama . "',
                username = '" . $username . "',
                password = '" . $enkripsi . "'
                WHERE id = '" . $user->id . "'
                ");
                if ($update) {
                    echo "<script>alert('Ubah data berhasil')</script>";
                    echo "<script>window.location='logout.php'</script>";
                } else {
                    echo "Gagal " . mysqli_error($conn);
                }
            }
            ?>

        </div>
    </div>
    <!-- SECTION END -->

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