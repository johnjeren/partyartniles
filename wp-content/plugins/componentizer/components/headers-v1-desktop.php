
<style>
  .header-v1{
    background-color: <?=$header_settings['background_color']?>;
    transition: all .25s;
  }
  .header-v1.sticky.stuck{
    transition: all .25s;
    background-color: <?=$header_settings['scrolled_background_color']?>;
  }
</style>

<div class="header-v1 desktop-header <?=$header_settings['sticky']?'sticky':'fixed no-background'?> hidden-xs <?=$header_settings['is_transparent']?'transparent':''?>" style="">
  <div class="container">
    <!-- Start Header Navigation -->
        <div class="<?=$header_settings['container_class']?>">
          <?php
          $col_defaults = [
            'logo'=>'col-md-2',
            'nav'=>'col-md-8',
            'ctas'=>'col-md-2'
          ];
          foreach ($header_settings['components'] as $c){
            ?>
            <div class="<?=$c['container_class']!=''?$c['container_class']:$col_defaults[$c['acf_fc_layout']]?> text-<?=$c['align']?>">
              <?php
              if ( $c['acf_fc_layout'] == 'logo' ){
                ?>
                <a href="/" class="logo-link">
                  <img src="<?=get_img_src($c['image'],'full');?>" class="logo img-responsive" alt="">
                </a>
                <?php
              }
              if ( $c['acf_fc_layout'] == 'nav' ){
                  wp_nav_menu( array(
                      'menu'              => $c['navigation_menu'],
                      'depth'             => 2,
                      'container'         => 'ul',
                      'menu_class'        => 'main-navigation',
                      )
                  );
              }
              if ( $c['acf_fc_layout'] == 'ctas' ){
                getComponent('components.molecules.action-buttons',['action_buttons'=>$c['cta_btns_action_buttons'],'align'=>$c['align']]);
              }
              ?>
            </div>
            <?php
          }
          ?>
        </div>
  </div>
</div>
