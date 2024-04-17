<?php include 'header.php'?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Verification</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Verification</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
<div class="card mb-3">

<div class="card-body">

  <div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Verify your account</h5>
    <p class="text-center small">Enter your personal details to verify your account</p>
  </div>

  <form class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">
    <input type="hidden" name='user_id' value="<?=$user_id; ?>">
    <div class="col-12">
      <label for="yourName" class="form-label">National ID NIN number</label>
      <input type="text" name="national_Id" class="form-control" id="yourName" required>
    </div>
    <div class="col-12">
      <label for="yourName" class="form-label">Telphone contact</label>
      <input type="text" name="contact" class="form-control" id="yourName" required>
    </div>
    <div class="col-12">
      <label for="yourName" class="form-label">Whatsapp contact</label>
      <input type="text" name="whatsApp" class="form-control" id="yourName" required>
    </div>
    <div class="col-12">
      <label for="yourName" class="form-label">Current Location</label>
      <input type="text" name="location" class="form-control" id="yourName" required>
    </div>
    <div class="col-12">
      <label for="yourEmail" class="form-label">Upload your Picture</label>
      <input type="file" name="image" class="form-control" id="yourEmail" required>
    </div>

    <div class="col-12">
      <label  class="form-label">Upload your National ID NIN number Picture</label>
      <input type="file" name="national_id_photo" class="form-control" id="yourEmail" required>
    </div>
    <div class="text-center">
                  <button type="submit" name="verify_btn" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                  
                </div>
 
  </form>

</div>
</div>
</section>


</main>

<?php include 'footer.php'?>