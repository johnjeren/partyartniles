<div style="clear:both;"></div>
<section class="wrapper wrapper-<?=esc_attr($style)?> wrapper-<?=esc_attr($wrapper_size)?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="lead text-<?=esc_attr(@$text_align)?>">
          <?=wp_kses_post($content);?>
        </p>
      </div>
    </div>
  </div>
</section>
