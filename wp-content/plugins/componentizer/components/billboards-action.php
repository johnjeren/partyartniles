<?php
/***
title:: Action Billboard
description:: Background image, title, subtitle, CTA buttons section
variables:: $background_image, $centered (true/false), $bg_effect(parallax, fixed), $light_dark (light/dark), $title, $subtitle, $text, $action_buttons
fullwidth:: true
***/

if ( !@$section_id ){
    $section_id = 'section_'.rand(1,5000);
}

$parallax = FALSE;
if ( @$bg_effect == 'parallax' ){
  $parallax = TRUE;

  if ( @!$background_color || @$background_color == '' ){
      if ( @$light_dark == 'light' ){
          $background_color = '#666';
      } else {
          $background_color = '#EEE';
      }
  }


  ?>
  <?php
}
?>

<section id="<?=esc_attr(@$section_id)?>" <?=@$parallax?"data-jarallax='{\"speed\": 0.2}'":''?> class="component action-billboard <?=esc_attr(@$light_dark?$light_dark:'dark')?> <?=esc_attr(@$text_alignment)?> <?=@$parallax?'jarallax':''?> <?=esc_attr(@$namedVariables['component_class'])?>" <?=@$parallax?'data-parallax="scroll" data-image-src="'.esc_url(get_img_src(@$background_image,'background')).'"':''?> style="<?=@$background_image?'background-image: url('.esc_url(get_img_src(@$background_image,'background')).'); ':''?><?=@$bg_effect=='fixed'?'background-attachment: fixed; ':''?><?=@$background_color?'background-color: '.esc_attr($background_color).'; ':''?>;">
  <div class="container">
    <div class="row">
      <div class="content-container col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" style="<?=@$padding?'padding:'.esc_attr($padding):'';?>">
          <?php if ( @$title ){ ?><h2><?=cc($title,TRUE)?></h2><?php } ?>
          <?php
          if(@$subtitle){
            ?>
            <h3><?=cc(@$subtitle,TRUE)?></h3>
            <?php
          }

          if(@$text){
            ?>
            <?=cc(@$text)?>
            <?php
          }

            if(@$action_buttons) {
              getComponent('components.molecules.action-buttons',['action_buttons'=>@$action_buttons,'align'=>@$align]);
            }
            ?>
        </div>
    </div>
  </div>
</section>
