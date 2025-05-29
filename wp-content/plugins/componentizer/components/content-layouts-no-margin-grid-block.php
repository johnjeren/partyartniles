<div id="<?=@$section_id?>" class="component <?=@$namedVariables['component_class']?>">
  <?php
  foreach ($grid_block as $gb){
    $cols = 12 / count($grid_block);
    $gb['cols'] = $cols;
    $gb['height'] = $height;
    getComponent('components.content-layouts.no-margin-grid-block-ind',$gb);
  }
  ?>
</div>
<div style="clear:both;"></div>
<script>
  $('.no-margin-grid-block .has_link').mouseenter(function() {
    $( this ).addClass('active');
  })
  .mouseleave(function() {
    $( this ).removeClass('active');
  });
</script>
