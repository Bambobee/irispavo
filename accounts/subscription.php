<?php include 'header.php'?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Subscription</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Subscription</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
      <!-- Button trigger modal -->
            <div style="display: flex; justify-content: end; padding: 8px;  ">
            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#UserModal">
            Add Subscription
            </button>
            </div>
                  <!-- Table with stripped rows -->
        
          <table class="table datatable">
          <?php $user = $dbh->query("SELECT * FROM packages");
        if ($user->rowCount() > 0) {
          $SN = 1;  ?>
            <thead>
              <tr>
              <th>
                  #S.N
                </th>
                <th>
                  Package
                </th>
                <th>Duration</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            
            <tbody>
            <?php while ($rx = $user->fetch(PDO::FETCH_OBJ)) { ?>
              <tr>
              <td><?=$SN++; ?></td>
                <td><?=$rx->package_name ?></td>
                <td><?=$rx->package_duration ?></td>
                <td><?=$rx->package_amount ?></td>
                <td><?=$rx->Status ?></td>
                <td>
                <div class="dropdown">
                    <button class="btn  btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#view<?=$rx->package_id; ?>">View</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#edit<?=$rx->package_id; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="?delete-sub=<?=$rx->package_id; ?>">Delete</a></li>
                    </ul>
                    </div>
                </td>
              </tr>
              <?php
              include 'view_subscription.php';
            include 'edit-packages.php'; } ?>
            </tbody>
              <!-- End Table with stripped rows -->
          <?php } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <h5><strong class="alert alert-danger text-center">No Package added yet !</strong></h5>
                    </div>
                </div>
            <?php } ?>
          </table>

        

        </div>
      </div>

    </div>
  </div>
</section>



<!-- Modal -->
<div class="modal fade" id="UserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Package Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div >
            <div class="card-body">
              <!-- Vertical Form -->
              <form class="row g-3" method="post">
              <div class="col-12 row g-3">
                <div class="col-6">
                <!-- package_name	package_duration	package_amount	Status	package_utilities -->
                  <label for="inputNanme4" class="form-label">Package Name</label>
                  <input type="text" name="package_name" class="form-control" id="inputNanme4">
                </div>
                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Duration</label>
                  <input type="text" placeholder="e.g Monthly, Annualy" name="package_duration" class="form-control" id="inputNanme4">
                </div>
                </div>

                <div class="col-12">
                  <label class="form-label">Select Currency</label>
                  <div>
                    <select class="form-select" name="currency" >
                    <option value="USD">US Dollar</option>
                      <option value="UGS">UG Shillings</option>
                    </select>
                  </div>
                </div>

                <div class="col-12 g-3 row">
                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Amount</label>
                  <input type="text" name="package_amount" class="form-control" id="inputNanme4">
                </div>
                <div class="col-6">
                  <label class="form-label">Select Status</label>
                  <div>
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
                </div>
                </div>
                
                <div class="col-12">
                <label for="message">Package Utilities</label>
                 <div class="quform-input">
                    <textarea name="package_utilities" id="packages" required>Enter the Utilities to the packages</textarea>
                     <script>
                     CKEDITOR.replace('packages');
                     </script>
                </div>
            </div>
                <div class="text-center">
                  <button type="submit" name="add_packages" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


      </div>
    </div>
  </div>
</div>

</main>

<?php include 'footer.php'?>