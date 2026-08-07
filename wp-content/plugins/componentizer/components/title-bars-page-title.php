<?php
/***
title:: Hero Header
description:: A hero header with flare
variables:: $text
exvars:: {"text": "My Message"}
fullwidth:: "true"
***/

?>
<?php if(@$background_image){?>
<?php }else{?>
  <?php $background_image = templatePath().'/img/cf-title-banner.png';?>
<?php }?>
<section class="component title-image-back <?=esc_attr($text_color)?> <?=esc_attr($namedVariables['component_class'])?>" style="background-image:url(<?=esc_url(get_img_src($background_image,'background'))?>);background-size:cover;background-position:center center;">
  <div class="container">
    <div class="tag">
      <h1><?=esc_html($text)?></h1>
    </div>
  </div>
</section>
