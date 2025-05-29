<?php getComponent('components.core.header');

$header_vars = [
  'sticky',
  'container_class',
  'use_bootstrap_columns',
  'background_color',
  'scrolled_background_color',
  'components',
  'mobile_logo_alignment',
  'mobile_menu_expand_contract_alignment',
  'mobile_menu_expand_button',
  'mobile_menu_close_button_code',
  'mobile_menu_animation',
  'mobile_menu_open_full_screen',
  'mobile_cta_button_position',
  'mobile_header_logo',
  'mobile_header_menu_logo',
  'mobile_header_scrolled_logo'
];
$header_settings = [
  'mobile_settings'=>[]
];
foreach ($header_vars as $v){
  $header_settings[$v] = function_exists('get_field') ? get_field('header_'.$v,'option') : '';
}

foreach($header_settings['components'] as $component){
  if($component['acf_fc_layout'] == 'nav'){
    //we need to set the mobile nav because we don't loop through the components
    $header_settings['mobile_settings']['nav'] = $component['navigation_menu'];
  }

  if($component['acf_fc_layout'] == 'logo'){ //if we're looking at the logo
    $header_settings['logo'] = $component['image']; //defaulting to the primary logo
    if($component['scrolled_image']){
      $header_settings['scrolled-logo'] = $component['scrolled_image'];
    }else{
      $header_settings['scrolled-logo'] = $component['image'];
    }
    //we need to set the mobile logo because we don't loop through the components
    $header_settings['mobile_settings']['logo'] = $component['image']; //defaulting mobile logo to primary logo
    $header_settings['mobile_settings']['mobile_overlay_menu_logo'] = $component['image']; //set menu overlay image to default logo
  }

  if($component['acf_fc_layout'] == 'ctas'){
    //we need to set the mobile ctas because we don't loop through the components
    $header_settings['mobile_settings']['ctas'] = $component['cta_btns_action_buttons'];
  }
}


//Mobile Settings override via "Mobile Options" tab
if($header_settings['mobile_header_logo']){
  $header_settings['mobile_settings']['logo'] = $header_settings['mobile_header_logo'];
}
if($header_settings['mobile_header_scrolled_logo']){
  $header_settings['mobile_settings']['scrolled-logo'] = $header_settings['mobile_header_scrolled_logo'];
}
if($header_settings['mobile_header_menu_logo']){
  $header_settings['mobile_settings']['mobile_overlay_menu_logo'] = $header_settings['mobile_header_menu_logo'];
}
//END Mobile Settings override via "Mobile Options" tab

$header_settings['is_transparent'] = TRUE;
if ( $header_settings['background_color'] !== '' ){
  $header_settings['is_transparent'] = FALSE;
}

getComponent('components.headers.v1-desktop',['header_settings'=>$header_settings]);
getComponent('components.headers.v1-mobile',['header_settings'=>$header_settings]);
?>
<script>
var menuDefaultLogo = false;
var menuMobileLogo = false;
function swapLogo(stuck = false){
  <?php if($header_settings['mobile_settings']['mobile_overlay_menu_logo']){?>
  if(stuck){
    if(menuDefaultLogo == false){
      menuDefaultLogo = $('.desktop-header .logo-link > .logo').attr('src');
      $('.desktop-header .logo-link > .logo').attr('src','<?=get_img_src($header_settings['scrolled-logo'],'full')?>');
    }
  }else{
    $('.desktop-header .logo-link > .logo').attr('src',menuDefaultLogo);
    menuDefaultLogo = false;
  }
  <?php } ?>
}
function swapMobileLogo(stuck = false){
  <?php if($header_settings['mobile_settings']['scrolled-logo']){?>
  if(stuck){
    if(menuMobileLogo == false){
      menuMobileLogo = $('.mobile-header .logo-link > .logo').attr('src')+"";
      $('.mobile-headers .logo-link > .logo').attr('src','<?=get_img_src($header_settings['mobile_settings']['scrolled-logo'],'full')?>');
    }
  }else{
    $('.mobile-header .logo-link > .logo').attr('src',menuMobileLogo);
    menuMobileLogo = false;
  }
  <?php } ?>
}
$().ready(function(){
  window.addEventListener('scroll', function(e){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
      shrinkOn = $(".header-v1").length>0?0:95,
      header = document.querySelector(".header-v1");
      if (distanceY > shrinkOn) {
          if($('.header-v1').hasClass('sticky') && !$('.header-v1').hasClass('stuck')){
            $('.header-v1').addClass('stuck');
            swapLogo(true);
            swapMobileLogo(true);
          }
      } else {
        if($('.header-v1').hasClass('sticky') && $('.header-v1').hasClass('stuck')){
          $('.header-v1').removeClass('stuck');
          swapLogo();
          swapMobileLogo();
        }
      }
  })
})
</script>
