<?php
/***
title:: Hero Header
description:: A hero header with flare
variables:: $text
exvars:: {"text": "My Message"}
fullwidth:: "true"
***/

?>
<?php if(@$image){?>
<?php }else{?>
  <?php $image = templatePath().'/img/title-banner.png';?>
<?php }?>
<div class="title-image-back" style="background-image:url(<?=$image?>);background-size:cover;background-position:center center;">
  <div class="tag">
    <h1><?=$text?></h1>
  </div>
</div>
