
<!-- Modal -->
<div class="modal fade" id="edit<?=$rx->property_type_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Property Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" class="row g-3" novalidate >
           <input type="hidden" value="<?=$rx->property_type_id;?>" name="property_type_id">
         
                <div class="col-12 mb-3">
                  <label for="inputNanme4" class="form-label">Property Type</label>
                  <input type="text" name="property_type_name" value="<?=$rx->property_type_name;?>" class="form-control" id="inputNanme4">
                </div>
                <div class="col-12 mb-3">
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
                  <button type="submit" name="edit_type" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
           </div>
         </form>
      </div>
      
    </div>
  </div>
</div>