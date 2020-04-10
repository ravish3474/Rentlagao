
<section class="container my-4">
	<div class="row">
		<div class="col-md-3">
			<div class="">
				<ul class="list-unstyled m-0 xxt_E" >
					<li>
						<a href="<?=base_url()?>my-profile" class="active">Edit Profile</a>
					</li>
					<li>
						<a href="<?=base_url()?>upload-profile-pic">Profile Picture</a>
					</li>
					<li>
						<a href="<?=base_url()?>view-profile/<?=$user_details[0]['user_id']?>" class="btn btn-default rui-1001X" >VIEW PROFILE</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="border">
				<form method="POST" action="<?=base_url()?>WebController/upload_profile">
					           <?php if($this->session->flashdata('add_category_message')): ?>
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo $this->session->flashdata('add_category_message'); ?>
            </div>
            <?php endif; ?>
				<div class="p-3 border-bottom">
					<h4>Edit Profile</h4>
				</div>
				<div class="p-3">
					<h6>Basic  Information</h6>
					<div class="row">
						<div class="col-md-6">
							<label class="form-group w-100">
								<input type="text" class="form-control" name="nickname" value="<?=$user_details[0]['nickname']?>" placeholder="Full Name">
							</label>
							 <textarea class="form-control" id="text" name="user_desc" maxlength="200" placeholder="Type in your message" rows="5"><?=$user_details[0]['user_desc']?></textarea>
	                          <span class="pull-right label label-default" id="count_message"></span>
	     
						</div>
						<div class="col-md-4">
							<div class="border p-2">
								<h6>Why is it important?</h6>
								<small>RentLagao is built on trust. Help other people get to know you. Tell them about the things you like. Share your favorite brands, books, movies, shows, music, food. And you will see the results…</small>
							</div>
						</div>
					</div>
								
				</div>
				<hr>
				<div class="p-3 border-bottom">
					<h6>Contact  Information</h6>
						<div class="row">
							<div class="col-md-6">
								<div class="d-flex border p-2">
									<div class="w-25"><span>+91 |</span></div>
									<div  class=" w-100">
										<input type="tel" maxlength="10" minlength="9" class="form-control" value="<?=$user_details[0]['user_mobile']?>" name="user_mobile" placeholder="Enter Mobile Number">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<small>This is the number for buyers contacts, reminders, and other notifications.</small>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-6">
								<div class="border p-2 w-100">
									<input type="email" class="form-control" name="user_email" value="<?=$user_details[0]['user_email']?>" placeholder="Enter Email here...">
								</div>							
							</div>
							<div class="col-md-6">
								<small>We won't reveal your email to anyone else nor use it to send you spam</small>
							</div>
						</div>
				</div>
				<div class="pv_taddt p-3">
					<!-- <h5>DISCARD </h5> -->

					<button class=" btn btn-primary X_datbn" type="submit">SAVE CHANGES</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</section>

  <div class="modal fade" id="mobileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body text-center">
	      	<h1>OLX</h1>
	      	<h5 class="my-4">Enter your phone to verify your account</h5>
	      	<span>We will send a confirmation code to your number</span>
	        <form class="p-3 my-2 text-center" id="number">
	        	<div class="d-flex justify-content-center">
					<div class="w-25"><input value="+91" disabled="" class=" form-control" ></div>
					<div  class="form-group w-100">
						<input type="text" class="form-control" name="name" placeholder="Mobile Number">
					</div>
				</div>
				<small>
					The phone number you provide here is only used to verify your account. It will not be made public.
				</small>
	           <div class="text-center mt-2">
	               <button class="btn btn-success w-100">NEXT</button>
	           </div>
	       </form>
	         <form class="p-3 my-2" id="otp">
	        	<div  class="form-group w-100">
						<input type="text" class="form-control" name="name" placeholder="Enter OTP">
				</div>
				
				
	           <div class="text-center mt-2">
	               <button class="btn btn-success w-100">VERIFY</button>
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

 <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body text-center">
	      	<h1>OLX</h1>
	      	<h5 class="my-4">Enter your Email to verify your account</h5>
	      	<span>We will send a confirmation code to your number</span>
	        <form class="p-3 my-2" id="number">
	        	
					<div  class="form-group w-100">
						<input type="email" class="form-control" name="name" placeholder="Enter Email">
					</div>
				
				<small>
					The phone number you provide here is only used to verify your account. It will not be made public.
				</small>
	           <div class="text-center mt-2">
	               <button class="btn btn-success w-100">NEXT</button>
	           </div>
	       </form>
	         <form class="p-3 my-2" id="otp">
	        	<div  class="form-group w-100">
						<input type="text" class="form-control" name="name" placeholder="Enter OTP">
					
				</div>
				
	           <div class="text-center mt-2">
	               <button class="btn btn-success w-100">VERIFY</button>
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
<script type="text/javascript">
	var text_max = 200;
$('#count_message').html('0 / ' + text_max );

$('#text').keyup(function() {
  var text_length = $('#text').val().length;
  var text_remaining = text_max - text_length;
  
  $('#count_message').html(text_length + ' / ' + text_max);
});
</script>