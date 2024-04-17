
<!-- Modal -->
<div class="modal fade" id="edit<?=$rx->user_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" class="row g-3" novalidate enctype="multipart/form-data">
           <input type="hidden" value="<?=$rx->user_id;?>" name="user_id">
           <div class="col-12 mb-3">
             <label for="inputNanme4" class="form-label">Full Name</label>
             <input type="text" name="name" class="form-control" value="<?=$rx->name; ?>" id="inputNanme4" required>
           </div>
           <div class="col-12 mb-3">
             <label for="inputEmail4" class="form-label">Email</label>
             <input type="email" name="email" class="form-control" value="<?=$rx->email; ?>" id="inputEmail4" required>
           </div>
           
           <div class="col-12 mb-3">
             <label class="form-label">Select Status</label>
             <div>
               <select class="form-select" name="status" aria-label="Default select example" required>
                 
                 <option value="Active">Active</option>
                 <option value="Inactive">Inactive</option>
               </select>
             </div>
           </div>

           <div class="col-12">
             <label for="yourEmail" class="form-label">Upload your Picture</label>
             <input type="file" name="image" class="form-control" id="yourEmail" required>
             <input type="hidden" name="default_image" value="<?=$rx->image; ?>" class="form-control" id="yourEmail" required>
             <img class="mt-3 mb-3" width="100px" src="<?=$rx->image; ?>" />
           </div>
           <div class="text-center">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit_user" class="btn btn-primary">Submit</button>
           </div>
         </form>
      </div>
      
    </div>
  </div>
</div>