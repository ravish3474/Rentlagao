<?php
$sess = 0;
if($this->session->userdata('userdata')){
  $sess = 1; 
}
?>
<style>
 <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider arrow skin 106 css*/
        .jssora106 {display:block;position:absolute;cursor:pointer;}
        .jssora106 .c {fill:#fff;opacity:.3;}
        .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
        .jssora106:hover .c {opacity:.5;}
        .jssora106:hover .a {opacity:.8;}
        .jssora106.jssora106dn .c {opacity:.2;}
        .jssora106.jssora106dn .a {opacity:1;}
        .jssora106.jssora106ds {opacity:.3;pointer-events:none;}

        /*jssor slider thumbnail skin 101 css*/
        .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
        .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;}
        .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
        .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
        .jssort101 .p:hover{padding:2px;}
        .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
        .jssort101 .p:hover.pdn{padding:0;}
        .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
        .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
        .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
        .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
        .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
    </style>
</style>
<style type="text/css">
.user {
  display: inline-block;
     width: 80px;
    height: 80px;
  border-radius: 50%;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}
.view_profile
{
    font-size: 13px;
    color: gray;
    text-align: justify;

}
.ico
{
    width:40%;
}
</style>
<!-- <div class="container py-2">
	<ul class="d-flex list-unstyled srtct ">
		<li>
			<a href="#"> Home </a><span class="mx-1">/</span> 
		</li> 
		<li>
			<a href="#"> Bikes </a><span class="mx-1">/</span> 
		</li>
	</ul>
</div> -->
<section class="container my-4">
	<div class="row">
		<div class="col-md-7">
			<div class="">  
				<!-- <div class="slider_box">
				  				    <div class="silder_con">
				      <div class="silder_panel">
				        <a href="#" class="silder_panel_item">
				          <img src="https://picsum.photos/1100/500?image=777">
				        </a>
				   
				      </div>
				      <div class="silder_panel">
				        <a href="#" class="silder_panel_item">
				          <img src="https://picsum.photos/1100/500?image=776">
				        </a>
				      
				      </div>
				      <div class="silder_panel">
				        <a href="#" class="silder_panel_item">
				          <img src="https://picsum.photos/1100/500?image=775">
				        </a>
				       
				      </div>
				      <div class="silder_panel">
				        <a href="#" class="silder_panel_item">
				          <img src="https://picsum.photos/1100/500?image=774">
				        </a>
				       
				      </div>
				      <div class="silder_panel">
				        <a href="#" class="silder_panel_item">
				          <img src="https://picsum.photos/1100/500?image=773">
				        </a>
				      
				      </div>
				     
				     
				    </div>
		
				    <div class="silder_nav_mask"></div>
				    <div class="silder_nav"></div>
				</div> -->
				<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <?php
            $photos=$ad[0]['photos'];
            $explode=explode(",",$photos);
            foreach ($explode as $pic) {
            ?>
            <div>
                <img data-u="image" src="<?=base_url()?>uploads/ads_images/<?=$pic?>" />
                <img data-u="thumb" src="<?=base_url()?>uploads/ads_images/<?=$pic?>" />
            </div>    
            <?php } ?> 
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:190px;height:90px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
            </svg>
        </div>
    </div>
    
			</div>
			<div class="_25oXN border p-3 mt-3">
				<h5>Details</h5>
				<div class="row">
                    <div class="col-md-3">
                        <p><?=$ad[0]['basic_desc']?></p>
                    </div>
