<div style="clear:both;"></div>
<section id="<?=esc_attr(@$section_id)?>" class="centered-content-cta wrapper wrapper-secondary wrapper-sm " style="background-image: url(<?=esc_url(get_img_src($background_image,'background'))?>); background-size:cover;"  data-start="background-position:0% -50%;" data-end="background-position:0% 100%;">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h3><?=esc_html($title)?></h3>
        <p class="lead">
          <?=wp_kses_post($text)?>
        </p>
        <a href="<?=esc_url($button_link)?>" class="btn btn-<?=esc_attr($button_style)?> btn-lg" role="button"><?=esc_html($button_text)?></a>
      </div>
    </div>
  </div>
</section>
