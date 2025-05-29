<section class=" about-our-event" id="section-1"><!-- Start: about-our-event, "SECTION-1" -->
  <div class="container">
    <!-- Start: About Our Event Area  -->
    <div class="row about-our-event-body">
      <!-- Start: About-Our-Event Left Area  -->
      <div class="about-our-event-left col-md-5 wow fadeInLeft  animated" data-wow-offset="120" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; -webkit-animation-duration: 1.5s; animation-name: fadeInLeft; -webkit-animation-name: fadeInLeft;">
        <div class="about-our-event-left-body pt80 pb80">
          <h2><?=$title?></h2>
          <p><?=$text?></p>

        </div>
      </div>
      <!-- End: About-Our-Event Left Area  -->
      <!-- Start: About-Our-Event Right Area  -->
      <div class="about-our-event-right col-md-offset-1 col-md-6 wow fadeInRight  animated" data-wow-offset="120" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; -webkit-animation-duration: 1.5s; animation-name: fadeInRight; -webkit-animation-name: fadeInRight;">
        <div class="container-fluid pt40 pb40">
          <div class="row about-our-event-right-body">
            <?php
            foreach($details as $d){
              ?>
              <div class="col-sm-12 background event-about" style="border-bottom:2px #fff solid;padding-bottom:15px;">
                <span class="title style-all"><?=$d['title']?></span>
                <span class="details"><?=$d['text']?></span>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
      <!-- End: About-Our-Event Right Area  -->
    </div>
    <!-- End: About Our Event Area  -->
    <!-- Start: About-Our-Event Overlay background Area  -->
    <div class="about-background-image">
      <!-- About-Our-Event Overlay background Left Area  -->
      <div class="background-left col-sm-12 col-md-6" style="min-height: 384px;"></div>
      <!-- About-Our-Event Overlay background Right Area  -->
      <div class="bg-img-3 background-right col-sm-12 col-md-6" style="min-height: 384px;">
        <div class="background-right-overlay-color" style="min-height: 384px;"></div>
      </div>
    </div> <!--  about-background-image  -->
  </div> <!-- End: container -->
</section>
<script>
var aboutOurEventLeft = function(){
      var leftHeight = $('.about-our-event-left').height();
      var rightHeight = $('.about-our-event-right').height();

      if(leftHeight >= rightHeight){
          $(".background-left").css('min-height', leftHeight);
          $(".background-right").css('min-height', leftHeight);
          $(".background-right-overlay-color").css('min-height', leftHeight);
      }else{
          $(".background-left").css('min-height', rightHeight);
          $(".background-right").css('min-height', rightHeight);
          $(".background-right-overlay-color").css('min-height', rightHeight);
      }
  }

aboutOurEventLeft();
</script>
