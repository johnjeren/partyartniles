<?php
$href = '';
$onclick = FALSE;
if ( @$button['track_click_in_ga'] ){
    $href = 'javascript:;';
    $onclick = 'trackGaBtnClick(event, \''.$button['ga_label'].'\',\''.$button['button_link'].'\')';
} else {
    $href = $button['button_link'];
}

?>
<a href="<?=$href?>" onclick="<?=$onclick?>" class="btn btn-<?=@$button['button_style']?> <?=@$button['classes']?> btn-lg <?=@!$first?'btn-not-first':''?>" id="<?=@$button['id']?>" <?=@$button['open_in_new_window']?'target="_blank"':''?> >
  <span><?=@$button['button_text']?></span>
</a>
