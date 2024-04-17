
<!-- Modal -->
<div class="modal fade" id="view<?=$rx->user_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Users Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Name : <?=$rx->name; ?></li>
          <li>Email : <?=$rx->email; ?></li>
          <li>Usergroup : <?=$rx->usergroup; ?></li>
          <li>Status : <?=$rx->status; ?></li>
        </ul>
        <div style="width: 200px; height: 200px;">
          <img src="<?=$rx->image ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
        </div>
    </div>
    </div>
  </div>
</div>