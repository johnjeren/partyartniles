  <nav class="navbar navbar-wrap navbar-custom navbar-fixed-top menu-wrap">
    <div class="container full">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('universal_logo_upload', get_template_directory_uri() . '/assets/images/logo.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('universal_retina_logo_upload',get_template_directory_uri() . '/assets/images/logo@2x.png')); ?>" class="logowhite" alt="<?php bloginfo( 'name' ) ?>" />
                  <img src="<?php echo esc_url(get_theme_mod('universal_logo_dark_upload', get_template_directory_uri() . '/assets/images/logo-dark.png')); ?>" data-rjs="<?php echo esc_url(get_theme_mod('universal_retina_logo_dark_upload',get_template_directory_uri() . '/assets/images/logo-dark@2x.png')); ?>" class="logodark" alt="<?php bloginfo( 'name' ) ?>" />
                </a>
              </div>
          </div>
          <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 pull-right">
          <?php if(get_theme_mod('universal_menu_select', 'standard') == 'standard')  { ?> 
            <div class="menu-center">
              <div class="menu-responsive desktop">
                <div class="collapse navbar-collapse navbar-main-collapse pull-left responsive-menu">
                        <?php wp_nav_menu( array(
                          'theme_location' => 'menu',
                          'container' => false,
                          'menu_class' => 'nav navbar-nav',
                          'sort_column' => 'menu_order',
                          'walker' => new Universal_My_Walker_Nav_Menu(),
                          'fallback_cb' => 'universal_MenuFallback'
                        )); ?> 
                </div>
              </div>
              <div class="menu-responsive mobile">
                <div class="burger_universal_normal_holder"><a href="#" class="nav-icon3" id="open-button"><span></span><span></span><span></span><span></span><span></span><span></span></a></div>
                  <div class="burger_universal_menu_overlay_normal">
                    <div class="burger_universal_menu_vertical">
                      <?php wp_nav_menu( array(
                        'theme_location' => 'menu',
                        'menu_class' => 'burger_universal_main_menu',
                        'depth' => 2,
                      )); ?>
                    </div>
                  </div>
              </div>
            <ul class="cart_search_block">
              <li class="menu-divider visible-lg">&nbsp;</li>
              <?php if (class_exists( 'WooCommerce' )) {?> 
                <li>
                  <div class="universal_woo_cart">
                    <div class="universal_head_holder_inner">
                      <div class="universal_head_cart">
                          <a class="" href="<?php echo WC()->cart->get_cart_url(); ?>"><i class="fa fa-shopping-bag fa-lg"></i> <span class="universal_cart_icon"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'universal-wp' ), WC()->cart->cart_contents_count ); ?></span></a>
                      </div>
                    </div>
                    <div class="universal_cart_widget">
                      <?php the_widget( 'WC_Widget_Cart', 'title=' );?>
                    </div>
                  </div>
                </li>
                <?php } ?>
                <li>
                  <div class="search-icon-header">
                    <a href="#"><i class="fa fa-search fa-lg"></i></a>
                    <div class="black-search-block">
                      <div class="black-search-table">
                        <div class="black-search-table-cell">
                          <div>
                            <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" >
                              <input type="text" class="focus-input" placeholder="Enter Keyword" value="<?php echo get_search_query() ?>" name="s" id="s" />
                              <input type="submit" id="searchsubmit" value="" />
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="close-black-block"><a href="#"><i class="ion-ios-close-empty"></i></a></div>
                    </div>
                  </div>
              </li>
            </ul>
          </div>
          <?php } else { ?>
            <div class="menu-center">
              <div class="menu-responsive desktop">
                <div class="collapse navbar-collapse navbar-main-collapse pull-left responsive-menu">
                        <?php wp_nav_menu( array(
                          'theme_location' => 'onepage-menu',
                          'container' => false,
                          'menu_class' => 'nav navbar-nav share-class',
                          'menu_id' => 'menu-onepage',
                          'sort_column' => 'menu_order',
                          'walker' => new Universal_My_Walker_Nav_Menu(),
                          'fallback_cb' => 'universal_MenuFallback'
                        )); ?> 
                </div>
              </div>
              <div class="menu-responsive mobile">
                <div class="burger_universal_normal_holder"><a href="#" class="nav-icon3" id="open-button"><span></span><span></span><span></span><span></span><span></span><span></span></a></div>
                  <div class="burger_universal_menu_overlay_normal">
                    <div class="burger_universal_menu_vertical">
                      <?php wp_nav_menu( array(
                        'theme_location' => 'onepage-menu',
                        'menu_class' => 'burger_universal_main_menu share-class',
                        'menu_id' => 'menu-onepage',
                        'depth' => 2,
                      )); ?>
                    </div>
                  </div>
              </div>
          </div>
          <?php } ?>
        </div> 
        </div> 
      </div>



      </nav>