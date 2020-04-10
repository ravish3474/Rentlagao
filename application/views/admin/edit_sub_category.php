<style>
 .table td, .table th {
    padding: .75rem;
    vertical-align: top !important;
     border-top: 0px solid #dee2e6 !important; 
      border-bottom: 1px solid #dee2e6 !important; 
}
</style>
           <?php if($this->session->flashdata('add_category_message')): ?>
            <div class="alert-success">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <?php echo $this->session->flashdata('add_category_message'); ?>
            </div>
            <?php endif; ?>
            <h5 class="title font-weight-bold space bg-light p-3">Category / View Category</h5> 
                    <div class="row">
                        <div class=" col-md-2">
                            <label for="email" class="ml-5">Select Category :</label>
                        </div>
                        <div class="col-md-9">
                              <div class="form-group">
                                <select class="form-control" name="category_id" id="select_category">
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
            <div class="row mt-5">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="font ">SNo</th>
                            <th class="font">Category Name</th>
                            <th class="font">Category Slug</th>
                            <th class="font">Category Image</th>
                            <th class="font ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
<!--                             <td><?=$count?></td>
                            <td><?=$category['category_name']?></td>
                            <td><?=$category['category_slug']?></td>
                            <td><img src="<?=base_url()?>uploads/category_images/<?=$category['category_image']?>"></td>
                            <td class="d-flex">
                                <a href="category_edit/<?=$category['id']?>"><button class="w-100 rounded-pill border-0 p-2 text-white font-weight-bold butn-style">Edit</button></a>
                                <button class="butn-size rounded-pill border-0 p-2 text-white font-weight-bold butn-style1 deleter" cat_id="<?=$category['id']?>">Delete</button>
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script>

$(document).on('change','#select_category',function(){
  var cat_id = $(this).val();
  $.ajax({
    type:'POST',
    data:{
      cat_id:cat_id
    },
    url:'<?=base_url()?>AdminController/fetch_sub_category',
    success:function(response){
      console.log(response);
    }
  })
})

    $(document).on('click','.deleter',function(){
        var cat_id = $(this).attr('cat_id');
          swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
            type:'POST',
            data:{
                cat_id:cat_id
            },
            url:'<?=base_url()?>AdminController/delete_category',
            success:function(response){
                console.log(response);
            }
        })
      }
    })
})
</script>