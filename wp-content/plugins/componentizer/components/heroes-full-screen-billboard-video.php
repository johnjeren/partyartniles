<div class="component full-screen-billboard-video <?=@$text_alignment?$text_alignment:'center'?> <?=$namedVariables['component_class']?>">
  <?php
    $video_str_arr = [];
    foreach($video as $v){
      if($v['url']){
        $video_str_arr[] = $v['type'].': '.$v['url'];
      }
    }
    $video_string = implode(', ',$video_str_arr);
   ?>

  <div class="video-div" style="width: 100%; height: 100vh;"
    data-vide-bg="<?=$video_string?>, poster: <?=get_img_src($background_image,'background');?>"
    data-vide-options="className: billboard-video, loop: true, muted: false, position: 50% 50%, autoplay: true, resizing: true">
  </div>
  <div class="video-content-container" style="padding-top:<?=@$padding_top?$padding_top:'25vh';?>;padding-bottom:<?=@$padding_bottom?$padding_bottom:'25vh';?>;<?=@$height=='full-height'?'height:100vh;':'height:auto;'?>">

  <div class="container">
    <div class="row">
      <div class="container">
          <?php
          if(@$title_image){
            ?>
            <div class="title-image">
              <?=build_image($title_image,'full');?>
            </div>
          <?php
          }else{
            ?>
            <h2><?=@cc($title)?></h2>
            <h3><?=@cc($subtitle)?></h3>
            <?php
          }
          if(@$action_buttons) {
            getComponent('components.molecules.action-buttons',['action_buttons'=>$action_buttons,'align'=>$text_alignment]);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
