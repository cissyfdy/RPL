<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'belcafe');
    if(!$conn)
        // Jika koneksi gagal
        echo 'Gagal terhubung ke database: ' . mysqli_connect_error();
?>
