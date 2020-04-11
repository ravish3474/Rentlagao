
    <footer>
        <div class="container">
            <div class="row py-4">
                  <div class="col-md-4 foot_hd">
                    <div class="p-3">
                        <a href="<?=base_url()?>" class=""><img src="<?=base_url()?>assets/web/images/logo.png" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-md-3 foot_hd">
                    <h6>POPULAR LOCATIONS</h6>
                    <ul class=" list-unstyled mt-4 m-0 __ftlst">
                        <?php
                        $sql="SELECT DISTINCT city from active_ads ORDER BY rand() LIMIT 4";
                        $query = $this->db->query($sql);
                        $result = $query->result_array();
                        foreach ($result as $rs) {
                        ?>
                        <li><a href="<?=base_url()?>WebController/set_location/<?=$rs['city']?>"><?=$rs['city']?></a></li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="col-md-3 foot_hd">
                    <h6>TRENDING LOCATIONS</h6>
                    <ul class=" list-unstyled mt-4 m-0 __ftlst">
                        <?php
                        $sql="SELECT DISTINCT city from active_ads ORDER BY rand() LIMIT 4";
                        $query = $this->db->query($sql);
                        $result = $query->result_array();
                        foreach ($result as $rs) {
                        ?>
                        <li><a href="<?=base_url()?>WebController/set_location/<?=$rs['city']?>"><?=$rs['city']?></a></li>
                    <?php } ?>
                    </ul>
                </div>
<!--                 <div class="col-md-2 foot_hd">
                    <h6>ABOUT US</h6>
                    <ul class=" list-unstyled mt-4 m-0 __ftlst">
                        <li><a href="">About OLX Group</a></li>
                        <li><a href="">Careers</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">OLX People</a></li>
                    </ul>
                </div> -->
<!--                 <div class="col-md-2 foot_hd">
                    <h6>OLX</h6>
                    <ul class=" list-unstyled mt-4 m-0 __ftlst">
                        <li><a href="">Help</a></li>
                        <li><a href="">Sitemap</a></li>
                        <li><a href="">Legal & Privacy Information</a></li>
                        <li><a href="">Delhi</a></li>
                    </ul>
                </div> -->
                <div class="col-md-2 foot_hd">
                    <h6>FOLLOW US</h6>
                    <ul class="d-flex list-unstyled mt-4 m-0 __ftl">
                        <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="bg-dark text-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        Rentlagao.com
                    </div>
                    <div class="col-md-6 text-right">
                        <span>Free Classified in India</span>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script type="text/javascript">
      $('.gallery-responsive').slick({
  dots: false,
  infinite: true,
  speed: 300,
  slidesToShow: 6,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

    </script>
</body>

</html>