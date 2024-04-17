<!-- Modal -->
<div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Your Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div >
            <div class="card-body">
              <!-- Vertical Form -->
              <form method="post" class="row g-3">
                <input type="hidden" value="<?=$user_id; ?>" name="user_id">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Old Password</label>
                  <input type="password" name="old_pass"  class="form-control" id="inputNanme4">
                </div>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label">New Password</label>
                  <input type="password" name="new_pass"  class="form-control" id="inputNanme4">
                </div>

                <div class="text-center">
                  <button type="submit" name="change_password" class="btn btn-primary">Submit</button>
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

<?php $typ = dbRow("SELECT * FROM users WHERE user_id = '$user_id' "); ?>
<!-- Modal -->
<div class="modal fade" id="UpdateProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Your Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div >
            <div class="card-body">
              <!-- Vertical Form -->
              <form method="POST" class="row g-3" novalidate enctype="multipart/form-data">    
             <div class="col-12 row g-3">
             
             <input type="hidden" name="user_id" class="form-control" value="<?=$user_id; ?>" required>
              <div class="col-6">
                  <label for="inputNanme4" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" value="<?=$typ->name; ?>" required>
                </div>
                
                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="<?=$typ->email; ?>" required>
                </div>
              </div>

               <div class="col-12 row g-3">
               <div class="col-6">
                  <label for="inputEmail4" class="form-label">National Id NIN number</label>
                  <input type="text" name="national_Id" class="form-control" value="<?=$typ->national_Id; ?>" required>
                </div>

                <div class="col-6">
                  <label for="inputEmail4" class="form-label">Contact</label>
                  <input type="text" name="contact" class="form-control" value="<?=$typ->contact; ?>" required>
                </div>
               </div>
            
               <div class="row col-12 g-3">
               <div class="col-6">
                  <label for="inputPassword4" class="form-label">Location</label>
                  <input type="text" name="location" class="form-control" value="<?=$typ->location; ?>" required>
                </div>

                <div class="col-6">
                  <label for="inputEmail4" class="form-label">WhatsApp Contact</label>
                  <input type="text" name="whatsApp" class="form-control" value="<?=$typ->whatsApp; ?>" required>
                </div>
               </div>
              

                <div class="col-12 row g-3">
                <div class="col-6">
                  <label for="inputPassword4" class="form-label">Upload Your New Profile Picture</label>
                  <input type="file" name="image"  class="form-control"  required><br />
                  <img src="<?=$typ->image; ?>" style="width: 150px; height: 150px; object-fit: cover" alt="">
                </div>
                <div class=" col-6">
                    <label for="formFile" class="form-label">Upload Your New National NIN Number Picture</label>
                    <input class="form-control" name="national_id_photo" type="file" id="formFile" required><br />
                    <img src="<?=$typ->national_id_photo; ?>" style="width: 150px; height: 150px; object-fit: cover" alt="">
                    </div>
                </div>
                
               
                    <div class="text-center">
                  <button type="submit" name="update_profile" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>


      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">View Your Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div >
            <div class="card-body">
              <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center;">
               <?php 
               if(empty($typ->image)){ ?>
                <img src="../img/default-avatar.png" style="width: 200px; height: 100%; border-radius: 50%; object-fit: cover;" alt="">
             <?php  }else{ ?>
              <img src="<?=$typ->image; ?>" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;" alt="">
           <?php  }
               ?>
               
              
              </div>
              <div>
              <p>Name : <?=$typ->name; ?></p>
               <p>Email : <?=$typ->email; ?></p>
               <?php if(($typ->usergroup == 'SuperAdmin' ) || ($typ->usergroup == 'Admin')){?>

              <?php }else{?> 
                <p>User group : <?=$typ->usergroup; ?></p> 
               <p>Verifications : <?=$typ->verification; ?></p>
               <p>National Id NIN Number : <?=$typ->national_Id; ?></p>
               <p>Contact : <?=$typ->contact; ?></p>
               <p>Whatsapp : <?=$typ->whatsApp; ?></p>
               <p>Location : <?=$typ->location; ?></p>
                <?php }?>
             

              </div>
            </div>
          </div>


      </div>
    </div>
  </div>
</div>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>IRIS PAVO</span></strong> Real Estate Agency. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://ospitdigitalsolutions.com/">Osp Digital Solutions</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>