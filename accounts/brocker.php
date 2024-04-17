<?php include 'header.php'?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Brocker</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item ">Brockers</li>
      <li class="breadcrumb-item active">Verified</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
      <!-- Button trigger modal -->
                  <!-- Table with stripped rows -->
          <table class="table datatable">
          <?php $user = $dbh->query("SELECT * FROM users WHERE usergroup != 'Admin' && verification = 'Verified' ");
        if ($user->rowCount() > 0) {
          $SN = 1;  ?>
            <thead>
              <tr>
                <th>
                  #S.N
                </th>
                <th>Brocker Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>verification</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php while ($rx = $user->fetch(PDO::FETCH_OBJ)) { ?>
              <tr>
                <td><?=$SN++; ?></td>
                <td><?=$rx->name; ?></td>
                <td><?=$rx->email; ?></td>
                <td><?=$rx->usergroup; ?></td>
                <td><span class="badge bg-success"><?=$rx->verification; ?></span></td>
                <td>
                <div class="dropdown">
                    <button class="btn  btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item" href="?ban-brocker=<?=$rx->user_id; ?>">Ban</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#view<?=$rx->user_id; ?>">View</a></li>
                        <li><a class="dropdown-item" href="?delete-brocker=<?=$rx->user_id; ?>">Delete</a></li>
                    </ul>
                    </div>
                </td>
              </tr>
              <?php include 'view_brocker.php';} ?>
            </tbody>
            <?php } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <h5><strong class="alert alert-danger text-center">No verified brockers or property owner yet !</strong></h5>
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


</main>

<?php include 'footer.php'?>