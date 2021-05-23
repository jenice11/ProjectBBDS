<head>
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome Icons -->
 <link rel="stylesheet" href="ExternalCSS/plugins/fontawesome-free/css/all.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="ExternalCSS/adminlte.min.css">
</head>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../manageLoginAndRegister/userLogin.php" class="nav-link">Logout</a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-2">
  <!-- Brand Logo -->
  <a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>" class="brand-link">
    <img src="Image/largerlogo.png" alt="BBDS Logo" class="brand-image img-circle elevation-2">
    <span class="brand-text font-weight-light">BBDS</span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
             <a href="../../ApplicationLayer/manageUserProfile/serviceproviderProfile.php?spID=<?=$_SESSION['spID']?>" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>My Account</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           
           <li class="nav-item">
            <a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>List of Services</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="./serviceProviderServiceAdd.php?spID=<?=$_SESSION['spID']?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Add New Service
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../ApplicationLayer/manageTracking/serviceProviderNotification.php?spID=<?=$_SESSION['spID']?>"" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              <p>
                View Incoming Order
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../ApplicationLayer/manageTracking/serviceProviderSales.php?spID=<?=$_SESSION['spID']?>" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Sales Dashboard
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


