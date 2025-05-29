<?php
/***
title:: Polaroid
description:: Text / Image treatment
variables:: $image, $title, $text
exvars:: {"title": "Title Line", "text": "Subtext goes here for item"}
exrepeat:: 3
***/
?>
<div class="polaroid">
  <div class="shadow">
    <div class="image">
      <?php
      if(@$image) {
        if(@$link){
          ?>
          <a href="<?=$link?>">
          <?php
          }
        ?>
        <img src="<?=get_img_src($image)?>" class="img-responsive">
        <?php
        if(@$link) {
          ?></a><?php
        }
      } else {
        if(@$link){
          ?>
          <a href="<?=$link?>">
          <?php
        }
        ?>
        <?=image('16x9')?>
        <?php
        if(@$link) {
          ?></a><?php
        }
      }

      if(@$link) {
        ?><a href="<?=$link?>"><?php
      }
      ?>
    </div>
    <div class="polaroid-text">
      <?=@$title?"<h3>".$title."</h3>":""?>
      <?php
      if(@$link) {
        ?></a><?php
      }
      ?>
      <?=@$text?"<p>".$text."</p>":""?>
    </div>
  </div>
</div>
