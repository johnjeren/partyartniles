<script src="/js/fancySelect.js"></script>
<script>
jQuery.ready(function($){
  $('#ticket').fancySelect();
})

</script>
<section class="register-background register" id="section-6" data-stellar-background-ratio="0.5" style="background-position: 50% -98.5px;"> <!-- Start: Register Area, "#SECTION-6" -->
  <div class="overlay-color">
      <div class="container">
          <div class="row register-body pt80 pb80">

              <!-- Register Area Tetle Goes Here  -->
              <div class="col-sm-12 wow fadeInDown  animated" data-wow-offset="120" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; -webkit-animation-duration: 1.5s; animation-name: fadeInDown; -webkit-animation-name: fadeInDown;">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-offset-1 col-md-10">
                              <h3>Register Here to Join abut every single things heppening on our event and know more about this event.</h3>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Register Form Goes Here  -->
              <div class="col-sm-12 wow fadeInDown  animated" data-wow-offset="120" data-wow-duration="1.5s" style="visibility: visible; animation-duration: 1.5s; -webkit-animation-duration: 1.5s; animation-name: fadeInDown; -webkit-animation-name: fadeInDown;">

                  <form id="register-form" method="post" class="form input-group" _lpchecked="1">
                      <div class="container-fluid">
                          <div class="row">

                              <div class="col-md-2 col-sm-6">
                                  <input name="name" id="name" class="form-cus form-control" type="text" placeholder="Name" required="" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=);">
                              </div>

                              <div class="col-md-3 col-sm-6">
                                  <input name="email" id="email" class="form-cus form-control" type="email" placeholder="Email" required="">
                              </div>

                              <div class="col-md-2 col-sm-6">
                                  <input name="telephone" class="form-cus form-control" id="telephone" type="tel" placeholder="Telephone">
                              </div>

                              <div class="clearfix visible-xs"></div>

                              <div class="col-md-2 col-sm-6 dropDown">
                                <div class="fancy-select"><select name="ticket" id="ticket" class="form-cus form-control fancified" style="width: 1px; height: 1px; display: block; position: absolute; top: 0px; left: 0px; opacity: 0;">
                                              <option value="Silver">Silver</option>
                                              <option value="Gold">Gold</option>
                                              <option value="Platinum">Platinum</option>
                                          </select><div class="trigger">Silver</div><ul class="options"><li data-raw-value="Silver" class="selected">Silver</li><li data-raw-value="Gold">Gold</li><li data-raw-value="Platinum">Platinum</li></ul></div>
                              </div>

                              <div class="col-md-3 col-sm-12">
                                  <input type="submit" class="btn-fill btn-standard btn btn-cus" value="Register" name="submit">
                              </div>

                          </div>
                      </div>
                  </form>

              </div><!-- End: .col-sm-12  -->

          </div><!-- End: .register-body -->
      </div><!-- End: .container -->
  </div> <!-- End: .overlay-color -->
</section>
