<?php include 'header.php';
$currentUrl = $_SERVER['REQUEST_URI'];
// Extract the job_code from the URL
$parts = explode('/', $currentUrl);
$idx = end($parts);
$row = dbRow("SELECT * FROM property_category WHERE category_slug = '$idx' "); 
$all_properties = $dbh->query("SELECT * FROM properties p, property_type pt, property_category pc, users u WHERE p.category_id = pc.category_id AND p.property_type_id = pt.property_type_id AND p.user_id = u.user_id AND p.category_id = '".$row->category_id."' ");
?>
<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property: <?=ucwords($row->category_name); ?></h1>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show p-0 active">
                <?php if ($all_properties->rowCount() > 0 ) {?>
                <div class="row g-4">
                    <?php while($rx = $all_properties->fetch(PDO::FETCH_OBJ)){?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="property-list/<?=$rx->property_slug; ?>"><img style="height: 200px; width: 100%; object-fit: cover" src="<?=$rx->property_image; ?>" alt=""></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For <?=ucwords($rx->property_type_name); ?></div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?=ucwords($row->category_name); ?></div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><?=$rx->currency .' '.$rx->price; ?></h5>
                                <a class="d-block h5 mb-2" href="property-list/<?=$rx->property_slug; ?>"><?=ucwords($rx->property_name); ?> For <?=ucwords($rx->property_type_name); ?></a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?=ucfirst($rx->location); ?>, <?=$rx->city; ?>, Uganda</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?=$rx->land_measurements; ?> Sqft</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?=$rx->bed_rooms; ?> Bed</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?=$rx->bathrooms; ?> Bath</small>
                            </div>

                              <div style="display: flex; gap: 1rem; padding: 15px; align-items: center;">  

                                <?php 
                                  if(empty($rx->image)){ ?>
                                    <div style="width: 70px;height: 70px; ">
                                        <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="<?=SITE_URL;?>img/default-avatar.png" alt="">
                                    </div> 
                                <?php  }else{ ?>  
                                    <div style="width: 70px;height: 70px; ">
                                        <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="<?=$rx->image; ?>" alt="">
                                    </div> 
                                <?php } ?>
                            <div>
                                <p style="margin-bottom: 4px !important; font-size: 13px;"><?=$rx->name; ?> 
                                <?php if($rx->verification == 'Verified'){
                                    ?>
                                    <span><i style="color: #20c997;" class="bi bi-patch-check-fill"></i></span>
                                    <?php

                                }?> </p>
                                <a href="<?=$_SERVER['REQUEST_URI']; ?>#" style="color: #20c997; font-size: 17px"> <p style="margin-bottom: 4px !important; font-size: 13px;"><i class="bi bi-whatsapp"></i> <span> &nbsp;<?=$rx->whatsApp; ?></span></p></a>
                                <a href="<?=$_SERVER['REQUEST_URI']; ?>#" style="color: #20c997; font-size: 17px"><p style="margin-bottom: 4px !important; font-size: 13px;"><i class="bi bi-telephone-outbound"></i> <span> &nbsp;<?=$rx->contact; ?></span></p></a>
                            </div>
                        </div>
                        </div>

                        

                    </div>
                    <?php } ?>

                    <!-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                    </div> -->
                </div>
            <?php }else{ ?>
                <div class="alert alert-danger text-center">No Property under <b>[<?=ucwords($row->category_name); ?>]</b> Found Yet !</div>
            <?php } ?>
            </div>

        </div>
    </div>
</div>
<!-- Property List End -->


<!-- Call to Action Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <h1 class="mb-3">Contact With Our Certified Agent</h1>
                            <p>Connect with Our Expert Certified Agents: Your Trusted Partners in Real Estate. Reach out to our knowledgeable and dedicated agents who are committed to guiding you through every step of your property journey. With their expertise and personalized approach, finding your
                                 ideal property is just a call or click away. Get in touch today and let us help you achieve your real estate 
                                 goals.</p>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Make A Call</a>
                        <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->
<?php include 'footer.php' ?>