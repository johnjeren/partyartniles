<?php
/***
title:: Image Title Description Vertical
description:: Text / Image treatment
variables:: $title, $text
exvars:: {"title": "Title Line", "text": "Subtext goes here for item"}
exrepeat:: 3
***/
?>
<div class="image-title-description-vertical">
  <?php
  if (@$image) {
    if(@$link) {
      ?><a href="<?=esc_url($link)?>"><?php
    }?>
    <img src="<?=esc_url(get_img_src($image))?>" class="img-responsive" style="box-shadow: 0px 0px 3px #666">
    <?php
      if(@$link){
        ?></a><?php
      }
  } else {
    if(@$link){
      ?><a href="<?=esc_url($link)?>">
      <?php
    }?>
    <?=image('16x9')?>
    <?php
    if(@$link){
      ?></a><?php
    }
  }

  if(@$link) {
    ?><a href="<?=esc_url($link)?>"><?php
  }?>
    <?=@$title?"<h3 class='mt5 mb0'>".esc_html($title)."</h3>":""?>
  <?php if(@$link){
    ?></a><?php
  } ?>
  <?=@$text?"<p>".esc_html($text)."</p>":""?>
</div>
