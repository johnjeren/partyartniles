<?php
/***
title:: Hero w/ Text
description:: Large Image with Text
variables:: $title, $text
exvars:: {"title": "Title of image", "text": "Subtext of image is right here"}
***/
?>
<div class="row mt0 hero-basic">
    <div class="col-md-12">
      <?=image('16x9')?>
      <?=@$title?"<h2>".$title."</h2>":""?>
      <?=@$text?"<p>".$text."</p>":""?>
    </div>
</div>
