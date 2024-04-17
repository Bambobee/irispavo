<?php include 'root/process.php'; 

if (empty($_SESSION['user_id'])) {
    
}else{ 
    $user_id = $_SESSION['user_id'];
    // $status = $_SESSION['status'];
    $usergroup = $_SESSION['usergroup'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/irispavo/">
    <meta charset="utf-8">
    <title>IRIS PAVO - Real Estate Agency</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="<?=SITE_URL; ?>" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/logo_background.jpeg" alt="Icon" style="width: 50px; height: 50px;">
                    </div>
                    <h1 class="m-0 text-primary">IRIS PAVO</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="<?=SITE_URL; ?>" class="nav-item nav-link active">Home</a>
                        <a href="about" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="<?=$_SERVER['REQUEST_URI'];?>#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                            <div class="dropdown-menu rounded-0 m-0">
                            <!-- <a href="property_sale" class="dropdown-item">All Properties</a> -->
                            <?php $type = $dbh->query("SELECT * FROM property_type WHERE status = 'Active'");
                           while ($rxp = $type->fetch(PDO::FETCH_OBJ)) { ?>
                           <a href="property/<?=$rxp->property_type_id; ?>" class="dropdown-item"><?=$rxp->property_type_name; ?></a>
                           <?php } ?>
                            </div>
                        </div>
                        <a href="contact" class="nav-item nav-link">Contact</a>
                        <?php if (empty($_SESSION['user_id'])) { ?>
                            <a href="login" class="nav-item nav-link">Login</a>
                            <a href="register" class="nav-item nav-link">Register</a>
                        <?php }else{ ?>
                            <a href="<?=HOME_URL; ?>" class="nav-item nav-link">Dashboard</a>
                            <a href="logout" class="nav-item nav-link">Logout</a>
                        <?php } ?>
                    </div>
                    <a href="login" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->
