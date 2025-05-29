<div class="action-buttons clearfix pull-<?=@$align?$align:'left'?>">
  <?php
  $first = TRUE;
  foreach ($action_buttons as $button){
    if(@$button['button']){
      $button = $button['button'];
    }
    ?>
      <?php getComponent('components.molecules.button',['button'=>@$button,'first'=>$first]);?>
    <?php
    $first = FALSE;
  }
  ?>
  </div>
  <div class="clearfix"></div>
