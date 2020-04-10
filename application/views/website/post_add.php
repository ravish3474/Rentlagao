<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<section class="container my-2">
	<div class="text-center"><h4>POST YOUR AD</h4>	</div>
		<div class="p-2 w-50 ma_auto border">
      <div class="border-bottom">
	         <h5>SELECTED CATEGORY</h5>
           <ul class="d-flex list-unstyled srtct ">
            <li>
              <a href="#"> Home </a><span class="mx-1">/</span> 
            </li> 
            <li>
              <a href="#"> <?=$cat_data[0]['category_name']?> </a><span class="mx-1">/</span> 
            </li>
            <li>
              <a href="#"> <?=$cat_data[0]['sub_name']?> </a><span class="mx-1"></span> 
            </li>
<!--             <li>
              <a href="#" class="_3OiU0"> CHANGES </a> 
            </li> -->
          </ul>
      </div>
      <form id="add_post">
        <div class="p-3 border-bottom">
          <h5>INCLUDE SOME DETAILS</h5>
         <label class="form-group w-100">Category Selected <sup class="text-danger" >*</sup>
           <input type="text" disabled="" value="<?=$cat_data[0]['category_name']?>" class="form-control" required="">
          </label>

         <label class="form-group w-100">Sub Category Selected <sup class="text-danger" >*</sup>
           <input type="text" disabled="" value="<?=$cat_data[0]['sub_name']?>" class="form-control" required="">
          </label>
          <input type="hidden" value="<?=$cat_data[0]['sub_id']?>" name="sub_id">
          <input type="hidden" value="<?php 
          $userdata=$this->session->userdata('userdata');
          echo $userdata[0]['user_id'];
          ?>" name="user_id">
           <label class="form-group w-100"> Product Name <sup class="text-danger" >*</sup>
           <input type="text" name="product_name" class="form-control" required="">
          </label>
           <label class="form-group w-100">Basic Description <sup class="text-danger" >*</sup>
            <input type="text" name="basic_desc" class="form-control" required="">
          </label>
          <label class="form-group w-100"> Detailed Description <sup class="text-danger" >*</sup>
             <textarea class="form-control" id="text" name="description" maxlength="70" placeholder="Type in your message" rows="5" required=""></textarea>
             <span class="pull-right label label-default" id="count_message"></span>
          </label>
          <script>
                  CKEDITOR.replace( 'description' );
          </script>
        </div>
        <div class="p-3 border-bottom">
          <h5>SET A PRICE</h5>
            <label class="form-group w-100"> Price <sup class="text-danger" >*</sup>
                <input type="number" name="price" class="form-control" required="">
            </label>
        </div>
        <div class="p-3 border-bottom">
          <h5>UPLOAD UPTO 12 PHOTOS</h5>
            <label class="form-group w-100"> Photos <sup class="text-danger" >*</sup>
                <input type="file" name="photos[]" multiple="" class="form-control" required="">
            </label>
        </div>
        <div class="p-3 border-bottom">
          <h5>CONFIRM YOUR LOCATION</h5>
            <label class="form-group w-100"> Country <sup class="text-danger" >*</sup>
              <select  Class="form-control" id="country_change" required="">
                <option selected="" disabled="">Select </option>
                <?php
                foreach ($countries as $cntry) {
                ?>
                <option value="<?=$cntry['country_id']?>"><?=$cntry['name']?></option>
              <?php } ?>
              </select>
            </label>
            <label class="form-group w-100"> State <sup class="text-danger" >*</sup>
              <select  Class="form-control"  id="states_change" required="">
                <option selected="" disabled="">Select </option>
              </select>
            </label>
            <label class="form-group w-100"> City <sup class="text-danger" >*</sup>
              <select  Class="form-control" required="" id="city_change">
                <option selected="" disabled="">Select </option>
              </select>
            </label>

<!--             <label for="current_location" class="_3OiU0">CURRENT LOCATION</label>
            <input type="hidden" id="current_location"> -->
        </div>
<!--       </form>  
      <form class=""> -->
      <div class="p-3 border-bottom">
          <h5>REVIEW YOUR DETAILS</h5>
              <div class="d-flex pl-2">
                  <div class="w-25">
                         <img src="<?=base_url()?>assets/web/assets/img/user.png" class="rounded-circle img-fluid">
                         <div class=""></div>
                  </div>
                  <div class="ml-1">
                    <label class="form-group w-100"> Name <sup class="text-danger" >*</sup>
                      <input type="text" name="name" class="form-control"  required="">
                    </label>
                  </div>
              </div>
              <h6>Let's verify your account</h6>
            <small>We will send you a confirmation code by sms on the next step.</small>
            <label class="form-group mt-3 w-100"> Mobile Number <sup class="text-danger" >*</sup>
                <input type="text" name="mobile" class="form-control" required="">
            </label>
           
           <div class="">
            <span>Show my phone number on my ads</span>
            <label class="switch">
              <input type="checkbox" checked>
              <span class="slider12 round"></span>
            </label>
           </div>
        </div>
        <div class="p-3">
          <button class="btn btn-primary" type="submit">POST NOW</button>
        </div>
      </form>
  	</div>
	
</section>
<script>
    $(document).on("submit","#add_post",function(event){
          event.preventDefault();   
          var form = $(this);
          var formData= new FormData(form[0]);
          var country = $('#country_change').find(":selected").text();
          var state = $('#states_change').find(":selected").text();
          var city = $('#city_change').find(":selected").text();
          formData.append('country',country);
          formData.append('state',state);
          formData.append('city',city);
          $.ajax({
                    type: "POST",
                    url: '<?=base_url()?>WebController/add_post',
                    data:formData,
                    contentType: false,
                    processData:false,
                    success:function(response){
                      console.log(response);
                        var response = JSON.parse(response);
                        if (response.status=="1") {
                            swal('Success',"Ad Posted Successfully",'success');
                            location.reload();
                        }
                        else{
                            swal('OOPS',"Something Went Wrong",'error');
                        }
                    }
             });
      })
</script>

<script type="text/javascript">
  $(document).on('change','#country_change',function(){
    var val = $(this).val();
    $.ajax({
      type:'POST',
      data:{
        val:val
      },
      url:'<?=base_url()?>WebController/fetch_country',
      success:function(response){
        var response= JSON.parse(response);
        var html='';
        html+='<option selected="" disabled="">Select </option>';
        for(var i=0;i<response.states.length;i++){
          html+='<option value="'+response.states[i].states_id+'">'+response.states[i].name+'</option>';
        }
        $('#states_change').empty();
        $('#states_change').append(html);
      }
    })
  })

$(document).on('change','#states_change',function(){
    var val = $(this).val();
    $.ajax({
      type:'POST',
      data:{
        val:val
      },
      url:'<?=base_url()?>WebController/fetch_city',
      success:function(response){
        var response= JSON.parse(response);
        var html='';
        html+='<option selected="" disabled="">Select </option>';
        for(var i=0;i<response.states.length;i++){
          html+='<option value="'+response.states[i].cities+'">'+response.states[i].name+'</option>';
        }
        $('#city_change').empty();
        $('#city_change').append(html);
      }
    })
  })
</script>

<script type="text/javascript">
  var text_max = 4000;
$('#count_message1').html('0 / ' + text_max );

$('#text1').keyup(function() {
  var text_length = $('#text').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message1').html(text_length + ' / ' + text_max);
});
</script>

<script type="text/javascript">
  var text_max = 70;
$('#count_message').html('0 / ' + text_max );

$('#text').keyup(function() {
  var text_length = $('#text').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message').html(text_length + ' / ' + text_max);
});
</script>
