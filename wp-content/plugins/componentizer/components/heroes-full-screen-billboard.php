<?php
/***
title:: Full Screen Bilboard
description:: Background image, title, subtitle, CTA buttons section
variables:: $background_image, $centered (true/false), $bg_effect(parallax, fixed), $light_dark (light/dark), $title, $subtitle, $text, $action_buttons
exvars:: {"background_image": "https://unsplash.it/1500/800/?saf=58&random", "title": "Title Goes Here", "subtitle": "Subtitle Here!", "text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque purus tortor, dignissim luctus", "light_dark": "light", "action_buttons": [{"button_text": "Button One", "button_link": "link1","button_style": "primary-on-white"}], "centered": "false", "bg_effect": "fixed"}
fullwidth:: true
***/
if(is_array(@$video)){
  require(__DIR__.'/heroes-full-screen-billboard-video.php'); return;

}else{
  if ( @!$title || @!$light_dark ){
    //throw new \Exception('molecules.action-billboard - Required Fields are `title`, `light_dark`');
  }

  $parallax = FALSE;
  if ( @$bg_effect == 'parallax' ){
    $parallax = TRUE;
  }


?>

<section id="<?=@$section_id?>" class="component full-screen-billboard <?=@$light_dark?> <?=@$text_alignment?$text_alignment:'center'?> <?=@$parallax?'parallax-window':''?> <?=@$namedVariables['component_class']?>" <?=@$parallax?'data-parallax="scroll" data-image-src="'.get_img_src($background_image,'full').'"':''?> style="<?=@$height=='Full Height'?'height:100vh;':'height:auto;'?>
  <?=@$padding_top?'padding-top:'.$padding_top.';':'';?><?=@$padding_bottom?'padding-bottom:'.$padding_bottom.';':'';?><?=@$background_color?'background-color: '.$background_color.'; ':''?> position: relative; <?=@$background_image&&!@$parallax?'background: '.@$background_color.' url('.get_img_src($background_image,'full').') center center; ':''?><?=@$bg_effect=='fixed'?'background-attachment: fixed; ':''?>background-size:cover;">
  
  <div style="position: relative">
    <div class="container">
      <div class="row">
        <div class="container">
            <?php
            if(@$title_image){
              ?>
              <div class="title-image">
                <?=build_image($title_image,'full');?>
              </div>
            <?php
            }else{
              if(@$title){?>
              <h2><?=@cc($title,TRUE)?></h2>
            <?php }
              if(@$subtitle){?>
              <h3><?=@cc($subtitle,TRUE)?></h3>
              <?php
              }
            }
            if(@$action_buttons) {
              getComponent('components.molecules.action-buttons',['action_buttons'=>$action_buttons,'align'=>$text_alignment]);
            }
            ?>
          </div>
        </div>
      </div>
    </div>
</section>
<?php
}
