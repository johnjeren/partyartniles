<?php
$href = '';
$onclick = FALSE;
if ( @$button['track_click_in_ga'] ){
    $href = 'javascript:;';
    $onclick = 'trackGaBtnClick(event, \''.esc_js($button['ga_label']).'\',\''.esc_js($button['button_link']).'\')';
} else {
    $href = $button['button_link'];
}

?>
<a href="<?=esc_url($href)?>" onclick="<?=esc_attr($onclick)?>" class="btn btn-<?=esc_attr(@$button['button_style'])?> <?=esc_attr(@$button['classes'])?> btn-lg <?=@!$first?'btn-not-first':''?>" id="<?=esc_attr(@$button['id'])?>" <?=@$button['open_in_new_window']?'target="_blank"':''?> >
  <span><?=esc_html(@$button['button_text'])?></span>
</a>
