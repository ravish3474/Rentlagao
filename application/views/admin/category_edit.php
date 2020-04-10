           <?php if($this->session->flashdata('add_category_message')): ?>
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo $this->session->flashdata('add_category_message'); ?>
            </div>
            <?php endif; ?>
            <h5 class="title font-weight-bold space bg-light p-3">Category / Add Category</h5>
                <form id="update_category" class="mt-5">
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Category :</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text"  class="form-control" name="category_name" value="<?=$result[0]->category_name;?>" required>
                            <input type="hidden" value="<?=$result[0]->id?>" name="id">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Category Slug:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text"  class="form-control" name="category_slug" value="<?php
                            $slug = $result[0]->category_slug;
                            $explode = explode("-",$slug);
                            echo $implode = implode(" ", $explode);
                            ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Category Logo :</label>
                        </div>
                        <div class="col-md-9">
                            <img src="<?=base_url()?>uploads/category_images/<?=$result[0]->category_image?>?">
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Add Category Logo :</label>
                        </div>
                        <div class="col-md-9">
                            <input type="file"  class="form-control" name="category_image">
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
<script>
    $(document).on("submit","#update_category",function(event){
          event.preventDefault();   
          var form = $(this);
          var formData= new FormData(form[0]);
          $.ajax({
                    type: "POST",
                    url: '<?=base_url()?>AdminController/update_category',
                    data:formData,
                    contentType: false,
                    processData:false,
                    success:function(response){
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
      })
</script>