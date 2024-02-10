<?php
require 'db.php';

if(isset($_GET['idh'])){
    $delete = mysqli_query($conn, "DELETE FROM transaksi WHERE id= '".$_GET['idh']."'");
    echo "<script>alert('Berhasil di hapus!')</script>";
    echo "<script>window.location='data-transaksi.php'</script>";
}

if(isset($_GET['idm'])){
    $delete = mysqli_query($conn, "DELETE FROM users WHERE id= '".$_GET['idm']."'");
    echo "<script>alert('Berhasil di hapus!')</script>";
    echo "<script>window.location='data-masyarakat.php'</script>";
}