<?php
$sess = 0;
if($this->session->userdata('userdata')){
  $sess = 1; 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/web/assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/web/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
      <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/web/assets/css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <link rel="stylesheet" type="text/css" href="assets/css/slides.css"> -->
      <!-- <script src="assets/js/slides.js"></script> -->
  
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
<script src="<?=base_url()?>assets/web/assets/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
.navbar .dropdown-menu div[class*="col"] {
   margin-bottom:1rem;
}
.clicker{
  cursor: pointer;
}
.nav-link{
  color: black!important;
}
.navbar .dropdown-menu {
  border:none;
  background-color:#fff!important;
}
 .drops{
position: absolute;
    background: white;
    /* border: 1px solid red; */
    top: 46px;
    left:   170px;
    margin-left: 0px;
    z-index: 122;
    width: 248px;  height: auto;
  /* min-height: 100px; */
  max-height: 220px;
  overflow-y: scroll;
} 
  .dropper li{
    list-style: none;
    padding:5px 0px ;
  }
   .dropss{
position: absolute;
    background: white;
    /* border: 1px solid red; */
    top: 46px;
   left: 439PX;
    margin-left: 0px;
    z-index: 122;
    width: 631px;  height: auto;
  /* min-height: 100px; */
  max-height: 220px;
  overflow-y: scroll;
} 
  .droppers li{
    list-style: none;
    padding:5px 0px ;
  }
@media only screen and (max-width: 600px) {
   .drops{
    position: absolute;
    background: white;
    /* border: 1px solid red; */
    top: 182px;
    left: 15px;
    margin-left: 0px;
    z-index: 122;
    width: 150px;
    height: auto;
    /* min-height: 100px; */
    max-height: 220px;
    overflow-y: scroll;
} 
  .dropper li{
    list-style: none;
    padding:5px 0px ;
  }
   .dropss{
position: absolute !important;
    background: white;
    /* border: 1px solid red; */
    top: 180px !important;
   left: 130PX !important;
    margin-left: 0px !important;
    z-index: 122 !important;
    width: 220px !important; 
     height: auto;
  /* min-height: 100px; */
  max-height: 220px;
  overflow-y: scroll;
} 
  .droppers li{
    list-style: none;
    padding:5px 0px ;
  }

  }
/* breakpoint and up - mega dropdown styles */
@media screen and (min-width: 992px) {
  
  /* remove the padding from the navbar so the dropdown hover state is not broken */
.navbar {
  padding-top:0px;
  padding-bottom:0px;
}

/* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
.navbar .nav-item {
  padding:.5rem .5rem;
  margin:0 .25rem;
}

/* makes the dropdown full width  */
.navbar .dropdown {position:static;}

.navbar .dropdown-menu {
  width:100%;
  left:0;
  right:0;
/*  height of nav-item  */
  top:45px;
  
  display:block;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.3s linear;
  
}

  
  /* shows the dropdown menu on hover */
.navbar .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
  display:block;
  visibility: visible;
  opacity: 1;
  transition: visibility 0s, opacity 0.3s linear;
}
  
  .navbar .dropdown-menu {
    border: 1px solid rgba(0,0,0,.15);
    background-color: #fff;
  }

}
body
{
font-family: Roboto,Arial,Helvetica,sans-serif !important;

}
</style>
</head>

<body>
<script type="text/javascript">
  $(document).on('keyup','.pac_input',function(){
    var name = $(this).val();
    if(name.length==0){
      $('.dropper').hide();
    }
    else{
      $('.drops').show();
    $.ajax({
      type:'POST',
      data:{
        name:name
      },
      url:'<?=base_url()?>WebController/fetch_cities',
      success:function(response){
        var response = JSON.parse(response);
        $('.dropper').empty();
        var html='';
        html+='<li class="mt-2">POPULAR LOCATIONS</li><hr>';
        for(var i=0;i<response.length;i++){
             
          html+='<li><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><a href="<?=base_url()?>WebController/set_location/'+response[i].city+'">'+response[i].city+'</li>';
            $('.dropper').append(html);
        }
        $('.dropper').show();
        // $('.dropper').empty();
        // $('.dropper').append(html);
        // $('.dropper').show();
      }
    })
  }
  })

  $(document).on('keyup','.searcher',function(){
    var name=$(this).val();
    var location = $('.pac_input').val();
    if(name.length==0){
      $('.droppers').hide();
    }
    else{
      $.ajax({
        type:'POST',
        data:{
          name:name,
          location:location
        },
        url:'<?=base_url()?>WebController/fetch_products',
        success:function(response){
          var response=JSON.parse(response);
          if (response.status=="0") {
            $('.droppers').empty();
            $('.droppers').hide();
          }
          else{
            var html='';
            for(var i=0;i<response.data.length;i++){
              html+='<li class="clicker">'+response.data[i].product_name+'</li>';
            }
            $('.droppers').empty();
            $('.droppers').append(html);
            $('.droppers').show();
          }
        }
      })
    }
  })

