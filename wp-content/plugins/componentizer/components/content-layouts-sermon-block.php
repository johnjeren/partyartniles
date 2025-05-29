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
    <a href="javascript:;" onclick="playSermon('<?=@$date?>')">
      <img src="<?=@$image?get_img_src($image):image('16x9',TRUE)?>" class="img-responsive">
    </a>
  <?=@$title?"<h3>".$title."</h3>":""?>
  <?=@$text?"<p>".$text."</p>":""?>
  </div>
</div>
