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

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .profile-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 50px;
            background-color: #fff;
        }

        .profile-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .profile-form input[type="text"],
        .profile-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .profile-form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .profile-form button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            color: black;
        }
    </style>
</head>

<body>
    <!-- MAIN -->
    <div class="container profile-container">
        <a href="dasboard.php" class="text-blue-500 text-lg"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
        <h2>Profil</h2>
        <div class="profile-form">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($_SESSION['a_global']->nama_user); ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="<?php echo $_SESSION['a_global']->username ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password Baru... (Opsional)" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-secondary" onclick="return confirm('Yakin untuk mengubah profil?')"><i class="fa-solid fa-floppy-disk mr-2"></i>Simpan</button>

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
    <!-- MAIN END -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
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

