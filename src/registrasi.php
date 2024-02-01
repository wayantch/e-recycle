<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Recycle</title>
    <!-- TAILWINDCSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">

    <div class="container flex items-center justify-center h-screen">
        <div class="max-w-md w-full">
            <div class="bg-white p-8 rounded-md shadow-md">
                <div class="flex items-center">
                    <a href="index.php" class="text-blue-500 text-lg"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
                    <h2 class="text-center text-2xl font-bold mx-auto">Daftar</h2>
                </div>
                <form method="post" class="mt-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Nama:</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                        <input type="text" id="username" name="username" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                        <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fas fa-user-plus"></i> Daftar</button>
                    <hr class="my-4">
                    <div class="text-sm text-left">
                        Sudah punya akun? <a href="./login.php" class="text-blue-500">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
