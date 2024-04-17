<?php include '../root/process.php'; 
if (empty($_SESSION['user_id']) ) {
  header("Location: ".SITE_URL.'login');
}else{
  //`userid`, `role`, `account_status`, `phone`, `regno`, `password`, `token`, `date_registered`
  $user_id = $_SESSION['user_id'];
  $name = $_SESSION['name'];
  // $password = $_SESSION['password'];
  $email = $_SESSION['email'];
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <base href="http://localhost/irispavo/accounts/">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>IRIS PAVO - Real Estate Agency</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="<?=HOME_URL; ?>" class="logo d-flex align-items-center">
        <img src="../img/logo_background.jpeg" alt="">
        <span class="d-none d-lg-block">IRIS PAVO</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <!-- End Messages Nav -->
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php $type = dbRow("SELECT * FROM users WHERE user_id='".$user_id."' "); ?>
          <?php 
              if(empty($type->image)){ ?>
              <img src="../img/default-avatar.png" class="rounded-circle" alt="">
          <?php  }else{ ?>
              <img src="<?=$type->image; ?>" class="rounded-circle" alt="">
          <?php } ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$type->name; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$type->name; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" href="#viewProfile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <?php
            if(($type->usergroup == 'Brocker') || ($type->usergroup == 'Property Owner')){?>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" href="#UpdateProfile">
                <i class="bi bi-gear"></i>
                <span>Update Account</span>
              </a>
            </li>
            <?php }?>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" href="#changePassword">
                <i class="bi bi-lock"></i>
                <span>Change Password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=SITE_URL; ?>logout" onclick="return confirm('Do you really want to Logout ? '); ">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?=HOME_URL; ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <!-- End Register Page Nav -->
      <?php
      if(($type->usergroup == 'SuperAdmin') || ($type->usergroup == 'Admin')){?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="user">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="propertyType">
          <i class="bi bi-collection"></i>
          <span>Property Type</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="categories">
          <i class="bi bi-bookmark"></i>
          <span>categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="subscription">
          <i class="bi bi-diagram-2"></i>
          <span>Subscription</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-navs" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Brokers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-navs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="brocker">
            <?php $bdb = $dbh->query("SELECT * FROM users WHERE usergroup != 'Admin' && verification = 'Verified' ")->rowCount(); ?>
              <i class="bi bi-circle"></i><span>Verified</span>&nbsp;&nbsp;  <span class="badge bg-success"><?=$bdb; ?></span>
            </a>
          </li>
          <li>
            <a href="pending">
            <?php $bdss = $dbh->query("SELECT * FROM users WHERE usergroup != 'Admin' && verification = 'Pending' ")->rowCount(); ?>
              <i class="bi bi-circle"></i><span>Pending Verifications</span>&nbsp;&nbsp;  <span class="badge bg-info"><?=$bdss; ?></span>
            </a>
          </li>
          <li>
            <a href="banned">
            <?php $ban = $dbh->query("SELECT * FROM users WHERE usergroup != 'Admin' && verification = 'Banned' ")->rowCount(); ?>
              <i class="bi bi-circle"></i><span>Banned</span>&nbsp;&nbsp; <span class="badge bg-danger"><?=$ban; ?></span>
            </a>
          </li>

        </ul>
      </li>

      
      <?php }
      ?>

      <?php 
       
      if(($type->usergroup == 'Brocker') || ($type->usergroup == 'Property Owner')) {?>

      <?php
      if($type->status == 'Active'){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="property">
          <i class="bi bi-diagram-2"></i>
          <span>Properties</span>
        </a>
      </li>

        
      <li class="nav-item">
        <a class="nav-link collapsed" href="subscriptionPackages">
          <i class="bi bi-diagram-2"></i>
          <span>Subscription Packages</span>
        </a>
      </li>
    <?php  }
      ?>
      
      <?php
      if($type->status == 'Inactive'){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="verification">
          <i class="bi bi-collection"></i>
          <span>KYC verification</span>
        </a>
      </li>
      <?php  }
      ?>

      <?php
      if($type->status == 'Active'){ ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Subscription Report</span>
            </a>
          </li>
          
        </ul>
      </li>
        
    
      <?php }}
      ?>
  


      <!-- End Error 404 Page Nav -->

      <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->