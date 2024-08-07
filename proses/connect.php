<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'die gaststatte');
    if(!$conn)
        // Jika koneksi gagal
        echo 'Gagal terhubung ke database: ' . mysqli_connect_error();
?>
