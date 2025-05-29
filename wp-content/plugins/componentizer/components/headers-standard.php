<?php getComponent('components.core.header');
    $header_nav = function_exists('get_field') ? (get_field('header_nav','option') ? get_field('header_nav','option') : '') : '';
 ?>
<header id="header-1" class="navbar navbar-fixed-top navbar-white ng-isolate-scope headroom headroom--top">
  <nav role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle header-nav-button" data-toggle="collapse" data-target=".navbar-main">
        <span class="icon-bar header-nav-button-line"></span>
        <span class="icon-bar header-nav-button-line"></span>
        <span class="icon-bar header-nav-button-line"></span>
      </button>
      <div class="header-nav-logo">
        <a href="/<?=getSite()?>"><img src="<?=templatePath()?>/img/logo-dark.png" id="logo" style="max-width:75%;"></a>
      </div>
    </div>
    <div class="collapse navbar-collapse navbar-main navbar-right">
      <ul class="nav navbar-nav header-nav-navigation">
        <?php wp_nav_menu([
          'menu_class'=>'nav navbar-nav header-nav-navigation',
          'menu'=>$header_nav
        ]); ?>
      </ul>
    </div>
  </nav>
</header>