$(document).on('click','.clicker',function(){
  var name = $(this).html();
  $('.searcher').val(name);
  $('.droppers').hide();
})
</script> 
    <header class="bg-light">
        <nav class="container navbar navbar-expand-lg navbar-light "> 
          <a class="navbar-brand m-0" href="<?=base_url()?>" data-abc="true"><img class="img img-fluid" src="<?=base_url()?>assets/web/images/logo.png" style=" height: 38px !important;"></a> 
            
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> -->

            <form class="form-inline my-2 my-lg-0 text-center w-75 desk" action="<?=base_url()?>search-results" method="POST">
                <input class="form-control w-25 serHt pac_input" type="text" name="city_name" value="<?=$location?>" placeholder="Search">
                 <div class="row drops text-left" style="display:none">
                    <div class="col">
                        <ul class="dropper p-0" >
                          
                        </ul>
                    </div>
                  </div>
                <input class="ml-2 form-control mr-sm-2 HTx_serc serHt searcher" type="text" name="search_name" placeholder="Search"> 
                  <div class="row dropss text-left">
                  <div class="col p-0">
                      <ul class=" list-group droppers" style="display: none">

                      </ul>
                  </div>
                </div>
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
            
            <div class="" id="" style="position: absolute;right: 0px;">
                <ul class="nav_cxt">
                  <?php
                  if($this->session->userdata('userdata')){
                    $userdata=$this->session->userdata('userdata');
                    echo '<li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">'.$userdata[0]['nickname'].'</a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="'.base_url().'my-advertisements">My Ads</a>
                              <a class="dropdown-item" href="'.base_url().'chat">Chats</a>
                              <a class="dropdown-item" href="'.base_url().'my-profile">My Profile</a>
                              <a class="dropdown-item" href="'.base_url().'change-password">Settings</a>
                              <a class="dropdown-item" href="'.base_url().'WebController/logout">Logout</a>
                            </div>
                            </li>';
                   }else{ ?>
                    <li class="nav-item"> <a class="nav-link Lxrt_" href="JavaScript:void(0)" data-abc="true" data-toggle="modal" data-target="#exampleModal">LOGIN</a> </li>
                  <?php  } ?>
                    <li class="nav-item ml-2"> <a class="nav-link btn btn-primary X_datbn check_login" href="JavaScript:void(0)" data-toggle="modal" data-target="#exampleModal" data-abc="true"><i class="fas fa-camera-retro"></i> SELL</a> </li>
                </ul>

            </div>
             
        </nav>
