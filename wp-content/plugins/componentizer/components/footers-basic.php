<footer class="color-footer">
  <div class="widget-area">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="about-widget">
            <div class="widget-title">
              <img src="<?=templatePath()?>/img/logo-light.png" alt="">
            </div>
            </div><!-- / about-widget -->
          </div><!-- / col-sm-6 col-md-3 -->
          <!-- / first widget -->

          <div class="col-sm-6 col-md-4">

          </div><!-- / col-sm-6 col-md-3 -->
          <!-- / third widget -->

          <div class="col-sm-6 col-md-4">
            <div class="widget-title">
              <h4>Contact</h4>
            </div>
            <div class="contact-widget">
              <div class="info">
                <p><i class="fa fa-map-marker"></i><span>123 Main St
                  <br />Canton, Ohio 44614</span></p>
              </div>
              <div class="info">
                <a href="tel:+0123456789"><i class="fa fa-phone"></i><span>(330)555-5555</span></a>
              </div>
              <div class="info">
                <a href="mailto:hello@yoursite.com"><i class="fa fa-envelope"></i><span>office@yoursite.com</span></a>
              </div>
              <div class="info">
                <p class="social pull-left">
                  <a class="no-margin" href="#" style="margin-left:0;"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                </p>
              </div>
            </div><!-- / contact-widget -->
          </div><!-- / col-sm-6 col-md-3 -->
          <!-- / fourth widget -->
        </div><!-- / row -->
      </div><!-- / container -->
    </div><!-- / widget-area -->
    <div class="container">
      <p class="footer-info text-center">© <?=date("Y")?> - <?=config('site.site_title')?></p>
    </div><!-- / container -->
  </footer>
  <?php wp_footer()?>
  </body>
</html>
