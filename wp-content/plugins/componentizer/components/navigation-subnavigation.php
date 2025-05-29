<?php
if ( !@$subnavigation || @$subnavigation == '' ){
    return;
}
$subnavigation_id = $subnavigation;
$subnavigation = wp_get_nav_menu_object( $subnavigation );

$is_on_page_nav = FALSE;
if ( stripos($subnavigation->slug, 'on-page-navigation') !== FALSE ){
    $is_on_page_nav = TRUE;
}
?>
<section class="component subnav-container">
  <div class="container">
    <ul class="subnav" id="subnav">
    <?php
    $links = [];

    if (!$is_on_page_nav) {
        $nav = wp_get_nav_menu_items($subnavigation_id);

        $menu = [];
        foreach($nav as $fn){
            $rel_url = str_replace( [home_url(),'/',],"", get_permalink());
            $rel_link = str_replace( [home_url(),'/',],"", $fn->url);
            $item = [
                'label'=>$fn->title,
                'href'=>$fn->url,
                'active'=>$rel_link==$rel_url?TRUE:FALSE
            ];
            $menu[] = $item;
        }
    } else { // is on page
        $components = function_exists('get_field_object') ? get_field_object('page_components') : null;
        $on_page_nav_items = [];
        foreach ($components['value'] as $component){
            if ( @$component['show_in_subnav'] ){
                $on_page_nav_items[] = $component;
            }
        }

        $menu = [];
        foreach ($on_page_nav_items as $item){
            $menu[] = [
                'inpage'=>TRUE,
                'href'=>'#'.sanitize_title($item['component_title_display']),
                'label'=>$item['component_title_display']
            ];
        }
    }
    ?>
      <?php foreach($menu as $link){?>
        <li class="<?=$link['active']?"active":""?>">
          <a href="<?=$link['href']?>" class="sub-nav-link"><?=$link['label']?></a>
        </li>
        <?php } ?>
    </ul>
  </div>
</section>

<script>
    $().ready(function(){
        $(".sub-nav-link").on('click',function(){
            $(".subnav li").removeClass('active');
            $(this).parents('li').addClass('active');
        })
    })
</script>
