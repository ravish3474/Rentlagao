
<style>
.js_sp_bt{
	display: flex;
	justify-content: space-between;
}
.fnt_45{
	font-size: 45px;
}
	</style>
<section class="container my-4">
	<div class="row">
		<div class="col-md-3">
			<div class="">
				<div class="text-center">
					<img src="<?=base_url()?>uploads/profile_pics/<?=$user_data[0]['user_image']?>" class="rounded-circle img-fluid w-75">
					<!-- <div class="">
						<a href=""><i class="fas fa-pencil-alt"></i></a>
					</div> -->
				</div>
				<div class="mt-4 card ">
					<div class="bg-primary p-2 text-white"><h6 class="m-0">Linked Accounts</h6></div>
					<div class="p-2">
<!-- 						<div class="js_sp_bt border-bottom p-1">
							<span>GOOGLE</span>
							<span><i class="far fa-check-circle"></i></span>
						</div> -->
						<div class="js_sp_bt p-1">
							<span>EMAIL</span>
							<span><i class="far fa-check-circle"></i></span>
						</div>
					</div>
				</div>
<!-- 				<div class="card mt-4">
					<div class="bg-primary p-2 text-white"><h6 class="m-0">Friends</h6></div>
					<div class="p-2">
						<div class="js_sp_bt border-bottom p-1">
							<span>FOLLOWERS</span>
							<span>0</span>
						</div>
						<div class="js_sp_bt p-1">
							<span>FOLLOWINGS</span>
							<span>0</span>
						</div>
					</div>
				</div>
				<div class="text-primary text-center mt-3">
					<h6>SHARE PROFILE LINK</h6>
				</div> -->
			</div>
		</div>
		<div class="col-md-9 p-4">
			<div class="my-2">
				<span class="fnt_45"><?=$user_data[0]['nickname']?></span>
                <?php
                $userdata=$this->session->userdata('userdata');
                $my_id=$userdata[0]['user_id'];
                if($my_id==$user_data[0]['user_id']){
                ?>
				<a href="<?=base_url()?>my-profile" class=" btn btn-default rui-1001X ml-2">EDIT PROFILE</a>
            <?php } ?>
			</div>
			<hr>
			<div class="row p-0 m-0 ">
                <?php
                foreach ($user_products as $prod) {
                $picture=explode(",",$prod['photos']);
                $pic=$picture[0];
                ?>
				 <div class="col-md-4 mt-4 px-2">

                    <div class="pr_shw">
                            <div class="">
                                <div class="">
                                    <div class="float-left bg-warning px-1"><span class="feaT__">Featured</span></div>
                                    <div class="float-right"><span><i class="far fa-heart favourite" adv_id="<?=$prod['ads_id']?>"></i></span></div>
                                </div>
                                <a href="<?=base_url()?>classifieds/<?=$prod['ads_id']?>">
                                    <img src="<?=base_url()?>uploads/ads_images/<?=$pic?>" class="img-fluid" alt="">
                                </a>
                            </div>
                             <a href="<?=base_url()?>classifieds/<?=$prod['ads_id']?>">
                            <div class="product_val">
                                <h5>&#8377; <?=$prod['price']?></h5>
                                <!-- <p>2013 - 45,000 Km</p> -->
                                <span><?=$prod['product_name']?></span>
                                <div class="_taddt">
                                    <span><?=$prod['city']?></span>
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
