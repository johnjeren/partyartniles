<div class="header-v1 mobile-header <?=$header_settings['sticky']?'sticky':'fixed no-background'?> <?=$header_settings['is_transparent']?'transparent':''?>" style="">
  <div class="container">
    <?php
        if ( $header_settings['mobile_settings']['logo']){
          ?>
          <a href="/" class="logo-link <?=$header_settings['mobile_logo_alignment']?>">
            <img src="<?=get_img_src($header_settings['mobile_settings']['logo'],'full');?>" class="logo img-responsive" alt="">
          </a>
          <?php
        }
     ?>
    <div class="button-container <?=$header_settings['mobile_menu_expand_contract_alignment']?>" id="toggle">
      <?php
      $expand_button = $header_settings['mobile_menu_expand_button'];
      if($expand_button !== ''){
        echo $expand_button;
      }else{?>
        <i class='fa fa-bars'></i>
      <?php }
      ?>
    </div>
    <div class="overlay-menu-container <?=$header_settings['mobile_menu_animation']?> animated" id="overlay">
      <div class="container">
        <?php
            if ( $header_settings['mobile_settings']['mobile_overlay_menu_logo']){
              ?>
              <a href="/" class="overlay-logo-link <?=$header_settings['mobile_logo_alignment']?>">
                <img src="<?=get_img_src($header_settings['mobile_settings']['mobile_overlay_menu_logo'],'full');?>" class="logo img-responsive" alt="">
              </a>
              <?php
            }
         ?>
        <div class="overlay-button-container <?=$header_settings['mobile_menu_expand_contract_alignment']?>" id="toggle-close">
          <?php
          $close_button = $header_settings['mobile_menu_close_button_code'];
          if($close_button !== ''){
              echo $close_button;
          }else{?>
            <i class='fa fa-times'></i>
            <?php
          }
          ?>
        </div>
      </div>

      <nav class="overlay-menu">
        <div class="container">
          <?php
          wp_nav_menu( array(
              'menu'              => $header_settings['mobile_settings']['nav'],
              'depth'             => 2,
              'container'         => 'ul',
              'menu_class'        => 'main-navigation',
              'menu_id'=>'mobileNavigation'
              )
          ); ?>
          <?php
          if($header_settings['mobile_cta_button_position'] == 'in-menu' && count($header_settings['mobile_settings']['ctas']) > 0){
            ?>
            <div class="cta-buttons">
              <?php
                getComponent('components.molecules.action-buttons',['action_buttons'=>$header_settings['mobile_settings']['ctas'],'align'=>'center']);
              ?>
            </div>
          <?php
            }?>
        </div>
      </nav>
    </div>
  </div>
</div>
<script>
<?php if($header_settings['mobile_menu_animation'] == 'slide-down'){?>
  var menuAnimationIn = "slideInDown";
  var menuAnimationOut = "slideOutUp";
  <?php
}elseif($header_settings['mobile_menu_animation'] == 'slide-from-left'){
  ?>
  var menuAnimationIn = "slideInLeft";
  var menuAnimationOut = "slideOutLeft";
  <?php
}
elseif($header_settings['mobile_menu_animation'] == 'slide-from-right'){
  ?>
  var menuAnimationIn = "slideInRight";
  var menuAnimationOut = "slideOutRight";
  <?php
}
  ?>
  //var duration = .45;

  $().ready(function(){

    <?php if($header_settings['sticky'] == 'sticky' && !$header_settings['is_transparent'] ){?>
      pushContentForNav();
      $(window).resize(function(){
        pushContentForNav();
      });
    <?php } ?>
    $('.main-navigation .sub-menu').addClass('animated');
    //$(".animated").css('animation-duration','.5s');

    $('.header-v1 .sub-menu').addClass('animated');

    $('.header-v1 #toggle').click(function(){
        show($('#overlay'));
    })
    $('.header-v1 #toggle-close').click(function(){
        hide($("#overlay"));
     })
     $('.header-v1 .menu-item-has-children > a').click(function(){
       if($(this).hasClass('open')){
         $(this).removeClass('open');
         hideSubMenu($(this).siblings('.main-navigation .sub-menu'));
         return false;
       }else{
         $(this).addClass('open');
         showSubMenu($(this).siblings('.main-navigation .sub-menu'));
         return false;
       }

     })
  })
  function show(element){
    element.css("visibility","visible").removeClass(menuAnimationOut).addClass(menuAnimationIn);
  }
  function hide(element){
    element.removeClass(menuAnimationIn).addClass(menuAnimationOut);

  }
  function showSubMenu(element){
      element.slideDown(function(){
        element.show();
      })
  }
  function hideSubMenu(element){
    element.slideUp(function(){
      element.hide();
    })
  }

  function pushContentForNav(){
    console.log("PUSHING CONTENT");
      if($('.mobile-header').css('display') == 'none'){ //if we're on desktop
        $('.component:first').css('margin-top',$('.desktop-header').height()+20);
      }else{
        $('.component:first').css('margin-top',$('.mobile-header').height()+20);
      }

  }

</script>
