<style type="text/css">
#<?=@$section_id?>.wrapper-half-<?=@$left_right?>::before {
  background-image: url(<?=@$background_image?>);
  background-size: cover;
  <?=@$left_right?>:0;
}
@media(max-width:767px){
  #<?=@$section_id?>.wrapper-half-<?=@$left_right?>::before {
    background-image: none;
    width:0%;
    background-size: cover; }
}
</style>
<section id="<?=@$section_id?>" class="wrapper wrapper-<?=@$style?>  wrapper-half-<?=@$left_right?> pt<?=@$padding?> pb<?=@$padding?>">
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
      <h4><?=@$title?></h4>
      <p>
        <?=@$text?>
      </p>
      <?php
      if(@$cta_text){
        ?>
        <a href="<?=@$cta_link?>" class="btn btn-primary"><?=$cta_text?></a>
        <?php
      }
      ?>
      </div>
    </div>
  </div>
</section>
