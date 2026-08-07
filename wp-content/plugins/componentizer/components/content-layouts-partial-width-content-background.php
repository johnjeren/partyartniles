<?php
/***
title:: Partial Width Content w/ Background
description:: Partial content w/ full background
variables:: $title, $content, $block_alignment, $block_width, $background_image, $background_color, $text_alignment, $sub_title, $action_buttons
fullwidth:: true
***/

if(@$background_image){
  $bg_img_src = @$background_image?get_img_src(@$background_image,'background'):image('background',true);
  $wide_img_src = @$background_image?get_img_src(@$background_image,'wide'):image('wide',true);
}

if ( !@$block_alignment ){
  $block_alignment = 'left';
}
if ( !@$text_alignment ){
  $text_alignment = 'left';
}


if($block_alignment == 'center'){
  $offset = (12-$block_width)/2;
}elseif($block_alignment == 'right'){
  $offset = 12-$block_width;
}else{
  $offset = 0;
}

?>
<section class="component half-width-content-image-bg <?=esc_attr(@$text_color);?> <?=esc_attr(@$namedVariables['component_class'])?>" style="background: <?=esc_attr(@$background_color);?> url(<?=esc_url(@$bg_img_src)?>) center center;background-size:cover;" id="<?=esc_attr(@$section_id)?>">
  <img src="<?=esc_url(@$wide_img_src)?>" class="visible-xs-block img-responsive">
  <div class="container">
    <div class="row">
      <div class="<?=esc_attr(@$block_alignment);?> col-sm-offset-<?=esc_attr($offset)?>  col-sm-<?=esc_attr(@$block_width);?>">
        <div class="content-container text-<?=esc_attr($text_alignment)?>">
          <h2><?=esc_html(@$title)?></h2>
          <?=@$subtitle!=''?'<h3 class="mt0">'.cc(@$subtitle,TRUE).'</h3>':''?>
          <p><?=cc(@$content)?></p>
          <?php
          if(@$action_buttons) {
            getComponent('components.molecules.action-buttons',['action_buttons'=>$action_buttons,'align'=>$text_alignment]);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
