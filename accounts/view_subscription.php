
<!-- Modal -->
<div class="modal fade" id="view<?=$rx->package_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Subscription Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Package Name : <?=$rx->package_name; ?></li>
          <li>Package Duration : <?=$rx->package_duration; ?></li>
          <li>Package Amount : <?=$rx->currency ?> <?=$rx->package_amount; ?></li>
          <li>Status : <?=$rx->Status; ?></li>
        </ul>
        <div class="mb-2 mt-2">
            <h5>Package Utilities</h5>
         <?=$rx->package_utilities; ?>
        </div>
       
    </div>
    </div>
  </div>
</div>