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

<section id="<?=@$section_id?>" <?=@$parallax?"data-jarallax='{\"speed\": 0.2}'":''?> class="component action-billboard <?=@$light_dark?$light_dark:'dark'?> <?=@$text_alignment?> <?=@$parallax?'jarallax':''?> <?=@$namedVariables['component_class']?>" <?=@$parallax?'data-parallax="scroll" data-image-src="'.get_img_src(@$background_image,'background').'"':''?> style="<?=@$background_image?'background-image: url('.get_img_src(@$background_image,'background').'); ':''?><?=@$bg_effect=='fixed'?'background-attachment: fixed; ':''?><?=@$background_color?'background-color: '.$background_color.'; ':''?>;">
  <div class="container">
    <div class="row">
      <div class="content-container col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" style="<?=@$padding?'padding:'.$padding:'';?>">
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
