<div style="clear:both;"></div>
<section class="wrapper wrapper-<?=esc_attr(@$style)?> wrapper-sm">
  <div class="container">
    <div class="row text-center">
      <?php
      foreach($column_content as $cc){
        ?>
        <div class="col-md-4">
          <h4><?=esc_html($cc['title'])?></h4>
          <p>
            <?=wp_kses_post($cc['text'])?>
          </p>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</section>
