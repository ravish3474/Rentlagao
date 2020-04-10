<?php 
	include"header.php";
?>
<section class="container my-5">
	<div class="border w-50 ma_auto p-5">
		<div class="text-center mb-4"><h4>SELECT OPTIONS TO SHOW PACKAGES</h4></div>
		<form class="mt-2">
			<label class="form-group w-100">
				<select class="form-control" name="" required="">
					<option selected="" disabled="">Select Category *</option>
				</select>
			</label>
			<br>
			<label class="form-group w-100">
				<select class="form-control" name="" required="">
					<option selected="" disabled="">Select Subcategory *</option>
				</select>
			</label>
			<br>
			<label class="form-group w-100">
				<input class="form-control" name="" placeholder="Enter Location"> 
			</label>
			<div class="p-2">
				<button class="btn btn-primary w-100">
					SHOW PACKAGES
				</button>
			</div>
		</form>
	</div>
</section>
<?php 
	include"footer.php";
?>