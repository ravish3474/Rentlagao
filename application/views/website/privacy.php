
<section class="container my-4">
	<div class="row">
		<div class="col-md-3">
			<div class="">
				<ul class="list-unstyled m-0 xxt_E" >
					<li>
						<a href="#" class="active">Change Password</a>
					</li>
<!-- 					<li>
						<a href="#">Notifications</a>
					</li>
					<li>
						<a href=""  >Deactivate account and forget me</a>
					</li>
					<li>
						<a href=""  >Chat safety tips</a>
					</li> -->
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="border">
				<div class="p-3">
					<div class="p-3 border-bottom">
						<h4>My Settings</h4>
					</div>
<!-- 					<div class="row">
						<div class="col-md-6">
							<span><strong>Show my phone number in ads</strong></span>
	     
						</div>
						<div class="col-md-4">
							<div class="text-right p-2">
								<label class="switch">
					              <input type="checkbox" checked>
					              <span class="slider12 round"></span>
					            </label>
					           
							</div>
						</div>
					</div> -->
				</div>
<!-- 				<hr> -->
			<form id="change_pass">
				<div class="p-3 border-bottom">
					<div class="p-3 border-bottom">
						<h4>Change Password</h4>
					</div>
					
					<div class="">
						<label class="form-group w-100">
							<input type="password" class="form-control" name="old_pass" placeholder="Current Password ">
						</label>
						<label class="form-group w-100">
							<input type="password" class="form-control" name="new_pass" id="new_password" placeholder="New Password">
							<!-- <small>Use minimum 6 characters, and at least one letter and one number</small> -->
						</label>
						<label class="form-group w-100">
							<input type="password" class="form-control" id="c_password" placeholder="Confirm new Password ">
						</label>
					</div>
				</div>
				<div class="p-3">
					<button class=" btn btn-primary X_datbn">CHANGE PASSWORD</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</section>
<script>
    $(document).on("submit","#change_pass",function(event){
          event.preventDefault();  
          var pass = $('#new_password').val();
          var cpass= $('#c_password').val();
          if (pass!=cpass) {
            swal('Sorry','Password and Confirm Password Fields are not same','warning');
          }
          else{
          var form = $(this);
          var formData= new FormData(form[0]);
          $.ajax({
                type: "POST",
                url: '<?=base_url()?>WebController/change_pass_ajax',
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
                  else{
                      swal('OOPS',response.msg,'error');
                  }
                }
             });
          }
      })
</script>
