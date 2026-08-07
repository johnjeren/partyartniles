<?php
/***
title:: Image Title Description Tall
description:: Text / Image treatment with square image
variables:: $title, $text
exvars:: {"title": "Title Line", "text": "Subtext goes here for item"}
exrepeat:: 4
***/
?>
<div class="image-title-description-vertical">
  <?=@$image?esc_url(get_img_src($image)):image('square')?>
  <?=@$title?"<h3>".esc_html($title)."</h3>":""?></h3>
  <?=@$text?"<p>".esc_html($text)."</p>":""?>
</div>
