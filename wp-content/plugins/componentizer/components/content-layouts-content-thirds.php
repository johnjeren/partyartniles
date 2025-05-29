<div style="clear:both;"></div>
<section class="wrapper wrapper-<?=@$style?> wrapper-sm">
  <div class="container">
    <div class="row text-center">
      <?php
      foreach($column_content as $cc){
        ?>
        <div class="col-md-4">
          <h4><?=$cc['title']?></h4>
          <p>
            <?=$cc['text']?>
          </p>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</section>
