<?php 
include 'header.php';
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">
    <?php $perm = dbRow("SELECT * FROM users WHERE user_id='".$user_id."' "); ?>

    <?php  if((($perm->usergroup == 'Brocker') || ($perm->usergroup == 'Property Owner')) && ($perm->status == 'Inactive')){ ?>
      
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<a href="verification" class="btn btn-danger rounded-pill">Verify</a> <span>Please verify your account to continue, Click the button!</span>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<?php  if(($perm->usergroup == 'SuperAdmin') || ($perm->usergroup == 'Admin')){ ?>
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
             <a href="user">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                    <?php $user = $dbh->query("SELECT * FROM users WHERE usergroup='admin' ")->rowCount(); ?>
                      <h6><?=$user; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
             </a>
            </div><!-- End Sales Card -->

            <!-- End Revenue Card -->
            <?php } ?>

              <div class="col-xxl-4 col-xl-4">
            <a href="categories">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Categories</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bookmark"></i>
                    </div>
                    <div class="ps-3">
                    <?php $cat = $dbh->query("SELECT * FROM property_category  ")->rowCount(); ?>
                      <h6><?=$cat; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
         
            <!-- Customers Card -->
            

            <div class="col-xxl-4 col-xl-4">
             <a href="propertyType">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Property Types</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                    <?php $type = $dbh->query("SELECT * FROM property_type ")->rowCount(); ?>
                      <h6><?=$type; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
             </a>
            </div>

            <?php  if(($perm->usergroup == 'Brocker') || ($perm->usergroup == 'Property Owner')){ ?>

              <div class="col-xxl-4 col-xl-4">
             <a href="property">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">My Properties</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-diagram-2"></i>
                    </div>
                    <div class="ps-3">
                    <?php $property = $dbh->query("SELECT * FROM properties WHERE user_id='".$user_id."'")->rowCount(); ?>
                      <h6><?=$property; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
             </a>
            </div>

            <?php } ?>

            <?php  if(($perm->usergroup == 'SuperAdmin') || ($perm->usergroup == 'Admin')){ ?>

            <div class="col-xxl-4 col-xl-4">
             <a href="property">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Properties</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-diagram-2"></i>
                    </div>
                    <div class="ps-3">
                    <?php $property = $dbh->query("SELECT * FROM properties ")->rowCount(); ?>
                      <h6><?=$property; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
             </a>
            </div>

            <?php } ?>
            <?php  if(($perm->usergroup == 'SuperAdmin') || ($perm->usergroup == 'Admin')){ ?>
            <div class="col-xxl-4 col-xl-4">
            <a href="brocker">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Brokers</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                    <?php $brock = $dbh->query("SELECT * FROM users WHERE usergroup != 'admin'")->rowCount(); ?>
                      <h6><?=$brock; ?></h6>
                    
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <?php } ?>
            <!-- <div class="col-xxl-4 col-xl-4">
             <a href="#">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Reports</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="ps-3">
                    </div>
                  </div>
                </div>
              </div>
             </a>
            </div> -->
            <!-- End Customers Card -->
          </div>
        </div><!-- End Left side columns -->

        <!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


  <?php include 'footer.php' ?>