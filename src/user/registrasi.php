<?php
require './db.php';
?>
<?php
if (isset($_POST['submit'])) {
    $nama = ucwords($_POST['nama']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $perumahan = ucwords($_POST['perumahan']);
    $blok = ucwords($_POST['blok']);
    $rt = $_POST['rt'];
    $enkripsi = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        echo "<script>alert('Username sudah digunakan')</script>";
    } else {
        $queryInsert = mysqli_query($conn, "INSERT INTO users (nama_user, username, password, email, perumahan, blok, rt) VALUES ('$nama', '$username', '$enkripsi', '$email', '$perumahan', '$blok', '$rt')");

        if ($queryInsert) {
            echo "<script>alert('Berhasil Daftar')</script>";
            echo '<script>window.location="login.php";</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Recycle</title>
    <!-- TAILWINDCSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-gray-100">

    <div class="container flex items-center justify-center  ">
        <div class="md:w-1/2 lg:w-1/3">
            <div class="bg-white p-8 rounded-md shadow-md">
                <div class="flex items-center">
                    <a href="../index.php" class="text-blue-500 text-lg"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
                    <h2 class="text-center text-2xl font-bold mx-auto">Daftar</h2>
                </div>
                <form method="post" action="" class="mt-4">
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-600">Nama:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="nama" name="nama" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="username" name="username" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                        <input type="password" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="password" name="password" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                        <input type="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="perumahan" class="block text-sm font-medium text-gray-600">Perumahan:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="perumahan" name="perumahan" required>
                    </div>
                    <div class="mb-4">
                        <label for="blok" class="block text-sm font-medium text-gray-600">Blok:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="blok" name="blok" required>
                    </div>
                    <div class="mb-4">
                        <label for="rt" class="block text-sm font-medium text-gray-600">Rt:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="rt" name="rt" required>
                    </div>
                    <button type="submit" name="submit" id="tombol" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md"><i class="fas fa-sign-in-alt"></i> Daftar</button>
                    <hr class="my-4">
                    <div class="text-sm text-left register-link">
                        Sudah punya akun? <a href="login.php" class="text-blue-500 hover:underline">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


</html>
