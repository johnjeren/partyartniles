<div class="component ection-header">
  <h2><?=esc_html($title)?></h2>
  <?php
  if ( @$content ){
    ?>
    <?=cc($content)?>
    <?php
  }
  ?>
</div>
