
<!-- Modal -->
<div class="modal fade" id="view<?=$rx->user_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View <?=$rx->usergroup; ?> Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li><?=$rx->usergroup; ?> Name : <?=$rx->name; ?></li>
          <li><?=$rx->usergroup; ?> Email : <?=$rx->email; ?></li>
          <li>Status : <?=$rx->status; ?></li>
          <li>Verification : <?=$rx->verification; ?></li>
          <li>National Id NIN number : <?=$rx->national_Id; ?></li>
          <li>Contact : <?=$rx->contact; ?></li>
          <li>WhatsApp : <?=$rx->whatsApp; ?></li>
          <li>Location : <?=$rx->location; ?></li>
        </ul>
        
        <div style="width: 200px; height: 200px; mb-2">
          <img src="<?=$rx->image ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
        </div>

        <div style="width: 200px; height: 200px;">
          <img src="<?=$rx->national_id_photo ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
        </div>
    </div>
    </div>
  </div>
</div>