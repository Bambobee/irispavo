
<!-- Modal -->
<div class="modal fade" id="edit<?=$rx->package_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Packages</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3">
      <form method="POST" class="row g-3" novalidate >
           <input type="hidden" value="<?=$rx->package_id;?>" name="package_id">
         

           <div class="col-12 row g-3 mb-3">
                <div class="col-6">
                <!-- package_name	package_duration	package_amount	Status	package_utilities -->
                  <label for="inputNanme4" class="form-label">Package Name</label>
                  <input type="text" name="package_name" value="<?=$rx->package_name; ?>" class="form-control" id="inputNanme4">
                </div>

                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Duration</label>
                  <input type="text" value="<?=$rx->package_duration; ?>" name="package_duration" class="form-control" id="inputNanme4">
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

                <div class="col-12 g-3 row mb-3">
                <div class="col-6">
                  <label for="inputNanme4" class="form-label">Amount</label>
                  <input type="text" name="package_amount" value="<?=$rx->package_amount; ?>" class="form-control" id="inputNanme4">
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
                
                <div class="col-12 mb-3">
                <label for="message">Package Utilities</label>
                 <div class="quform-input">
                    <textarea name="package_utilities"  id="packages<?=$rx->package_id; ?>" required><?=$rx->package_utilities; ?></textarea>
                     <script>
                     CKEDITOR.replace('packages<?=$rx->package_id; ?>');
                     </script>
                </div>
            </div>

                <div class="text-center">
                  <button type="submit" name="edit_packages" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
           </div>
         </form>
      </div>
      
    </div>
  </div>
</div>