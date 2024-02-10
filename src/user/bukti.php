<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f4f4f4;
        }

        .container {
            padding-top: 50px;
            text-align: center;
        }

        .bukti-img {
            max-width: 300px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Transaksi</div>
                    <div class="card-body">
                        <?php
                        require 'db.php';

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $bukti = mysqli_query($conn, "SELECT bukti FROM transaksi WHERE id = '$id'");

                            if (!$bukti) {
                                // Jika query gagal dieksekusi
                                echo "Error: " . mysqli_error($conn);
                            } else {
                                $cek = mysqli_fetch_object($bukti);
                                if ($cek) {
                                    // Jika data ditemukan
                        ?>
                                    <img src="../uploads/<?= $cek->bukti ?>" alt="Bukti Transaksi" class="bukti-img">
                        <?php
                                } else {
                                    // Jika data tidak ditemukan
                                    echo "<p class='text-danger'>Data tidak ditemukan.</p>";
                                }
                            }
                        } else {
                            // Jika parameter id tidak diberikan
                            echo "<p class='text-danger'>Parameter id tidak diberikan.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <a href="data-transaksi.php" class="btn btn-primary mt-3"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
