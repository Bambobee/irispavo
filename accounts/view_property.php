
<!-- Modal -->
<div class="modal fade" id="view<?=$rx->property_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Property Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Property Name : <?=$rx->property_name; ?></li>
          <li>City : <?=$rx->city; ?></li>
          <li>Status : <?=$rx->status; ?></li>
          <li>Location : <?=$rx->location; ?></li>
          <li>Price : <?=$rx->currency ?> <?=$rx->price; ?></li>
          <li>Land Measurements : <?=$rx->land_measurements; ?></li>
          <li>Bed Rooms : <?=$rx->bed_rooms; ?></li>
          <li>Bathrooms : <?=$rx->bathrooms; ?></li>
        </ul>
        <div class="mb-2 mt-2">
        <h5>Package Description</h5>
             <?=$rx->property_description ?>
        </div>
        <div style="width: 200px; height: 200px;">
          <img src="<?=$rx->property_image ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="">
        </div>
    </div>
    </div>
  </div>
</div>