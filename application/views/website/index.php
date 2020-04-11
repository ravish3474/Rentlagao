
 <style>

 </style>
    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?=base_url()?>assets/web/assets/img/slide2.png" alt="First slide">
                </div>
                                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?=base_url()?>assets/web/assets/img/slide2.png" alt="First slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section>
          
    </section>
    <section>
        <div class="container mt-5 mb-5 __sft_">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h4>More on <?php
                    $location=$this->session->userdata('location_user');
                    $loc_sql="SELECT * FROM active_ads JOIN sub_categories ON sub_categories.sub_id=active_ads.sub_id WHERE active_ads.city='$location' ORDER BY rand() LIMIT 1";
                    $query = $this->db->query($loc_sql);
                    $result = $query->result_array();
                    echo $result[0]['sub_name'];
                    $sub_id=$result[0]['sub_id'];
                    ?></h4>
                </div>
<!--                 <div class="col-md-6 text-right">
                    <h6 class="mt-2 mb-0"><a href="#" class="_tunN">VIEW MORE </a></h6>
                </div> -->
            </div>
            <div class="gallery gallery-responsive portfolio_slider ">
                <?php
                $nsql="SELECT * FROM active_ads WHERE sub_id='$sub_id' AND city='$location'";
                $nquery=$this->db->query($nsql);
                $result1=$query->result_array();
                foreach ($result1 as $advert) {
                    $pictures=$advert['photos'];
                    $exploder=explode(",",$pictures);
                    $imager=$exploder[0];
                ?>
                <div class="inner px-2"> <div class="pr_shw">
                            <div class="">
                                <div class="">
                                    <div class="float-left bg-warning px-1"><span class="feaT__">Featured</span></div>
                                    <div class="float-right"><span><i class="far fa-heart favourite" adv_id="<?=$advert['ads_id']?>"></i></span></div>
                                </div>
                                <a href="<?=base_url()?>classifieds/<?=$advert['ads_id']?>">
                                <img src="<?=base_url()?>uploads/ads_images/<?=$imager?>" class="img-fluid" alt="">
                            </a>
                            </div>
                            <a href="<?=base_url()?>classifieds/<?=$advert['ads_id']?>">
                            <div class="product_val">
                                <h5>&#8377; <?=$advert['price']?></h5>
                                <!-- <p>2013 - 45,000 Km</p> -->
                                <span><?=$advert['product_name']?></span>
                                <div class="_taddt">
                                    <span><?=$advert['city']?></span>
                                    <!-- <span class=""> JAN 27</span> -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
         <div class="container mb-5 ">    
            <div class="row ">
                <?php
                foreach ($ads as $ad) {
                $pics=$ad['photos'];
                $explode=explode(",",$pics);
                $img=$explode[0];
                ?>
                <div class="col-md-3 mt-4 px-2">
                    <div class="pr_shw">
                            <div class="">
                                <div class="">
                                    <div class="float-left bg-warning px-1"><span class="feaT__">Featured</span></div>
                                    <div class="float-right"><span><i class="far fa-heart favourite" adv_id="<?=$advert['ads_id']?>"></i></span></div>
                                </div>
                                <a href="<?=base_url()?>classifieds/<?=$ad['ads_id']?>">
                                <img src="<?=base_url()?>uploads/ads_images/<?=$img?>" class="img-fluid" alt="">
                                </a>
                            </div>
                            <a href="<?=base_url()?>classifieds/<?=$ad['ads_id']?>">
                            <div class="product_val">
                                <h5>&#8377; <?=$ad['price']?></h5>
                                <!-- <p>2013 - 45,000 Km</p> -->
                                <span><?=$ad['product_name']?></span>
                                <div class="_taddt">
                                    <span><?=$ad['city']?></span>
                                    <!-- <span class=""> JAN 27</span> -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
               <?php } ?>
            </div>
<!--             <div class="text-center mt-3">
                <button class="btn p-2 btn-default border-primary border-2">
				<h5 class="text-primary text-bold">Load More</h5>
			</button>
            </div> -->

        </div>
    </section>
  
