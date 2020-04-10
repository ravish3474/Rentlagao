
<section class="container my-4">
	<div class="row">
		<div class="col-md-3">
			<div class="">
				<ul class="list-unstyled m-0 xxt_E" >
					<li>
						<a href="<?=base_url()?>my-profile">Edit Profile</a>
					</li>
					<li>
						<a href="<?=base_url()?>upload-profile-pic"  class="active">Profile Picture</a>
					</li>
					<li>
						<a href="<?=base_url()?>view-profile/<?=$user_details[0]['user_id']?>" class="btn btn-default rui-1001X" >VIEW PROFILE</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="border">
				<form method="" action="">
				<div class="p-3 border-bottom">
					<h6>Profile Picture</h6>
				</div>
				<div class="p-3">
					
					<div class="row">
						<div class="col-md-4">
							<img src="<?=base_url()?>uploads/profile_pics/<?=$user_details[0]['user_image']?>" class="img-fluid">
	     
						</div>
						<div class="col-md-5">
							<div class=" p-5">
								<form class="">
									<label for="uploadPic" class="w-100 btn btn-default rui-1001X">UPLOAD PROFILE PICTURE</label>
									<input type="file" name="" class="d-none" id="uploadPic">
								</form>
							</div>
						</div>
					</div>
								
				</div>
				
			</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	var text_max = 200;
$('#count_message').html('0 / ' + text_max );

$('#text').keyup(function() {
  var text_length = $('#text').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message').html(text_length + ' / ' + text_max);
});
</script>


<script type="text/javascript">
$('input:file').on('change', function () {  

 var data = new FormData();

 //Append files infos
 jQuery.each($(this)[0].files, function(i, file) {
     data.append('file-'+i, file);
 });

 $.ajax({  
     url: "<?=base_url()?>WebController/image_handler",  
     type: "POST",  
     data: data,  
     cache: false,
     processData: false,  
     contentType: false, 
     context: this,
     success: function (response) {
          var response=JSON.parse(response);
          if (response.status==1) {
          	swal('Success','Profile Updated Successfully','success');
          	location.reload();
          }
          else{
          	swal('OOPS','SOMETHING WENT WRONG','error');
          }
      }
  });
});
</script>