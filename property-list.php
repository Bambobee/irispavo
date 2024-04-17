<?php include 'header.php';
$currentUrl = $_SERVER['REQUEST_URI'];
$parts = explode('/', $currentUrl);
$idx = end($parts);
$rx = dbRow("SELECT * FROM properties p, property_type pt, property_category pc, users u WHERE p.category_id = pc.category_id AND p.property_type_id = pt.property_type_id AND p.user_id = u.user_id AND p.property_slug = '$idx' ");
 ?>
<style>
   .related_images{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(8rem, 1fr));
    gap: 1.5rem;
    img{
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
   }
</style>
         <!-- About Start -->
    <div class="container-xxl py-3">
        <div class="container">
            <div class="text-center mx-auto mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">View Property Details</h1>
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="<?=$rx->property_image; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="related_images">
                            <div class="col_img">
                                <img src="<?=$rx->property_image; ?>" alt="">
                            </div>
                            <div class="col_img">
                                <img src="<?=$rx->property_image; ?>" alt="">
                            </div>
                            <div class="col_img">
                                <img src="<?=$rx->property_image; ?>" alt="">
                            </div>
                        </div>

                        <p style="font-size: 20px" class="mb-2 mt-2"><?=$rx->category_name; ?></p>
                        <h4 class="mb-2">Golden Urban House For Sell</h4>
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$rx->location ?>, <?=$rx->city ?>, Uganda</p>
                        <h4 ><?=$rx->currency; ?> <?=number_format($rx->price,2); ?></h4>
                        <div class="mt-2">
                            <span><i class="fa fa-ruler-combined text-primary me-2"></i><?=$rx->land_measurements; ?> Sqft</span>&nbsp;&nbsp;&nbsp;
                            <span><i class="fa fa-bed text-primary me-2"></i><?=$rx->bed_rooms ?> Bed</span>&nbsp;&nbsp;&nbsp;
                            <span> <i class="fa fa-bath text-primary me-2"></i><?=$rx->bathrooms ?> Bath</span>
                        </div>
                        <!-- <div class="row mt-2">
                            <div class="col">  <a class="btn btn-danger" href="about.php">Contact Admin</a></div>
                            <div class="col">  <a class="btn btn-danger" href="about.php">Contact Brocker</a></div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="container mb-3" style="margin-top: 30px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr)); gap: 2rem;">
                <div>
                <h4 class="mb-3">Property Description</h4>
                <div style="display: flex; place-items: center;">
                <p style="margin-bottom: 5px !important;"><?=$rx->property_description; ?></p>
                </div>
                </div>
                <div>
                <h4 class="mb-3">Brocker Details</h4>
                <div style="display: grid; place-items: center; grid-template-columns: repeat(auto-fit, minmax(5rem, 1fr)); ">
                    <?php if(empty($rx->image)){ ?>
                    <div style="width: 150px; ">
                        <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="./img/default-avatar.png" alt="">
                    </div>
                    <?php }else{ ?>
                        <div style="width: 150px; ">
                        <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="<?=$rx->image; ?>" alt="">
                    </div>
                    <?php } ?> 
                    <div>
                        <p style="margin-bottom: 5px !important;"><?=$rx->name; ?><?php if($rx->verification == 'Verified'){
                                            ?> <span><i style="color: #20c997;" class="bi bi-patch-check-fill"></i></span></p>
                                        <?php } ?>
                        <p style="margin-bottom: 5px !important;">Status : 
                            <?php if($rx->verification == 'Verified'){
                                            ?>
                            <span style="background: #20c997; padding: 3px; color: #fff; border-radius: 8px;">Verified</span>
                            <?php } ?></p>
                       <a href="#" style="color: #20c997; font-size: 17px"> <p style="margin-bottom: 5px !important;"><i class="bi bi-whatsapp"></i> <span> &nbsp;<?=$rx->whatsApp; ?></span></p></a>
                        <a href="#" style="color: #20c997; font-size: 17px"><p style="margin-bottom: 5px !important;"><i class="bi bi-telephone-outbound"></i> <span> &nbsp;<?=$rx->contact; ?></span></p></a>
                        <a href="#" style="color: #20c997; font-size: 16px"><p style="margin-bottom: 5px !important;"><i class="bi bi-envelope"></i> <span> &nbsp;<?=$rx->email; ?></span></p></a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- About End -->


<div class="container-xxl py-3">
    <div class="container">
        <div class="text-center mx-auto mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h3 class="mb-3">Related Properties</h3>
        </div>
        <?php $related_properties = $dbh->query("SELECT * FROM properties p, property_type pt, property_category pc, users u WHERE p.category_id = pc.category_id AND p.property_type_id = pt.property_type_id AND p.user_id = u.user_id AND p.property_slug != '$idx' "); ?>
        <div class="owl-carousel similar_carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php  while ($val = $related_properties->fetch(PDO::FETCH_OBJ)) { ?>
            <div class="similar-item bg-light rounded p-3">  
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <a href="property-list/<?=$val->property_slug; ?>">
                            <img style="height: 200px; width: 100%; object-fit: cover" src="<?=$val->property_image; ?>" alt=""></a>
                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For <?=$val->property_type_name; ?></div>
                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Building</div>
                    </div>
                    <div class="p-4 pb-0">
                        <h5 class="text-primary mb-3"><?=$val->currency; ?> <?=number_format($val->price,2); ?></h5>
                        <a class="d-block h5 mb-2" href=""><?=$val->property_name ?> For <?=$val->category_name; ?></a>
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$val->location ?>, <?=$val->city ?>, Uganda</p>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?=$val->land_measurements; ?> Sqft</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?=$val->bed_rooms ?> Bed</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?=$val->bathrooms ?> Bath</small>
                    </div>
                     <div style="display: flex; gap: 1rem; padding: 15px; align-items: center;">  
                                <?php if(empty($val->image)){ ?>
                            <div style="width: 70px;height: 70px; ">
                                <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="<?=SITE_URL;?>/img/default-avatar.png" alt="">
                            </div> 
            
                            <?php  }else{ ?>
            
                            <div style="width: 70px;height: 70px; ">
                                <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="<?=$val->image; ?>" alt="">
                            </div> 
                            <?php } ?>

                                    <div>
                                        <p style="margin-bottom: 4px !important; font-size: 13px;"><?=$val->name; ?> <?php if($val->verification == 'Verified'){
                                            ?>
                                            <span><i style="color: #20c997;" class="bi bi-patch-check-fill"></i></span>
                                            <?php

                                        }?> </p>
                                    <a href="#" style="color: #20c997; font-size: 17px"> <p style="margin-bottom: 4px !important; font-size: 13px;"><i class="bi bi-whatsapp"></i> <span> &nbsp;<?=$val->whatsApp; ?></span></p></a>
                                        <a href="#" style="color: #20c997; font-size: 17px"><p style="margin-bottom: 4px !important; font-size: 13px;"><i class="bi bi-telephone-outbound"></i> <span> &nbsp;<?=$val->contact; ?></span></p></a>
                                    </div>
                                </div>
                            </div>
           </div>
       <?php } ?>
        </div>
    
    </div>
</div>
<?php include 'footer.php'; ?>