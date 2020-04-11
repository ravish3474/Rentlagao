<style>
	.pv_tad{
		    display: flex;
		   margin-bottom: 4px;
    margin-top: 15px;
    justify-content: space-between;
   
    color: black;
 
	}
.cng_vw{
	    border-radius: 50%;
 	color: black;
    width: 30px;
    margin-left: 8px;
    cursor:pointer;
    /*position: absolute;*/
    height: 30px;
    text-align: center;
}
.cng_vw:hover{
	   border: 1px solid #2196f3;
    background: #2196f3;
    color: white;
}
.panel-title {
  position: relative;
  display: block;
      font-weight: 600;
}
  
.flip {
  transform: rotate(-180deg);
}
.panel-title .togl_icn {
	  -moz-transition: transform 1s;
  -webkit-transition: transform 1s;
  transition: transform 1s;
	color: #333;
	top: -2px;
	right: 0px;
	position: absolute;
    font-family: "FontAwesome"
}
.panel-collapse {
	padding: 12px;
}

</style>
<!-- <div class="container py-2">
	<ul class="d-flex list-unstyled srtct ">
		<li>Popular Searches : </li>
		<li>
			<a href="#"> Home </a><span class="mx-1">/</span> 
		</li> 
		<li>
			<a href="#"> Bikes </a><span class="mx-1">/</span> 
		</li>
	</ul>
</div> -->
<section class="container my-4">
	<h2><?=$city?> Free classifieds</h2>
	<div class="row mt-2">
<!-- 		<div class="col-md-3">
			<div class="p-1">
				<h5 class="my-4 trdx border-bottom">Filter</h5>

<div class="panel-group" id="accordion">
    <div class="panel panel-default py-2 border-bottom">
        <div class="panel-heading">
             <span class="panel-title" data-toggle="collapse" data-target="#collapseOne">
                CATEGORIES
                 <span class="togl_icn"><i class="fas fa-chevron-down"></i></span>
             </span>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
               <ul class=" list-unstyled  skds__">
					
					<li>
						<a href="#"> Bikes </a>
					</li> 
					<li>
						<a href="#"> Motor Cycles </a>
					</li>
				</ul>
            </div>
        </div>
    </div>

    <div class="panel panel-default py-2 border-bottom">
        <div class="panel-heading">
             <span class="panel-title" data-toggle="collapse" data-target="#collapseTwo">
                 LOCATIONS
                   <span class="togl_icn"><i class="fas fa-chevron-down"></i></span>
             </span>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
               <ul class=" list-unstyled skds__ ">
					
					<li>
						<a href="#"> Uttar Pradesh (37215) </a>
					</li> 
					<li>
						<a href="#">Kerala (25122) </a>
					</li>
				</ul>
            </div>
        </div>
    </div>

    <div class="panel panel-default py-2 border-bottom">
        <div class="panel-heading">
             <span class="panel-title" data-toggle="collapse" data-target="#collapseThree">
                  PRICE
                  <span class="togl_icn"><i class="fas fa-chevron-down"></i></span>
             </span>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
            	<div class="d-flex justify-content-center">
	               <input type="number" name="" class="w-50" placeholder="MIN">
	               <input type="number" name="" class="ml-2 w-50" placeholder="MAX">
	               <button class="btn btn-default border ml-2 bg-dark text-white"><i class="fas fa-chevron-right"></i></button>
	           </div>
            </div>
        </div>
    </div>
</div>
			</div>
		</div> -->
		<div class="col-md-12">
			<div class="p-1 border-bottom">
				<div class="pv_tad">
					<span class="m-0"><?php echo count($search_results);?> ads in <strong><?=$city?> For <?=$search_name?></strong></span>
<!-- 					<div class="d-flex tab_ls"><strong>VIEW </strong>
						<span class="cng_vw" id="list_vw"><i class="fas fa-list"></i></span>
						<span class="cng_vw" id="grid_vw"><i class="fas fa-th-large"></i></span>
						<span class="cng_vw" id="blog_vw"><i class="fas fa-indent"></i></span>
						<span class="mx-2">|</span>
					</div>
					<span>
						<span><strong>SORT BY : </strong></span>
					</span> -->
				</div>
			</div>
			<div class="row">
                <?php
                foreach ($search_results as $advert) {
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

	</div>
	
</section>
<script type="text/javascript">
	$(document).ready(function() {
    $( ".panel-heading" ).click( function() {
        $(this).find(".togl_icn").toggleClass('flip');
    });
});
</script>