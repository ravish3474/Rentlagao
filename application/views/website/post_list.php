<style>
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 6px;
  top: .8em;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
}
.post_sx{
	position: relative !important;
     width: 300px !important;
    /* left: 0; */
    z-index: 1000;
    display: none;
     float: unset !important; 
    /* min-width: 10rem; */
    padding: .5rem 0;
    display: block !important;
    /* margin: .125rem 0 0; */
    /* font-size: 1rem; */
    /* color: #212529; */
    /* text-align: left; */
    /* list-style: none; */
    background-color: #fff;
    background-clip: padding-box;
    /* border: 1px solid rgba(0,0,0,.15); */
    /* border-radius: .25rem; */
}
</style>

<section class="container my-2">
	<div class="text-center"><h4>POST YOUR AD</h4>	</div>
		<div class="w-75 mar">
	        <ul class="dropdown-menu post_sx " aria-labelledby="navbarDropdownMenuLink">
	         <?php
           foreach ($fetch_categories as $categories) {
           ?>
	          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#"><?=$categories['category_name']?></a>
	            <ul class="dropdown-menu">
                <?php
                $cat_id=$categories['id'];
                $sql="select * from sub_categories WHERE cat_id = '$cat_id'";
                $query = $this->db->query($sql);
                $result=$query->result_array();
                foreach ($result as $res) {
                ?>
	               <li class="dropdown-submenu"><a class="dropdown-item " href="<?=base_url()?>create-ad/<?=$res['category_slug']?>"><?=$res['sub_name']?></a></li>
               <?php } ?>
	        	</ul>
	          </li>
          <?php } ?>
<!-- 	           <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
	            <ul class="dropdown-menu">
	               <li class="dropdown-submenu"><a class="dropdown-item " href="#">Subsubmenu</a>
	                <li class="dropdown-submenu"><a class="dropdown-item " href="#">Subsubmenu</a>
	               	<li class="dropdown-submenu"><a class="dropdown-item " href="#">Subsubmenu</a>
	              </li>
	        	</ul>
	          </li> -->
	        </ul>
      
  		</div>
	
</section>

<script>
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
</script>