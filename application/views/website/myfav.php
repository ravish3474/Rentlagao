
<style>

.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>

<section class="container my-4">
		
			<div  id="tabs" class="project-tab ">
		 		<nav>
                    <div class="nav nav-tabs nav-fill w-25" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ADS</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">FAVOURITES</a>
                       
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="d-flex">
                        <?php
                        foreach ($myads as $adda) {
                        $picture=explode(",",$adda['photos']);
                        $pic=$picture[0];
                        ?>
                          <div class="col-md-4 mt-4 px-2">
                                <div class="pr_shw">
                                        <div class="">
                                            <div class="">
                                                <div class="float-left bg-warning px-1"><span class="feaT__">Featured</span></div>
                                                <div class="float-right"><span><i class="far fa-heart"></i></span></div>
                                            </div>
                                            <a href="<?=base_url()?>classifieds/<?=$adda['ads_id']?>">
                                            <img src="<?=base_url()?>uploads/ads_images/<?=$pic?>" class="img-fluid" alt="">
                                        </a>
                                        </div>
                                        <a href="<?=base_url()?>classifieds/<?=$adda['ads_id']?>">
                                        <div class="product_val">
                                            <h5>&#8377; <?=$adda['price']?></h5>
                                            <!-- <p>2013 - 45,000 Km</p> -->
                                            <span><?=$adda['product_name']?></span>
                                            <div class="_taddt">
                                                <span><?=$adda['city']?></span>
                                                <!-- <span class=""> JAN 27</span> -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                       <div class="d-flex">
                          <div class="col-md-4 mt-4 px-2">
                                <div class="pr_shw">
                                        <div class="">
                                            <div class="">
                                                <div class="float-left bg-warning px-1"><span class="feaT__">Featured</span></div>
                                                <div class="float-right"><span><i class="far fa-heart"></i></span></div>
                                            </div>
                                            <img src="assets/img/12.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="product_val">
                                            <h5>&#8377; 5000</h5>
                                            <p>2013 - 45,000 Km</p>
                                            <span>Skoda Rapid 1.2L</span>
                                            <div class="_taddt">
                                                <span>Saheed Nagar</span>
                                                <span class=""> JAN 27</span>
                                            </div>
                                        </div>
                                </div>

                            </div>
                            <div class="col-md-4 mt-4 px-2">
                                <div class="pr_shw">
                                    <a href="">
                                        <div class="">
                                            <div class="">
                                                <div class="float-left bg-warning px-1"><span class="feaT__">Featured</span></div>
                                                <div class="float-right"><span><i class="far fa-heart"></i></span></div>
                                            </div>
                                            <img src="assets/img/12.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="product_val">
                                            <h5>&#8377; 5000</h5>
                                            <p>2013 - 45,000 Km</p>
                                            <span>Skoda Rapid 1.2L</span>
                                            <div class="_taddt">
                                                <span>Saheed Nagar</span>
                                                <span class=""> JAN 27</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                   
                </div>
			</div>
</section>