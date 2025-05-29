<div style="clear:both;"></div>
<section id="<?=@$section_id?>" class="centered-content-cta wrapper wrapper-secondary wrapper-sm " style="background-image: url(<?=get_img_src($background_image,'background')?>); background-size:cover;"  data-start="background-position:0% -50%;" data-end="background-position:0% 100%;">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h3><?=$title?></h3>
        <p class="lead">
          <?=$text?>
        </p>
        <a href="<?=$button_link?>" class="btn btn-<?=$button_style?> btn-lg" role="button"><?=$button_text?></a>
      </div>
    </div>
  </div>
</section>
