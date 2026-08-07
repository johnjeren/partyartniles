<?php
/***
title:: Sermon Block
description:: Text / Image treatment
variables:: $image, $title, $text, $media_id
exvars:: {"title": "Title Line", "text": "Subtext goes here for item","media_id": "" }
exrepeat:: 3
***/
?>
<div class="polaroid">
  <div class="shadow">
    <a href="javascript:;" onclick="playSermon('<?=esc_js(@$date)?>')">
      <img src="<?=@$image?esc_url(get_img_src($image)):image('16x9',TRUE)?>" class="img-responsive">
    </a>
  <?=@$title?"<h3>".esc_html($title)."</h3>":""?>
  <?=@$text?"<p>".esc_html($text)."</p>":""?>
  </div>
</div>
