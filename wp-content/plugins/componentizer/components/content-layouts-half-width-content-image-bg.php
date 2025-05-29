<?php
/***
title:: Half Width Content
description:: Left/right half content w/ full background
variables:: $title, $content, $content_side
fullwidth:: true
***/

$bg_img_src = @$background_image?get_img_src($background_image,'background'):image('background',true);
$wide_img_src = @$background_image?get_img_src($background_image,'wide'):image('wide',true);
?>
<div class="half-width-content-image-bg" style="background-image: url(<?=$bg_img_src?>)" id="<?=@$section_id?>">
  <img src="<?=$wide_img_src?>" class="visible-xs-block img-responsive">
  <div class="container">
    <div class="row">
      <div class="<?=@$content_side=="right"?"col-md-offset-7 col-sm-offset-4 content-right ":""?>col-md-5 col-sm-8">
        <div class="content-container">
          <h2><?=$title?></h2>
          <?=@$subtitle!=''?'<h3 class="mt0">'.cc($subtitle).'</h3>':''?>
          <p><?=cc($content)?></p>
          <?php
          if(@$action_buttons) {
            getComponent('components.molecules.action-buttons',['action_buttons'=>$action_buttons]);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