<script type="text/javascript">
$(document).on('click','.check_login',function(){
  var sess = <?=$sess?>;
  if (sess!=1) {
    $('#exampleModal').modal('show');
  }
  else{
    var url = "<?=base_url()?>post";
    window.location.href=url;
  }
})  
</script>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#fff ">
<!--   <a class="navbar-brand" href="#">Mega Dropdown</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          All Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          
          <div class="container">
            <div class="row">
              <?php
              $nsql="SELECT * FROM categories";
              $query=$this->db->query($nsql);
              $result=$query->result_array();
              foreach ($result as $cat) {
              ?>
              <div class="col-md-3">
                <span class="text-uppercase text-black"><b><?=$cat['category_name']?></b></span>
                <ul class="nav flex-column">
                  <?php
                  $cat_id=$cat['id'];
                  $newsl="SELECT * FROM sub_categories WHERE cat_id='$cat_id'";
                  $qs=$this->db->query($newsl);
                  $rs=$qs->result_array();
                  foreach ($rs as $subcat) {
                  ?>
                <li class="nav-item p-0">
                  <a class="nav-link" href="<?=base_url()?>view-ads/<?=$cat['category_slug']?>/<?=$subcat['category_slug']?>"><?=$subcat['sub_name']?></a>
                </li>
              <?php } ?>
              </ul>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </li>
      <?php
      $slq="SELECT * FROM categories ORDER BY rand() LIMIT 8";
      $sq=$this->db->query($slq);
      $sr=$sq->result_array();
      foreach ($sr as $rav) {
      ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>view-ads/<?=$rav['category_slug']?>"><?=$rav['category_name']?></a>
      </li>
    <?php } ?>
    </ul>
  </div>


</nav>
        <div >
         <form class="form-inline my-2 my-lg-0 w-100 mobile" action="<?=base_url()?>search-results" method="POST">
                 <input class="form-control w-25 serHt pac_input" type="text" name="city_name" value="<?=$location?>" placeholder="Search"> 
                    <div class="row drops text-left" style="display:none">
                    <div class="col">
                        <ul class="dropper p-0" >
                          
                        </ul>
                    </div>
                  </div>
                <input class="ml-2 form-control mr-sm-2 HTx_serc serHt searcher"  type="text" name="search_name" type="text" placeholder="Search"> 
                  <div class="row dropss text-left">
                  <div class="col p-0">
                      <ul class=" list-group droppers" style="display: none">

                      </ul>
                  </div>
                </div>
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> 
            </form>
        </div>
    </header>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-3" id="register">
           <div class="">
                <label class="form-group w-100"> Enter Nickname  <sup class="text-danger" >*</sup>
                  <input type="text" name="nickname" class="form-control"  required="">
                </label> 
                <label class="form-group w-100"> Email  <sup class="text-danger" >*</sup>
                  <input type="email" name="user_email" class="form-control"  required="">
                </label> 
                <label class="form-group w-100"> Password <sup class="text-danger" >*</sup>
                  <input type="password" id="u_pass" name="user_password" class="form-control"  required="">
                </label> 
                <label class="form-group w-100">Confirm Password <sup class="text-danger" >*</sup>
                  <input type="password" id="c_pass" class="form-control"  required="">
                </label> 
           </div>
<!--             <div class="text-left"><a href="" >Forgot Password ?</a></div> -->
            <div class="text-right"><a href="#" id="signin">Sign In</a></div>
           <div class="text-center mt-2">
               <button class="btn btn-success w-100" type="submit">SUBMIT</button>
           </div>
       </form>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="p-3" id="sigin_form">
           <div class="">
                <label class="form-group w-100"> Email  <sup class="text-danger" >*</sup>
                  <input type="email" name="email" class="form-control"  required="">
                </label> 
                <label class="form-group w-100"> Password <sup class="text-danger" >*</sup>
                  <input type="password" name="password" class="form-control"  required="">
                </label> 
           </div>
            <div class="text-left"><a href="" >Forgot Password ?</a></div>
            <div class="text-right"><a href="#" id="signup">Sign Up</a></div>
           <div class="text-center mt-2">
               <button class="btn btn-success w-100" type="submit">SUBMIT</button>
           </div>
       </form>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<script>
    $(document).on("submit","#sigin_form",function(event){
          event.preventDefault();  
          var form = $(this);
          var formData= new FormData(form[0]);
          $.ajax({
                type: "POST",
                url: '<?=base_url()?>WebController/login',
                data:formData,
                contentType: false,
                processData:false,
                success:function(response){
                  //console.log(response);
                  var response = JSON.parse(response);
                  if (response.status=="1") {
                      swal('Success','Login Successfull','success');
                      location.reload();
                  }
                  else{
                      swal('OOPS','Invalid Credentials','error');
                  }
                }
             });
      })


    $(document).on("submit","#register",function(event){
          event.preventDefault();  
          var pass = $('#u_pass').val();
          var cpass= $('#c_pass').val();
          if (pass!=cpass) {
            swal('Sorry','Password and Confirm Password Fields are not same','warning');
          }
          else{
          var form = $(this);
          var formData= new FormData(form[0]);
          $.ajax({
                type: "POST",
                url: '<?=base_url()?>WebController/add_user',
                data:formData,
                contentType: false,
                processData:false,
                success:function(response){
                  //console.log(response);
                  var response = JSON.parse(response);
                  if (response.status=="1") {
                      swal('Success',response.msg,'success');
                      location.reload();
                  }
                  else if(response.status=="2"){
                      swal('User Exists',response.msg,'error');
                  }
                  else{
                      swal('OOPS',response.msg,'error');
                  }
                }
             });
          }
      })

$(document).on('click','#signup',function(){
    $('#exampleModal').modal('hide');
    $('#registerModal').modal('show');
})

$(document).on('click','#signin',function(){
      $('#registerModal').modal('hide');
    $('#exampleModal').modal('show');

})
  $(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready

// breakpoint and up  
$(window).resize(function(){
    if ($(window).width() >= 980){  

      // when you hover a toggle show its dropdown menu
      $(".navbar .dropdown-toggle").hover(function () {
         $(this).parent().toggleClass("show");
         $(this).parent().find(".dropdown-menu").toggleClass("show"); 
       });

        // hide the menu when the mouse leaves the dropdown
      $( ".navbar .dropdown-menu" ).mouseleave(function() {
        $(this).removeClass("show");  
      });
  
        // do something here
    }   
});  
  
  

// document ready  
});
</script>

<script>
  $(document).on('click','.favourite',function(){
    var adv_id=$(this).attr('adv_id');
    var sess = <?=$sess?>;
    if (sess==0) {
      $('#exampleModal').modal('show');
    }
    else{
      $.ajax({
        type:'POST',
        data:{
          adv_id:adv_id,
        },
        url:'<?=base_url()?>WebController/add_fav',
        success:function(response){
          var response=JSON.parse(response);
          if (response.status=="1") {
            swal('Success','Added To Your favourites','success');
          }
          else{
            swal('Exists','Already Exists In your favourites','warning');
          }
        }
      })
    }
  })
</script>