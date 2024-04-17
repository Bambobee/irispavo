
<!-- Modal -->
<div class="modal fade" id="edit<?=$rx->property_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Property</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mt-3">
      <form method="POST" class="row g-3" novalidate enctype="multipart/form-data">
           <input type="hidden" value="<?=$rx->property_id;?>" name="property_id">
           
             <div class="col-12 row g-3 mb-3">
              <div class="col-6">
                  <label for="inputNanme4" class="form-label">Property Name</label>
                  <input type="text" name="property_name" value="<?=$rx->property_name;?>" class="form-control" id="inputNanme4" required>
                </div>
                
                <div class="col-6">
                  <label class="form-label">Select Property Category</label>
                  <div>
                    <select class="form-select" name="category_id" aria-label="Default select example" required>
                      <?php $catt = $dbh->query("SELECT * FROM property_category WHERE status = 'Active'");
                        while ($rxx = $catt->fetch(PDO::FETCH_OBJ)) { ?>
                          <option value="<?=$rxx->category_id; ?>"><?=$rxx->category_name; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

               <div class="col-12 row g-3 mb-3">
               <div class="col-6">
                  <label class="form-label">Select Property Type</label>
                  <div>
                    <select class="form-select" name="property_type_id" aria-label="Default select example" required>
                      <?php $type = $dbh->query("SELECT * FROM property_type WHERE status = 'Active'");
                        while ($rxp = $type->fetch(PDO::FETCH_OBJ)) { ?>
                          <option value="<?=$rxp->property_type_id; ?>"><?=$rxp->property_type_name; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-6">
                  <label for="inputEmail4" class="form-label">District</label>
                  <input type="text" value="<?=$rx->city;?>" name="city" class="form-control" id="inputEmail4" required>
                </div>
               </div>

               <div class="row col-12 g-3">
               <div class="col-6">
                  <label class="form-label">Select Currency</label>
                  <div>
                    <select class="form-select" name="currency" >
                      <option value="USD">US Dollar</option>
                      <option value="UGS">UG Shillings</option>
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

               <div class="row col-12 g-3 mb-3">
               <div class="col-6">
                  <label for="inputPassword4" class="form-label">Location</label>
                  <input type="text" name="location" value="<?=$rx->location;?>" class="form-control" id="inputPassword4" required>
                </div>

                <div class="col-6">
                  <label for="inputEmail4" class="form-label">Price</label>
                  <input type="number" value="<?=$rx->price;?>" name="price" class="form-control" id="inputEmail4" required>
                </div>
               </div>
              
                <div class="col-12 row g-3 mb-3">
                <div class="col-6">
                  <label for="inputPassword4" class="form-label">Land Measurements in SQft</label>
                  <input type="" name="land_measurements" value="<?=$rx->land_measurements;?>" placeholder="e.g 1000Sqft" class="form-control" id="inputPassword4" required>
                </div>

                <div class="col-6">
                  <label for="inputPassword4" class="form-label">Bed rooms</label>
                  <input type="number" name="bed_rooms" value="<?=$rx->bed_rooms;?>" placeholder="e.g 3 bedrooms" class="form-control" id="inputPassword4" required>
                </div>
                </div>

                <div class="col-12 row g-3 mb-3">
                <div class="col-6">
                  <label for="inputPassword4" class="form-label">Bathrooms</label>
                  <input type="number" name="bathrooms" value="<?=$rx->bathrooms;?>" placeholder="e.g 1 bathroom" class="form-control" id="inputPassword4" required>
                </div>
                <div class=" col-6">
                    <label for="formFile" class="form-label">Upload property Images</label>
                    <input class="form-control" name="property_image" type="file" id="formFile" required>
                    <img class="mt-3 mb-3" width="100px" src="<?=$rx->property_image; ?>" />
                    <input type="hidden" name="default_property_image" value="<?=$rx->property_image; ?>">
                    </div>
                </div>
                
                <div class="col-12 mb-3">
                <label for="form-control">Description</label>
                
                      <textarea class="form-control" id="property_description<?=$rx->property_id; ?>" name="property_description" rows="3"  id="floatingTextarea" required >
                      <?=$rx->property_description;?>
                      </textarea>
                      <script>
                     CKEDITOR.replace('property_description<?=$rx->property_id; ?>');
                     </script>
                    </div>

        <div class="text-center">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" name="edit_property" class="btn btn-primary">Submit</button>
           </div>
    </form>
      </div>
      
    </div>
  </div>
</div>