<!-- 					<div class="col-md-3">
						<p>Brand</p>
						<p>Year</p>
					</div>
					<div class="col-md-3">
						<p>Hero</p>
						<p>2010</p>
					</div>
					<div class="col-md-3">
						<p>Model</p>
						<p>KM driven</p>
					</div>
					<div class="col-md-3">
						<p>Splendor</p>
						<p>23,309 km</p>
					</div> -->
				</div>	
				<hr>
				<h5>Description</h5>
                <?=$ad[0]['description']?>
				<!-- <p>Good Condition bike available at discounted price.	</p> -->
			</div>
		</div>
		<div class="col-md-5">
			<div class="_25oXN border p-3">
				<div class="pv_taddt">
					<h2 class="m-0">₹ <?=$ad[0]['price']?></h2>
					<span>
						<span>Add To Favourites</span>
						<span><i class="far fa-heart favourite" adv_id="<?=$ad[0]['ads_id']?>"></i></span>
					</span>
				</div>
				<!-- <p>2013 - 45,000 Km</p> -->
                <span><?=$ad[0]['product_name']?></span>
                <div class="_taddt">
                    <span><?=$ad[0]['city']?></span>
                    <!-- <span class=""> JAN 27</span> -->
                </div>
			</div>
          
			<div class="_25oXN border p-3 mt-3">
				<h5 class="text-dark">Seller description</h5>
                  <a href="<?=base_url()?>view-profile/<?=$ad[0]['user_id']?>">
                <div class="d-flex py-2">
                    <div class="float-left">
                        <img class="user" src="<?=base_url()?>uploads/profile_pics/<?=$ad[0]['user_image']?>">
                    </div>
                    <div class="float-right px-2">
                        <h3 class="m-0 text-dark"><?=$ad[0]['nickname']?></h3>
                        <span class="view_profile">View Profile</span>

                    </div>
                    <div class="text-right pt-2 ico">
                     <i class="fas fa-chevron-right text-dark"></i>
                    </div>
                 </div>
                  </a>
                <?php
                $ads_id=$ad[0]['ads_id'];
                $pr_user_id=$ad[0]['user_id'];
                if (($this->session->userdata('userdata'))) {
                    $userdata=$this->session->userdata('userdata');
                    $user_id=$userdata[0]['user_id'];
                    if ($ad[0]['user_id']==$user_id) {
                        echo '<button class="btn btn-danger w-100 delete_ad" user_id="'.$pr_user_id.'" ads_id="'.$ads_id.'">DELETE THIS AD</button>';
                    }
                    else{
                        echo '<button class="btn btn-primary w-100 start_chat" user_id="'.$pr_user_id.'" ads_id="'.$ads_id.'"> CHAT WITH SELLER</button>';
                    }
                }
                else{
                    echo '<button class="btn btn-primary w-100 start_chat" user_id="'.$pr_user_id.'" ads_id="'.$ads_id.'">CHAT WITH SELLER</button>';
                }
                ?>
			</div>
       
			<div class="_25oXN border p-3 mt-3">
				<h5>Posted in</h5>
				<small><?=$ad[0]['city']?>, <?=$ad[0]['state']?>, <?=$ad[0]['country']?></small>
				<span>map</span>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $SpacingX: 5,
                $SpacingY: 5
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
<script type="text/javascript">jssor_1_slider_init();
    </script>
<script type="text/javascript">
$(document).on('click','.start_chat',function(){
    var el = $(this);
    var sess = <?=$sess?>;
    if (sess!=1) {
        $('#exampleModal').modal('show');
    }
    else{
        var user_id = $(this).attr('user_id');
        var ads_id = $(this).attr('ads_id');
        $.ajax({
            type:'POST',
            data:{
                user_id:user_id,
                ads_id:ads_id
            },
            url:'<?=base_url()?>WebController/insert_chat',
            success:function(response){
                var response=JSON.parse(response);
                if(response.status=="0"){
                    swal('OOPS','Something Went Wrong','error');
                }
                else{
                    var url = '<?=base_url()?>open-chat/'+response.chat_id;
                    window.location.href=url;
                }
            }
        })
    }
})

$(document).on('click','.delete_ad',function(){
    var ads_id=$(this).attr('ads_id');
    if(confirm('Are you sure you want to delete this ad? You wont be able to retrieve it')){
        $.ajax({
            type:'POST',
            data:{
                ads_id:ads_id
            },
            url:'<?=base_url()?>WebController/delete_ad',
            success:function(response){
                var response =JSON.parse(response);
                if (response.status==1) {
                    swal('Success','Ad Deleted Successfully','success');
                    var url='<?=base_url()?>';
                    window.location.href=url;
                }
                else{
                    swal('OOPS','SOMETHING WENT WRONG','error');
                }
            }
        })
    }
})
</script>