
<?php include 'header1.php'; ?>
    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Property Types</h1>
                <p>Explore Our Diverse Property Types: Find Your Perfect Match. From charming cottages to modern apartments, we offer a wide range of property types to suit every lifestyle and preference. Whether you're searching for a cozy retreat, a spacious family home, or an investment opportunity, we have something for 
                    everyone. Discover our variety of property types and start envisioning your next move today.</p>
            </div>
            <div class="row g-4">
            <?php $type = $dbh->query("SELECT * FROM property_category WHERE status = 'Active'");
                       while ($rxp = $type->fetch(PDO::FETCH_OBJ)) { ?>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="properties/<?=$rxp->category_slug; ?>">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                            </div>
                            <h6><?=$rxp->category_name ?></h6>
                           
                            <?php $prop = $dbh->query("SELECT * FROM properties WHERE category_id = '$rxp->category_id' ")->rowCount(); ?>
                            <span><?=$prop; ?> Properties</span>
                        </div>
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- Category End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Discover Your Dream Property Here</h1>
                    <p class="mb-4">Welcome to Your Dream Property Destination! Explore, Imagine, and Find Your Perfect Place with Us. Whether you're seeking</p>
                    <p><i class="fa fa-check text-primary me-3"></i> A cozy home</p>
                    <p><i class="fa fa-check text-primary me-3"></i> An expansive estate</p>
                    <p><i class="fa fa-check text-primary me-3"></i>A charming retreat</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="about">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Property Listing</h1>
                        <p>Explore Our Exclusive Property Listings: Your Gateway to Exceptional Real Estate Opportunities. Dive into a diverse selection of properties curated just for you. From luxurious estates to cozy homes, find the perfect match for your lifestyle and aspirations. Start your search now and discover the property of your dreams.</p>
                    </div>
                </div>
            </div>
            <div class="">
                <?php $all_properties = $dbh->query("SELECT * FROM properties p, property_type pt, property_category pc, 
                users u WHERE p.category_id = pc.category_id AND p.property_type_id = pt.property_type_id AND p.user_id = u.user_id LIMIT 6 ");?>
               
                <div class=" fade show p-0 active">
                    <div class="row g-4">
                   <?php  while ($rx = $all_properties->fetch(PDO::FETCH_OBJ)) { ?>
                         <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="property-list/<?=$rx->property_slug; ?>"><img style="height: 200px; width: 100%; object-fit: cover" src="<?=$rx->property_image ?>" alt=""></a>
                                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For <?=$rx->property_type_name; ?></div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?=$rx->category_name; ?></div>
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="text-primary mb-3"><?=$rx->currency; ?> <?=$rx->price; ?></h5>
                                    <a class="d-block h5 mb-2" href="property-list/<?=$rx->property_slug; ?>"><?=$rx->property_name ?> </a>
                                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?=$rx->location ?>, <?=$rx->city ?>, Uganda</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?=$rx->land_measurements; ?> SQft</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?=$rx->bed_rooms ?> Beds</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?=$rx->bathrooms ?> Bath</small>
                                </div>
                                <div style="display: flex; gap: 1rem; padding: 15px; align-items: center;">  
                                <?php if(empty($rx->image)){ ?>
                            <div style="width: 70px;height: 70px; ">
                                <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="<?=SITE_URL;?>/img/default-avatar.png" alt="">
                            </div> 
            
                            <?php  }else{ ?>
            
                            <div style="width: 70px;height: 70px; ">
                                <img style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;" src="<?=$rx->image; ?>" alt="">
                            </div> 
                            <?php } ?>

                                    <div>
                                        <p style="margin-bottom: 4px !important; font-size: 13px;"><?=$rx->name; ?> <?php if($rx->verification == 'Verified'){
                                            ?>
                                            <span><i style="color: #20c997;" class="bi bi-patch-check-fill"></i></span>
                                            <?php

                                        }?> </p>
                                    <a href="#" style="color: #20c997; font-size: 17px"> <p style="margin-bottom: 4px !important; font-size: 13px;"><i class="bi bi-whatsapp"></i> <span> &nbsp;<?=$rx->whatsApp; ?></span></p></a>
                                        <a href="#" style="color: #20c997; font-size: 17px"><p style="margin-bottom: 4px !important; font-size: 13px;"><i class="bi bi-telephone-outbound"></i> <span> &nbsp;<?=$rx->contact; ?></span></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php  } ?>
                        <div class="col-12 text-center">
                            <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                        </div>
                    </div>
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
                                <p>Connect with Our Expert Certified Agents: Your Trusted Partners in Real Estate. Reach out to our knowledgeable and dedicated agents who are committed to guiding you through every step of your property journey. With their expertise and personalized approach, finding your ideal property is just a call or click away. Get in touch today and let us help you achieve your real estate goals.</p>
                            </div>
                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->
     <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Trusted Brokers</h1>
                <p>Meet Our Professional Property Agents: Your Trusted Advisors in Real Estate. Our 
                    team of experienced agents is dedicated to helping you navigate the complexities
                     of the property market with ease. Whether you're buying, selling, or investing,
                      rely on our expertise and personalized service to achieve your goals. Connect with our
                       knowledgeable agents today and experience the difference.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <?php $pus = $dbh->query("SELECT * FROM users WHERE verification = 'Verified'");
                       while ($rx = $pus->fetch(PDO::FETCH_OBJ)) { ?>
                <div class="testimonial-item    fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid"  src="<?=$rx->image ?>" alt="">
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0"><?=$rx->name ?> <i style="color: #20c997;" class="bi bi-patch-check-fill"></i></h5>
                            <small>Location : <?=$rx->location ?></small>
                            <small>Whatsapp : <?=$rx->whatsApp ?></small>
                            <small>Contact : <?=$rx->contact; ?></small>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
<?php include 'footer.php' ?>