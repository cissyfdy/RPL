<div class="col-lg-3"> 
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-2 border ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      
      <div class="offcanvas-body">
        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1" >
        <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='Menu') ? 'active link-light' : 'link-dark' ;?> " aria-current="page" href="Menu.php?x=Menu"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
</svg>Menu</a>

          </li>

          <dic class = "slide">
          <li class="nav-item">
            <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='Order') ? 'active link-light' : 'link-dark' ;?> " href="Menu.php?x=Order">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='Customer') ? 'active link-light' : 'link-dark' ;?> " href="Menu.php?x=Customer">Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php echo (isset($_GET['x']) && $_GET['x']=='1') ? 'active link-light' : 'link-dark' ;?> " href="Menu.php?x=1"> Tar aku pikirin1 </a>
          <li class="nav-item">
            <a class="nav-link  <?php echo (isset($_GET['x']) && $_GET['x']=='2') ? 'active link-light' : 'link-dark' ;?> " href="Menu.php?x=2"> Tar aku pikirin2 </a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</div>