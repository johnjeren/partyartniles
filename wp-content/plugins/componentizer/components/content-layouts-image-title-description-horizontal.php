<?php
/***
title:: Image Title Description Horzontal
description:: Text / Image treatment
variables:: $title, $text
exvars:: {"title": "Title Line", "text": "Subtext goes here for item"}
exrepeat:: 2
***/
?>
<div class="image-title-description-horizontal">
  <div class="row">
    <div class="col-md-4">
      <?=image('16x9')?>
    </div>
    <div class="col-md-8">
      <?=@$title?"<h3 class='mt0'>".$title."</h3>":""?></h3>
      <?=@$text?"<p>".$text."</p>":""?>
    </div>
  </div>
</div>
