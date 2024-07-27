<?php 
/* session_start()
if(empty($_SESSION['username_Die Gaststätte'])) {
  header('location:login');
} */
?> 


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Die Gaststätte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  
  <!--Header -->
  <body>  
  <div
  class="PoinBGHOME"
  style="background-image: url('img/bgrestoran.jpg'); height: 100vh">

<?php include "header.php"; ?>
<!--End Header -->

<div class="container-lg">
  <div class="row">
<p>

<!--sidebar -->

<?php include "sidebar.php"; ?>

<?php

if (isset($_GET['x']) && $_GET['x']=='Menu') {
      include "Menu2.php";
}elseif(isset($_GET['x']) && $_GET['x']=='Order') {
  include "Order.php";
}elseif(isset($_GET['x']) && $_GET['x']=='Customer') {
  include "Customer.php";
}elseif(isset($_GET['x']) && $_GET['x']=='1') {
  include "1.php";
}elseif(isset($_GET['x']) && $_GET['x']=='2') {
  include "2.php";
}elseif(isset($_GET['x']) && $_GET['x']=='login') {
  include "login.php";
}elseif(isset($_GET['x']) && $_GET['x']=='logout') {
  include "proses/logout.php";
}else {
  include "Menu";
}
?>


    </div>

  </div>
</div>

<!-- end sidebar -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>