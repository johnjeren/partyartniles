<?php $sermon = get_posts([
  'post_type'=>'sermon',
  'numberposts'=>1,
  'orderby'=>'meta_value',
  'meta_key'=>'sermon_date',
  'order'=>'DESC'
]);?>
<?php $video = function_exists('get_field') ? get_field('sermon_video',$sermon[0]->ID) : null;?>
<div  style="border-color:#EEE; background-color: #EEE; border-style:solid; border-width: 2px 0px 2px 0px;" class="clearfix pt40 pb40" id="<?=@$section_id?>">
  <div class="container">
    <div class="row">
      <div class="col-sm-5">
        <h2 class="mt0 mb0">CURRENT SERIES</h2>
        <h3 class="mt0" style="color: #444; font-weight: 900"><?=function_exists('get_field') ? (get_field('series',$sermon[0]->ID) ? get_field('series',$sermon[0]->ID)->name : '') : '';?></h3>
        <h4><?=@$video === FALSE?"Listening To":"Watching"?>: <?=$sermon[0]->post_title;?> <small style="margin-right: 0">&nbsp;&nbsp;<?=function_exists('get_field') ? date('m/d/Y',get_field('sermon_date',$sermon[0]->ID)) : '';?></small></h4>
        <a class="btn btn-white-on-primary btn-lg" style="margin: 0px auto" href="/sermons">All Sermons</a>
        <div style="margin-top: 5px;">&nbsp;</div>
      </div>
      <div class="col-sm-7">
        <?php
        if ($video !== FALSE){
        ?>
        <div class="video-wrapper">
          <iframe src="https://player.vimeo.com/video/<?=$video?>?color=ffffff&byline=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <?
        } else {
          ?>
          <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player?url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F<?=function_exists('get_field') ? get_field('sermon_audio',$sermon[0]->ID) : '';?>&amp;visual=true&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
