<?php
session_start();
require 'db.php';

if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $user_data = mysqli_fetch_assoc($query);
        $role = $user_data['role'];
        $nama_user = $user_data['nama_user']; 

        $_SESSION['login'] = true;
        $_SESSION['a_global'] = (object) $user_data;
        $_SESSION['id'] = $user_data['username'];
        $_SESSION['nama_user'] = $nama_user;
        $_SESSION['log'] = 'logged';
        $_SESSION['role'] = $role;

        if ($role == 1) {
            header('Location: dasboard.php');
        } else {
            header('Location: homepage.php');
        }
        exit;
    } else {
        echo '<script>alert("Username tidak ditemukan!")</script>';
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

    <div class="container flex items-center justify-center h-screen">
        <div class="md:w-1/2 lg:w-1/3">
            <div class="bg-white p-8 rounded-md shadow-md">
                <div class="flex items-center">
                    <a href="../index.php" class="text-blue-500 text-lg"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
                    <h2 class="text-center text-2xl font-bold mx-auto">Login</h2>
                </div>
                <form method="post" action="" class="mt-4">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                        <input type="text" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="username" name="username" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                        <input type="password" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" id="tombol" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <hr class="my-4">
                    <div class="text-sm text-left register-link">
                        Belum punya akun? <a href="./registrasi.php" class="text-blue-500 hover:underline">Daftar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
