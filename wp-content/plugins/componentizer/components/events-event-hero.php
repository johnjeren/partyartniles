<header class="header-background header" id="header" data-stellar-background-ratio="0.5" style="background-position: 50% 0px;background:url(<?=get_img_src($top_background_image,'background')?>);background-size:cover;"> <!--Start: "Header Area"-->
  <div class="fix header-overlay overlay-color" style="min-height: 689px;">
    <div class="container">
      <div class="row header-body" id="header-body" style="padding-top: 154px; padding-bottom: 104.12154769897461px; position: relative;">

        <?php getComponent('components.special.countdown',[
          'date_time'=>date('Y/m/d H:i:s', $start_date)])?>

      <div class="col-md-offset-1 col-md-5 heading fadeInUp animated" data-wow-offset="120" data-wow-duration="1.5s">
        <h1><b><?=$title?></b></h1>
        <h2><?=$display_date?></h2>
      </div>

      <div class="col-md-5 pera fadeInUp animated" data-wow-offset="120" data-wow-duration="1.5s">
        <p><?=$short_desc?></p>
        <!-- Start: Button area -->
        <div class="buy-ticket btn-scroll">
          <div class="btn-group">
            <a href="#section-6" class="btn-fill btn-standard btn btn-cus">Register Now</a>
          </div>
        </div>
        <!-- End: Button area" -->

      </div><!-- End: col-md-5 pera  -->


    </div><!-- End: header-body  -->
  </div> <!-- End: container  -->


</div> <!-- End: fix header-overlay overlay-color  -->
</header>
