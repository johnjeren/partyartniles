<style type="text/css">
#<?=esc_attr(@$section_id)?>.wrapper-half-<?=esc_attr(@$left_right)?>::before {
  background-image: url(<?=esc_url(@$background_image)?>);
  background-size: cover;
  <?=esc_attr(@$left_right)?>:0;
}
@media(max-width:767px){
  #<?=esc_attr(@$section_id)?>.wrapper-half-<?=esc_attr(@$left_right)?>::before {
    background-image: none;
    width:0%;
    background-size: cover; }
}
</style>
<section id="<?=esc_attr(@$section_id)?>" class="wrapper wrapper-<?=esc_attr(@$style)?>  wrapper-half-<?=esc_attr(@$left_right)?> pt<?=esc_attr(@$padding)?> pb<?=esc_attr(@$padding)?>">
  <div class="container">
    <div class="row">
      <?php
      if ($left_right == 'left'){
        ?>
        <div class="col-sm-6 col-sm-offset-6">
        <?php
      } else {
        ?>
        <div class="col-sm-6">
        <?php
      }
      ?>
      <h4><?=esc_html(@$title)?></h4>
      <p>
        <?=wp_kses_post(@$text)?>
      </p>
      <?php
      if(@$cta_text){
        ?>
        <a href="<?=esc_url(@$cta_link)?>" class="btn btn-primary"><?=esc_html($cta_text)?></a>
        <?php
      }
      ?>
      </div>
    </div>
  </div>
</section>
