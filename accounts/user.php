<?php include 'header.php'?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Users</li>
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
            Add User
            </button>
            </div>

                  <!-- Table with stripped rows -->
          <table class="table datatable">
          <?php $user = $dbh->query("SELECT * FROM users WHERE usergroup = 'Admin'");
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
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php while ($rx = $user->fetch(PDO::FETCH_OBJ)) { ?>
              <tr>
                <td><?=$SN++; ?></td>
                <td><?=$rx->name ?></td>
                <td><?=$rx->email ?></td>
                <td><?=$rx->status ?></td>
                <td>
                <div class="dropdown">
                    <button class="btn  btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#view<?=$rx->user_id; ?>">View</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#edit<?=$rx->user_id; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="?delete-user=<?=$rx->user_id; ?>">Delete</a></li>
                    </ul>
                    </div>
                </td>
              </tr>
              <?php 
            include 'view_user.php';
            include 'edit-user.php';
            } ?>
            </tbody>
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <h5><strong class="alert alert-danger text-center">No User added yet !</strong></h5>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div >
            <div class="card-body">
              <!-- Vertical Form -->
              <form method="POST" class="row g-3" novalidate enctype="multipart/form-data">
           
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Full Name</label>
                  <input type="text" name="name" class="form-control" id="inputNanme4" required>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="inputEmail4" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword4" required>
                </div>
                
                <div class="col-12">
                  <label class="form-label">Select Status</label>
                  <div>
                    <select class="form-select" name="status" aria-label="Default select example" required>
                      <option selected>Open this select menu</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <label for="yourEmail" class="form-label">Upload your Picture</label>
                  <input type="file" name="image" class="form-control" id="yourEmail" required>
                </div>
                <div class="text-center">
                  <button type="submit" name="register_admin" class="btn btn-primary">Submit</button>
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