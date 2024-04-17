<?php include 'header.php'?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Categories</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Categories</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
      <!-- Button trigger modal -->
      <?php
      $ty = dbRow("SELECT * FROM users WHERE user_id='".$user_id."' "); 
      if(($ty->usergroup == 'Admin') || ($ty->usergroup == 'SuperAdmin')){?>
            <div style="display: flex; justify-content: end; padding: 8px;  ">
            <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#UserModal">
            Add Categories
            </button>
            </div>
            <?php }  ?>
                  <!-- Table with stripped rows -->
          <table class="table datatable">
          <?php $user = $dbh->query("SELECT * FROM property_category ");
        if ($user->rowCount() > 0) {
          $SN = 1;  ?>
            <thead>
              <tr>
              <th>
                 #S.N
                </th>
                <th>
                  Name
                </th>
                <th>Status</th>
                <?php 
                 if(($ty->usergroup == 'Admin') || ($ty->usergroup == 'SuperAdmin')){?>

                <th>Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
            <?php while ($rx = $user->fetch(PDO::FETCH_OBJ)) { ?>
              <tr>
              <td><?=$SN++; ?></td>
                <td><?=$rx->category_name ?></td>
                <td><?=$rx->status ?></td>
                <td>
                <?php 
                 if(($ty->usergroup == 'Admin') || ($ty->usergroup == 'SuperAdmin')){?>
                <div class="dropdown">
                    <button class="btn  btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"  data-bs-toggle="modal" href="#edit<?=$rx->category_id; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="?delete-cat=<?=$rx->category_id; ?>">Delete</a></li>
                    </ul>
                    </div>

                    <?php } ?>
                </td>
              </tr>
              <?php 
            include 'edit-category.php'; } ?>
            </tbody>
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="alert alert-danger text-center"><b>No Category added yet !</b></h5>
                    </div>
                </div>
            <?php } ?>
          </table>
          <!-- End Table with stripped rows -->
          
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="UserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div >
            <div class="card-body">
              <!-- Vertical Form -->
              <form class="row g-3" method="post">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Category Name</label>
                  <input type="text" name="category_name" class="form-control" id="inputNanme4">
                </div>
              
                
                <div class="col-12">
                  <label class="form-label">Select Status</label>
                  <div>
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" name="add_category" class="btn btn-primary">Submit</button>
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