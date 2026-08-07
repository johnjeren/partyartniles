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
          <a href="<?=esc_url($link)?>">
          <?php
          }
        ?>
        <img src="<?=esc_url(get_img_src($image))?>" class="img-responsive">
        <?php
        if(@$link) {
          ?></a><?php
        }
      } else {
        if(@$link){
          ?>
          <a href="<?=esc_url($link)?>">
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
        ?><a href="<?=esc_url($link)?>"><?php
      }
      ?>
    </div>
    <div class="polaroid-text">
      <?=@$title?"<h3>".esc_html($title)."</h3>":""?>
      <?php
      if(@$link) {
        ?></a><?php
      }
      ?>
      <?=@$text?"<p>".esc_html($text)."</p>":""?>
    </div>
  </div>
</div>
