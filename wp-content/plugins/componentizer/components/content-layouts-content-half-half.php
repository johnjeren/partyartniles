<?php
$cols = 6;
$offset = 0;

if ( @$left_text != '' && @$right_text != '' ){
  $cols = 5;
  $offset = 2;
}
?>

<section class="wrapper wrapper-<?=@$style?> wrapper-<?=$padding?>" id="<?=@$section_id?>">
  <div class="container">
    <div class="row">
      <div class="col-md-<?=$cols?> text-left">
        <h2><?=@$left_title;?></h2>
        <?=@cc($left_text, TRUE);?>
      <?php  if(@$left_action_buttons) {
          getComponent('components.molecules.action-buttons',['action_buttons'=>$left_action_buttons,'align'=>'left']);
        } ?>
      </div>
      <div class="clearfix hidden-md hidden-lg hidden-xl"></div>
      <div class="col-md-<?=$cols?> col-md-offset-<?=$offset?> hidden-md hidden-lg hidden-xl" style="border-top: 2px solid #DDD; margin-top: 3em; padding-top: 2em">
        <h2><?=@$right_title;?></h2>
        <?=@cc($right_text);?>
        <?php  if(@$right_action_buttons) {
            getComponent('components.molecules.action-buttons',['action_buttons'=>$right_action_buttons,'align'=>'left']);
          } ?>
      </div>
      <div class="col-md-<?=$cols?> col-md-offset-<?=$offset?> text-right hidden-xs hidden-sm">
        <h2><?=@$right_title;?></h2>
        <?=@cc($right_text);?>
        <?php  if(@$right_action_buttons) {
            getComponent('components.molecules.action-buttons',['action_buttons'=>$right_action_buttons,'align'=>'right']);
          } ?>
      </div>
    </div>
  </div>
</section>
