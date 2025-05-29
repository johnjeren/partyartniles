<?php
/***
title:: No Margin Grid Block Individual
description:: Block image treatment
variables:: $title, $text, $cols
exvars:: {"title": "Item Title", "text": "randtext12", "cols": "12", "height": "40", "background_image": "randimagebackground"}
exrepeat:: 2
fullwidth:: true
***/
//dd($title);
?>
<?php
  if(@$link == ''){
    $link = '#';
  }

  if ( @$cols ){
      $sm_cols = $cols;
      if ( $cols <= 3 ){
          $sm_cols = 6;
      }
  }

  ?>
  <div class="no-margin-grid-block col-sm-<?=@$sm_cols?> col-md-<?=@$cols?> pr0 pl0" style="background: <?=@$background_color;?> url(<?=get_img_src(@$background_image,'square')?>);height:<?=@$height;?>vh;background-size:cover;background-position:center center;">
    <a class="link" href="<?=@$link?>" <?=@$link=='#'?'style="cursor:default;"':'';?>>
      <div class="block <?=@$link!=='#'?'has_link':'';?>">
        <div class="content">
          <?php
            if ( @$title != '' ){
              ?>
              <h3><span><?=$title?></span></h3>
              <?php
              }
            ?>
            <?=cc(@$text)?>
        </div>
      </div>
    </a>
  </div>
