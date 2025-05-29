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
  <?=@$image?get_img_src($image):image('square')?>
  <?=@$title?"<h3>".$title."</h3>":""?></h3>
  <?=@$text?"<p>".$text."</p>":""?>
</div>
