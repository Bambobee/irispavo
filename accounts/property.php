<?php include 'header.php';?>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Property</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Property</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
<div class="col-lg-12">
  <div class="row">  

  <div class="col-xxl-4 col-md-4">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Properties Available</h5>
        <div class="d-flex align-items-center">
          <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-person"></i>
          </div> -->
          <div class="ps-3">
          <?php $userz = $dbh->query("SELECT * FROM properties WHERE status='Available' AND user_id = '$user_id' ")->rowCount(); ?>
            <h6><?=$userz; ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xxl-4 col-md-4">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Properties Taken</h5>
        <div class="d-flex align-items-center">
          <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-person"></i>
          </div> -->
          <div class="ps-3">
          <?php $userxz = $dbh->query("SELECT * FROM properties WHERE status='Taken' AND user_id = '$user_id' ")->rowCount(); ?>
            <h6><?=$userxz; ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
      <!-- Button trigger modal -->
            <div style="display: flex; justify-content: end; padding: 8px;  ">
            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#UserModal">
            Add Property
            </button>
            </div>
         <?php $user = $dbh->query("SELECT * FROM properties WHERE user_id = '$user_id' ");
          if ($user->rowCount() > 0) {
          $SN = 1;  ?>
          <table class="table datatable">
            <thead>
              <tr>
              <th>
                 #S.N
                </th>
                <th>
                 Property Name
                </th>
                <th>Property Type</th>
                <th>Property Category</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
          
            <tbody>
            <?php while ($rx = $user->fetch(PDO::FETCH_OBJ)) { ?>
              <tr>
                <td><?=$SN++; ?></td>
                <td><?=$rx->property_name; ?></td>
                <?php $typ = dbRow("SELECT * FROM property_type WHERE property_type_id='".$rx->property_type_id."' "); ?>
                <td><?=$typ->property_type_name ?></td>
                <?php $cat = dbRow("SELECT * FROM property_category WHERE category_id = '".$rx->category_id ."'"); ?>
                <td><?=$cat->category_name ?></td>
                <td><?=$rx->status; ?></td>
                <td>
                <div class="dropdown">
                    <button class="btn  btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#view<?=$rx->property_id; ?>">View</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#edit<?=$rx->property_id; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="?delete-pro=<?=$rx->property_id; ?>">Delete</a></li>
                    </ul>
                    </div>
                </td>
              </tr>
              <?php
            include 'view_property.php'; 
            include 'edit_property.php'; } ?>
            </tbody>
          </table>
            <?php } else { ?>
              <div class="row">
                  <div class="col-md-12">
                      <h5 class="alert alert-danger text-center"><b>No Property added yet !</b></h5>
                  </div>
              </div>
            <?php } ?>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- property_id	property_name	category_id	property_type_id	city	location	price	land_measurements	bed_rooms	bathrooms	property_image	property_description -->

<!-- Modal -->
<div class="modal fade" id="UserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Property Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div >
            <div class="card-body">
              <!-- Vertical Form -->
        <form method="POST" class="row g-3" enctype="multipart/form-data">    
            <input type="hidden" name="user_id" class="form-control" value="<?=$user_id; ?>" required>
            <div class="col-12 row g-3">
              <div class="col-6">
                  <label class="form-label">Select Property Category</label>
                  <div>
                    <select class="form-select" name="category_id" aria-label="Default select example" required>
                      <option value="">--Choose property Category--</option>
                      <?php $catt = $dbh->query("SELECT * FROM property_category WHERE status = 'Active'");
                        while ($rx = $catt->fetch(PDO::FETCH_OBJ)) { ?>
                          <option value="<?=$rx->category_id; ?>"><?=$rx->category_name; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
              <div class="col-6">
                  <label for="inputNanme4" class="form-label">Property Name</label>
                  <input type="text" name="property_name" class="form-control" id="inputNanme4" required>
              </div>
            </div>

               <div class="col-12 row g-3">
               <div class="col-6">
                  <label class="form-label">Select Property Type</label>
                  <div>
                    <select class="form-select" name="property_type_id" aria-label="Default select example" required>
                      <option value="">--Choose Property Type--</option>
                      <?php $type = $dbh->query("SELECT * FROM property_type WHERE status = 'Active'");
                        while ($rx = $type->fetch(PDO::FETCH_OBJ)) { ?>
                          <option value="<?=$rx->property_type_id; ?>"><?=$rx->property_type_name; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-6">
                  <label for="inputEmail4" class="form-label">District</label>
                  <input type="text" name="city" class="form-control" id="inputEmail4" required>
                </div>
               </div>
               
               <div class="row col-12 g-3">
               <div class="col-6">
                  <label class="form-label">Select Currency</label>
                  <div>
                    <select class="form-select" name="currency" >
                      <option value="USD">US Dollar</option>
                      <option value="UGX">Uganda Shillings</option>
                    </select>
                  </div>
                    </div>

                    <div class="col-6">
                  <label class="form-label">Select Status</label>
                  <div>
                    <select class="form-select" name="status" >
                      <option value="Available">Available</option>
                      <option value="Taken">Taken</option>
                    </select>
                  </div>
                    </div>
                  
               </div>
               <div class="row col-12 g-3">
               <div class="col-6">
                  <label for="inputPassword4" class="form-label">Location</label>
                  <input type="text" name="location" class="form-control" id="inputPassword4" required>
                </div>

                <div class="col-6">
                  <label for="inputEmail4" class="form-label">Price</label>
                  <input type="number" name="price" class="form-control" id="inputEmail4" required>
                </div>
               </div>
              
                <div class="col-12 row g-3">
                <div class="col-6">
                  <label for="inputPassword4" class="form-label">Land Measurements in Sqft</label>
                  <input type="text" name="land_measurements"  class="form-control" id="inputPassword4" required>
                </div>

                <div class="col-6">
                  <label for="inputPassword4" class="form-label">Bed rooms</label>
                  <input type="number" name="bed_rooms" min="1" class="form-control" id="inputPassword4" required>
                </div>
                </div>

                <div class="col-12 row g-3">
                <div class="col-6">
                  <label for="inputPassword4" class="form-label">Bathrooms</label>
                  <input type="number" name="bathrooms"  class="form-control" min="1" id="inputPassword4" required>
                </div>
                <div class=" col-6">
                    <label for="formFile" class="form-label">Upload property Images</label>
                    <input class="form-control" name="property_image" type="file" id="formFile" required>
                    </div>
                </div>
                
                <div class="col-12">
                <label for="form-control">Description</label>
                      <textarea class="form-control" id="descriptions" name="property_description" rows="3" placeholder="Please enter property descriptions" id="floatingTextarea" required ></textarea>
                      <script>
                     CKEDITOR.replace('descriptions');
                     </script>
                    </div>
                    <div class="text-center">
                  <button type="submit" name="add_property_btn" class="btn btn-primary">Submit</button>
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