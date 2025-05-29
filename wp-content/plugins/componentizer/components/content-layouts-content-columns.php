<?php
/***
title:: Content Columns
description:: Columns of content
variables:: $background_image, $background_color, $text_color, $columns
fullwidth:: true
***/
for($i=0;$i<=$columns-1;$i++){
  $columns_data[$i]['title'] = ${'columns_'.$i.'_title'};
  $columns_data[$i]['column_width'] = ${'columns_'.$i.'_column_width'};
  $columns_data[$i]['breakpoints'] = ${'columns_'.$i.'_breakpoints'};
  $columns_data[$i]['content'] = ${'columns_'.$i.'_content'};
  $columns_data[$i]['action_buttons'] = ${'columns_'.$i.'_action_buttons'};
  $columns_data[$i]['background_color'] = ${'columns_'.$i.'_background_color'};
  $columns_data[$i]['padding_top'] = ${'columns_'.$i.'_padding_top'};
  $columns_data[$i]['padding_bottom'] = ${'columns_'.$i.'_padding_bottom'};
  $columns_data[$i]['text_color'] = ${'columns_'.$i.'_text_color'};
}
?>
<section id="<?=@$section_id?>" style="background: <?=@$background_color?> url(<?=get_img_src(@$background_image,'full')?>) center center;<?=@$padding_top?'padding-top: '.$padding_top.';':''?><?=@$padding_bottom?'padding-bottom: '.$padding_bottom.';':''?>" class="content-columns component <?=@$text_color?> <?=@$namedVariables['component_class']?>">
  <div class="container<?=$container_width== 'full-width' ? '-fluid' : '';?>">
    <div class="row <?=@$text_color?>">
      <?php foreach($columns_data as $col){
          $breakpoints = [];
          if ( is_array(@$col['breakpoints']) ){
              foreach ($col['breakpoints'] as $bp){
                  $breakpoints[] = 'col-'.$bp['view_width'].'-'.$bp['columns'];
              }
          }
          ?>
        <div class="content-column <?=@$col['text_color']?$col['text_color']:'';?> col-md-<?=$col['column_width']?> <?=implode(' ',$breakpoints)?>" style="<?=@$col['background_color']?'background-color:'.$col['background_color'].';':''?><?=@$col['padding_top']?'padding-top: '.$col['padding_top'].';':''?><?=@$col['padding_bottom']?'padding-bottom: '.$col['padding_bottom'].';':''?>">
          <?php
          if ( @$col['title'] ){
            ?><h3><?=$col['title']?></h3><?php
          }

          echo cc($col['content']);

          if ( @is_array($col['action_buttons']) ){
              getComponent('components.molecules.action-buttons',['action_buttons'=>@$col['action_buttons'],'align'=>'left']);
          }
          ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
