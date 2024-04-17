<?php include 'header.php'?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Subscription Package</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Subscription Package</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(16rem, 1fr)); gap: 1rem;">

<?php $user = $dbh->query("SELECT * FROM packages WHERE Status = 'Active'");
        if ($user->rowCount() > 0) {
            
            while ($rx = $user->fetch(PDO::FETCH_OBJ)) {?>
<div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; border-radius: 10px; background: #fff; padding: 2%">
    <h2 style="text-align: center;"><?=$rx->package_name ?></h2>
    <p style="text-align: center;">Plan description</p>
    <div style="text-align: center; border-top: 1px solid #000; border-bottom: 1px solid #000; padding-top: 15px; padding-bottom: 15px">
        <h3><?=$rx->currency ?> <?=$rx->package_amount ?> / <?=$rx->package_duration ?></h3>
    </div>
    <div style="padding: 10px;">
        <?=$rx->package_utilities ?>
    </div>
    <div style="display: flex; justify-content: center; width: 100%">
        <a href="#" style="color: #fff; background: #012970; width: 100%; text-align: center; padding: 8px; 
        border-radius: 5px;">Subscribe Now</a>
    </div>
</div>
<?php }} else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <h5><strong class="alert alert-danger text-center">No Package added yet !</strong></h5>
                    </div>
                </div>
            <?php } ?>
</div>

</main>

<?php include 'footer.php'?>