<div class="component ection-header">
  <h2><?=$title?></h2>
  <?php
  if ( @$content ){
    ?>
    <?=cc($content)?>
    <?php
  }
  ?>
</div>
