<?php getComponent('components.core.header'); ?>
<header id="header-2" class="navbar navbar-fixed-top navbar-transparent ng-isolate-scope headroom headroom--top">
  <nav role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle header-nav-button" data-toggle="collapse" data-target=".navbar-main">
        <span class="icon-bar header-nav-button-line"></span>
        <span class="icon-bar header-nav-button-line"></span>
        <span class="icon-bar header-nav-button-line"></span>
      </button>
      <div class="header-nav-logo">
        <a href="/<?=getSite()?>">
          <img src="<?=templatePath()?>/img/logo-light.png" id="light-logo" style="max-height: 70px;position:absolute;">
          <img src="<?=templatePath()?>/img/logo-dark.png"  id="dark-logo" style="max-height: 70px;position:absolute;">
        </a>
      </div>
    </div>
    <div class="collapse navbar-collapse navbar-main navbar-right">
      <?php wp_nav_menu([
        'menu_class'=>'nav navbar-nav header-nav-navigation',
      ]); ?>
    </div>
  </nav>
</header>


  <link href="<?=templatePath()?>/css/organisms/headers/header-2.css" rel="stylesheet">
  <script>
  function init() {
    //if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
      window.addEventListener('scroll', function(e){
          var distanceY = window.pageYOffset || document.documentElement.scrollTop,
              shrinkOn = 150,
              header = document.querySelector("header");
          if (distanceY > shrinkOn) {
              if($('#header-2').hasClass('navbar-transparent')){
                $('#header-2').removeClass('navbar-transparent',250);
                $('#header-2').addClass('navbar-white',250);
              }
          } else {
            if($('#header-2').hasClass('navbar-white')){
              $('#header-2').removeClass('navbar-white');
              $('#header-2').addClass('navbar-transparent');
            }
          }
      });
    }
//  }
  window.onload = init();
  </script>
