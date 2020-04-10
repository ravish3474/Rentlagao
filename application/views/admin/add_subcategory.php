           <?php if($this->session->flashdata('add_category_message')): ?>
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo $this->session->flashdata('add_category_message'); ?>
            </div>
            <?php endif; ?>
           <?php if($this->session->flashdata('add_category_message_success')): ?>
            <div class="alert-success">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo $this->session->flashdata('add_category_message_success'); ?>
            </div>
            <?php endif; ?>
            <h5 class="title font-weight-bold space bg-light p-3">Category / Add Sub Category</h5>
                <form class="mt-5" action="<?=base_url()?>AdminController/add_sub_category_ajax" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Select Category :</label>
                        </div>
                        <div class="col-md-9">
                              <div class="form-group">
                                <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                  <option value="" selected="" disabled="" required>Select Category</option>
                                  <?php
                                  foreach ($categories as $cats) {
                                   ?>
                                   <option value="<?=$cats['id']?>"><?=$cats['category_name']?></option>
                                   <?php
                                  }
                                  ?>
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Sub Category Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text"  class="form-control" name="sub_category_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Sub Category Slug:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text"  class="form-control" name="sub_category_slug" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                           <button type="submit" class="w-75 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Add</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <p class="bg-light p-3 w-100 text-center mt-3">© Copyright 2020 Rentlagao.com. All Rights Reserved</p>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>