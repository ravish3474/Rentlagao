<?php 
include"header.php";
?>
<style>

</style>

<section class="container my-4">
	<div class="row">
		<div class="col-md-3">
			<div class="">
				<ul class="list-unstyled m-0 xxt_E" >
					<li>
						<a href="bought_packages.php" >Bought Packages</a>
					</li>
					<li>
						<a href="billing.php" class="active">Billing</a>
					</li>
					<li>
						<a href=""  >Invoices</a>
					</li>
					
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="border">
				<form method="" action="">
				<div class="p-3 border-bottom">
						<h4>Billing information</h4>
					</div>
				<div class="p-3">
					<h5>Customer Information</h5>
					<div class="row">
						<div class="col-md-6">
							<label class="form-group w-100">Do you have a GST Number?
							<select class="form-control" name="name">
								<option selected="" disabled="">Do you have a GST number ?</option>
								<option value="">Yes</option>
								<option value="">No</option>
							</select>
						</label>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label class="form-group w-100">Email
								<input type="email" class="form-control" name="name" >
							</label>
								<label class="form-group w-100">Business Name
								<input type="text" class="form-control" name="name" >
							</label>
						</div>
						<div class="col-md-6">
							<label class="form-group w-100">Customer Name
								<input type="text" class="form-control" name="name" >
							</label>
							<label class="form-group w-100">GST Number
								<input type="number" class="form-control" name="name" >
							</label>
						</div>
					</div>
					<hr>
					<h5>Customer Information</h5>
					<div class="row">
						<div class="col-md-6">
							<label class="form-group w-100">Address line 1
								<input type="text" class="form-control" name="name" >
							</label>
							<label class="form-group w-100">State
								<select class="form-control" name="name">
									<option selected="" disabled="">Select </option>
								</select>
							</label>
						</div>
						<div class="col-md-6">
							<label class="form-group w-100">Address line 2
								<input type="text" class="form-control" name="name" >
							</label>
							<label class="form-group w-100">City
								<select class="form-control" name="name">
									<option selected="" disabled="">Select </option>
								</select>
							</label>
						</div>
					</div>
				</div>
			
				<div class="p-3 text-right">
					<button class=" btn btn-primary X_datbn">SAVE CHANGES </button>
				</div>
			</form>
			</div>
		</div>
	</div>
</section>

<?php 
include"footer.php";
?>