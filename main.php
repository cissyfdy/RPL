<?php
    // session_start();
    if(empty($_SESSION['username_belcafe'])){
        header('location:login');
    }
    include "proses/connect.php";
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_belcafe]' ");
    $hasil = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Die Gaststätte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
<div
  class="PoinBG"
  style="background-image: url('assets/img/bgrestoran.jpg'); height: 100vh"> 

    <?php include "header.php"; ?>
    <!-- Header -->

    <!-- End Header -->
    <div class="container-lg bg-dark mt-2 rounded">
        <div class="row mb-5">
            <!-- Sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- End Sidebar -->

            <!-- Content -->
                <?php
                if(isset($_GET['x']) && $_GET['x']=='home'){
                    include $page;
                }elseif(isset($_GET['x']) && $_GET['x']=='order'){
                    include "order.php";
                }elseif(isset($_GET['x']) && $_GET['x']=='menu'){
                    include "menu.php";
                }elseif(isset($_GET['x']) && $_GET['x']=='dapur'){
                    include "dapur.php";
                }elseif(isset($_GET['x']) && $_GET['x']=='report'){
                    include "report.php";
                }elseif(isset($_GET['x']) && $_GET['x']=='user'){
                    include "user.php";
                }elseif(isset($_GET['x']) && $_GET['x']=='orderitem'){
                    include "order_item.php";
                // HERE
                }elseif(isset($_GET['x']) && $_GET['x']=='meja'){
                    include "meja.php";
                // HERE
                }else{
                    include "home.php";
                }
                ?>
            <!-- End Content -->
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        
        <script>
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

</script>
<script>
    $(document).ready( function () {
    $('#example').DataTable();
} );
</script>
</body>

</html>