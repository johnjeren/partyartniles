<?php
$footer_nav = wp_get_nav_menu_items($menu);
  foreach($footer_nav as $fn){
    if($fn->menu_item_parent == 0){
      $footer_menu[$fn->object_id] = array();
    }else{
      $item = ['title'=>$fn->title,'url'=>$fn->url,'target'=>$fn->target, 'attr_title'=>$fn->attr_title, 'css_classes'=>$fn->classes,'description'=>$fn->description];
      array_push($footer_menu[get_post_meta($fn->menu_item_parent, '_menu_item_object_id', true )],$item);
    }
  }
 foreach($footer_menu as $k=>$v){
 ?>
 <div class="col-md-4 col-sm-6 col-xs-6 footer-menu-container">
     <h3><?=get_the_title($k);?></h3>
   <ul class="footer-menu">
     <?php
     foreach($v as $page_item){
      ?>
     <li>
        <a href="<?=$page_item['url']?>" <?=$page_item['target']?'target="'.$page_item["target"].'"':'';?> <?=$page_item["attr_title"]?'title="'.$page_item["attr_title"].'"':'';?>><?=$page_item["title"]?></a>
     </li>
     <?php
       }
     ?>
   </ul>
 </div>
 <?php
 }
 ?>
