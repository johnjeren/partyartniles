<?php
/* ======================================= */
/* Universal Theme Functions */
/* ======================================= */
if ( ! isset( $content_width ) ) $content_width = 1140; /* pixels */

/* Makes theme available for translation. */
add_action('after_setup_theme', 'universal_theme_setup');
function universal_theme_setup(){

load_theme_textdomain( 'universal-wp', get_template_directory() . '/language' );
}


/*=======================================
  TGM Plugins Activations
=======================================*/
require_once get_template_directory() . '/framework/functions/tgma/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'universal_register_required_plugins' );
function universal_register_required_plugins() {

  $plugins = array(

    array(
      'name'               => 'Kirki Customizer', // The plugin name
      'slug'               => 'kirki', // The plugin slug (typically the folder name)
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),
     array(
      'name'               => 'Visual Composer: Page Builder for WordPress', // The plugin name
      'slug'               => 'js_composer', // The plugin slug (typically the folder name)
      'source'             => 'js_composer.zip',
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '5.5.2',
      'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => false, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Universal Shortcodes', // The plugin name
      'slug'               => 'universal-shortcodes', // The plugin slug (typically the folder name)
      'source'             => 'universal-shortcodes.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Universal Portfolio', // The plugin name
      'slug'               => 'universal-portfolio', // The plugin slug (typically the folder name)
      'source'             => 'universal-portfolio.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Universal Testimonials', // The plugin name
      'slug'               => 'universal-testimonials', // The plugin slug (typically the folder name)
      'source'             => 'universal-testimonials.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'               => 'Universal Widgets', // The plugin name
      'slug'               => 'universal-widgets', // The plugin slug (typically the folder name)
      'source'             => 'universal-widgets.zip', // The plugin source
      'required'           => true, // If false, the plugin is only 'recommended' instead of required
      'version'            => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
      'force_deactivation' => true, // If true, plugin is deactivated upon theme activation and cannot be deactivated until theme switch
    ),

    array(
      'name'            => 'Contact Form 7', // The plugin name
      'slug'            => 'contact-form-7', // The plugin slug (typically the folder name)
      'required'        => false, // If false, the plugin is only 'recommended' instead of required
    ),

    array(
      'name'            => 'WP Instagram Widget', // The plugin name
      'slug'            => 'wp-instagram-widget', // The plugin slug (typically the folder name)
      'required'        => false, // If false, the plugin is only 'recommended' instead of required
    ),
    
    array(
      'name'            => 'Envato Market', // The plugin name
      'slug'            => 'envato-market', // The plugin slug (typically the folder name)
      'source'          => 'envato-market.zip', // The plugin source
      'required'        => false, // If false, the plugin is only 'recommended' instead of required
    ),

  );

  $config = array(
    'id'           => 'universal',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => dirname( __FILE__ ) . '/framework/functions/tgma/plugins/',
    'menu'         => 'tgmpa-install-plugins',
    'parent_slug'  => 'themes.php',
    'capability'   => 'edit_theme_options',
    'has_notices'  => true,
    'dismissable'  => true,
    'dismiss_msg'  => '',
    'is_automatic' => true,
    'message'      => '',
  );

  tgmpa( $plugins, $config );
}

class UniversalTheme_VC {


  public function __construct() {

    // set hooks
    add_action( 'vc_before_init', array( $this, 'set_vc_as_bundled' ) );
    add_action( 'vc_build_admin_page', array( $this, 'remove_vc_core_widgets' ) );
    add_action( 'vc_load_shortcode', array( $this, 'remove_vc_core_widgets' ) );
    remove_action( 'admin_init', 'vc_page_welcome_redirect');
    remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect');


    // add custom param type
    if ( function_exists( 'vc_add_shortcode_param' ) ) {
      vc_add_shortcode_param( 'hidden_textfield', array( $this, 'hidden_field_param_cb' ) );
    }
  }


  /**
   * Setup VC as "bundled with theme"
   */
  public function set_vc_as_bundled() {
    if ( function_exists( 'vc_manager' ) ) {
      vc_manager()->disableUpdater( true );
      vc_manager()->setIsAsTheme( true );

    }
    vc_set_as_theme();
  }


  /**
   * Remove rude VC built-in elements
   */
  public function remove_vc_core_widgets() {
    vc_remove_element( 'vc_gallery' );
    vc_remove_element( 'vc_images_carousel' );
    vc_remove_element( 'vc_cta' );
    vc_remove_element( 'vc_posts_slider' );
  }

}
new UniversalTheme_VC();



/*-----------------------------------------------------------------------------------*/
/*	Universal Includes
/*-----------------------------------------------------------------------------------*/

include( get_template_directory() . '/framework/functions/theme-options.php');
include( get_template_directory() . '/framework/meta/metabox-class.php');
include( get_template_directory() . '/framework/meta/classes.php');
include( get_template_directory() . '/framework/functions/breadcrumbs.php');
include( get_template_directory() . '/framework/functions/sidebars.php');
include( get_template_directory() . '/framework/functions/search-exclude/search-exclude.php');
include get_parent_theme_file_path( 'framework/functions/theme-support-beacon/init.php');
if ( class_exists( 'WooCommerce' ) ) {
  include (get_template_directory() . '/framework/functions/woocommerce.php');
};


/*-----------------------------------------------------------------------------------*/
/*  Universal Image Size
/*-----------------------------------------------------------------------------------*/


add_image_size('universal_shop_main', 690, 810, true);
add_image_size('universal_shop_single', 555, 650, true);
add_image_size('universal_shop_thumbnail', 104, 122, true);


/*-----------------------------------------------------------------------------------*/
/*	Universal Register menu
/*-----------------------------------------------------------------------------------*/

if( !function_exists('universal_register_menu') ) {
  function universal_register_menu() {
    register_nav_menus(
      array(
      'menu' => esc_html__('Main Menu', 'universal-wp' ),
      'onepage-menu' => esc_html__('One Page Menu', 'universal-wp' )
      )
    );
  }
  add_action( 'init', 'universal_register_menu' );
}

/*
|--------------------------------------------------------------------------
| Universal Audio Function
|--------------------------------------------------------------------------
*/

if(!function_exists('universal_audio')) {
  function universal_audio($postid) {

    $single_audio_item = get_post_meta($postid, 'universal_external_audio_block', true);

    if(($single_audio_item != '')) {
      if( strpos($single_audio_item, 'soundcloud') ) {

        $id = $single_audio_item;

        echo '<div class="post-audio"> ' .$id. ' </div>';
      }
    }

  }
}


/*
|--------------------------------------------------------------------------
| Universal Video Function
|--------------------------------------------------------------------------
*/

if(!function_exists('universal_video')) {
  function universal_video($postid) {

    $single_video_item = get_post_meta($postid, 'universal_external_video_block', true);



        echo '<div class="post-video">'.$single_video_item.'</div>';

    }

  }

/*
|--------------------------------------------------------------------------
| Universal Gallery function
|--------------------------------------------------------------------------
*/

if ( !function_exists( 'universal_gallery' ) ) {
  function universal_gallery($postid) {

    $gallery_images = get_post_meta($postid, 'universal_gallery_block',true);

    if(!empty($gallery_images)) {

        echo '<div class="owl-carousel gallery-slider" id="gs-'.$postid.'">';

          foreach ($gallery_images as $gallery_item) {
            $item_url = $gallery_item['universal_gallery_post'];

              echo  '<img src="'. $item_url['url'] .'" class="img-responsive">';
          }

        echo  '</div>';
    }
  }
}


/*
|--------------------------------------------------------------------------
| Universal More Remove
|--------------------------------------------------------------------------
*/

add_filter( 'the_content_more_link', 'universal_modify_read_more_link' );
function universal_modify_read_more_link() {
return '';
};


/*
|--------------------------------------------------------------------------
| Remove more link function
|--------------------------------------------------------------------------
*/

function universal_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'universal_excerpt_more');

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
  wp_enqueue_script( 'comment-reply' );

/*
|--------------------------------------------------------------------------
| Theme Stylesheets
|--------------------------------------------------------------------------
*/

function universal_scripts_styles(){
  $theme_info = wp_get_theme();
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('universal-fonts', universal_fonts_url(), array(), null );
  wp_enqueue_style('universal-style', get_stylesheet_uri(), array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('universal-style-css', get_template_directory_uri() . '/assets/css/theme-style.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('fontawesome-icons', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('ionicons-icons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('swipebox', get_template_directory_uri() . '/assets/css/swipebox.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('universal-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), $theme_info->get( 'Version' )); 
  wp_enqueue_style('universal-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), $theme_info->get( 'Version' )); 
}
add_action( 'wp_enqueue_scripts', 'universal_scripts_styles', 90 );

function equip_admin() {
  $theme_info = wp_get_theme(); 
  wp_enqueue_style( 'pheromone-admin-styles', get_template_directory_uri() . '/assets/css/admin/styles.css', array(), $theme_info->get( 'Version' )); 
};
add_action('admin_enqueue_scripts', 'equip_admin', 10000 );

/*
|--------------------------------------------------------------------------
| Theme Scripts
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'universal_load_scripts' ) ) {
  function universal_load_scripts() {

    $theme_info = wp_get_theme(); 

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('viewportchecker', get_template_directory_uri() . '/assets/js/viewportchecker.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('fitvids',  get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('smartmenus', get_template_directory_uri() . '/assets/js/jquery.smartmenus.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('swipebox', get_template_directory_uri() . '/assets/js/jquery.swipebox.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('isotope-custom', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/jquery.waitforimages.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('PageScroll2id', get_template_directory_uri() . '/assets/js/jquery.malihu.PageScroll2id.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('retina',  get_template_directory_uri() . '/assets/js/retina.min.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('universal-responsive', get_template_directory_uri() . '/assets/js/responsive.js', array('jquery'), $theme_info->get( 'Version' ), true);
    wp_enqueue_script('universal-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_info->get( 'Version' ), true);
    if(is_singular() && comments_open()) {wp_enqueue_script('comment-reply');}

  };
};
add_action('wp_enqueue_scripts', 'universal_load_scripts');






/*
|--------------------------------------------------------------------------
| Universal page menu
|--------------------------------------------------------------------------
*/

function universal_page_menu_args( $args ) {
  if ( ! isset( $args['show_home'] ) )
    $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'universal_page_menu_args' );

/*
|--------------------------------------------------------------------------
| Universal content navigation
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'universal_content_nav' ) ) :

function universal_content_nav( $html_id ) {
  global $wp_query;

  if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav id="<?php echo esc_attr($html_id) ?>" class="navigation" role="navigation">
      <div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span>'.esc_html__('Older posts', 'universal-wp' ) ); ?></div>
      <div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'universal-wp' ) . '<span class="meta-nav">&rarr;</span>' ); ?></div>
    </nav>
  <?php endif;
}
endif;


/*
|--------------------------------------------------------------------------
| Universal comments
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'universal_comment' ) ) :
function universal_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <p><?php esc_html_e( 'Pingback:', 'universal-wp' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'universal-wp' ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;
    default :
    global $post;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      <header class="comment-meta comment-author vcard">
        <?php
          echo get_avatar( $comment, 75 );
          printf( '<div class="author-card">%1$s</div>',
            get_comment_author_link(),
            ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author', 'universal-wp' ) . '</span>' : ''
          );
          printf( '<div class="comment-time">%3$s</div>',
            esc_url( get_comment_link( $comment->comment_ID ) ),
            get_comment_time( 'c' ),
            sprintf( esc_html__( '%1$s at %2$s', 'universal-wp' ), get_comment_date(), get_comment_time() )
          );
        ?>
      </header>

      <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'universal-wp' ); ?></p>
      <?php endif; ?>

      <section class="comment-content comment">
        <?php comment_text(); ?>
        <?php edit_comment_link( esc_html__( 'Edit', 'universal-wp' ), '<div class="edit-link">', '</div>' ); ?>
        <div class="reply">
          <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'universal-wp' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div><!-- .reply -->
      </section><!-- .comment-content -->
    </article><!-- #comment-## -->
  <?php
    break;
  endswitch; // end comment_type check
}
endif;

function is_blog() {
  global $post;
  $posttype = get_post_type( $post );
  return ( ( $posttype == 'post' ) && ( is_home() || is_single() || is_archive() || is_category() || is_tag() || is_author() ) ) ? true : false;
}

function universal_fix_blog_link_on_cpt( $classes, $item, $args ) {
  if( !is_blog() ) {
    $blog_page_id = intval( get_option('page_for_posts') );
    if( $blog_page_id != 0 && $item->object_id == $blog_page_id )
      unset($classes[array_search('current_page_parent', $classes)]);
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'universal_fix_blog_link_on_cpt', 10, 3 );
/*
|--------------------------------------------------------------------------
| Universal post types and functions
|--------------------------------------------------------------------------
*/

function universal_setup() {
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( "title-tag" );
  add_theme_support( 'post-formats', array( 'image', 'link', 'quote', 'video', 'audio', 'gallery' ) );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'woocommerce' );
  set_post_thumbnail_size( 680, 9999 ); // Unlimited height, soft crop
}

add_action( 'after_setup_theme', 'universal_setup' );




// post by views functionality
function universal_set_post_views($postID) {
    $count_key = 'universal_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function universal_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    universal_set_post_views($post_id);
}
add_action( 'wp_head', 'universal_track_post_views');

function universal_get_post_views($postID){
    $count_key = 'universal_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

/*-----------------------------------------------------------------------------------*/
/*  Add fullscreen check box to Featured Image 
/*-----------------------------------------------------------------------------------*/



function universal_featured_image_fullscreen( $content ) {
    global $post;
      $text = esc_html__('Fullscreen (only with Template: Visual Composer)', 'universal-wp');
      $id = 'featured_image_full';
      $value = esc_attr( get_post_meta( $post->ID, $id, true ) );
      $label = '<label for="' . $id . '" class="selectit"><input name="' . $id . '" type="checkbox" id="' . $id . '" value="' . $value . ' "'. checked( $value, 1, false) .'> ' . $text .'</label>';
      return $content .= $label;
}

add_filter( 'admin_post_thumbnail_html', 'universal_featured_image_fullscreen' );

  
function universal_save_featured_image_fullscreen( $post_id, $post, $update ) {
  
    $value = 0;
    if ( isset( $_REQUEST['featured_image_full'] ) ) {
        $value = 1;
    }
    // Set meta value to either 1 or 0
    update_post_meta( $post_id, 'featured_image_full', $value );
}
add_action( 'save_post', 'universal_save_featured_image_fullscreen', 10, 3 );

function universal_body_classes($classes) { 
global $post;
if (is_page()) {
    $id = 'featured_image_full';
    if(get_post_meta( $post->ID, $id, true )){$classes[] = 'fullscreen'; }
    return $classes; 
  } elseif (is_404()) {
      $classes[] = 'fullscreen error404';   
    return $classes;
  } elseif (is_admin_bar_showing()) {
      $classes[] = 'admin-bar';   
    return $classes;
  }
  return $classes;
};
add_filter('body_class', 'universal_body_classes');


/*-----------------------------------------------------------------------------------*/
/*  Connect Google Fonts
/*-----------------------------------------------------------------------------------*/


function universal_fonts_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Lora, translate this to 'off'. Do not translate
* into your own language.
*/
$raleway = _x( 'on', 'Raleway font: on or off', 'universal-wp' );
$open_sans = _x( 'on', 'Roboto Mono font: on or off', 'universal-wp' );
$caveat = _x( 'on', 'Caveat font: on or off', 'universal-wp' );
$great_vibes = _x( 'on', 'Great Vibes font: on or off', 'universal-wp' );
 
if ( 'off' !== $raleway || 'off' !== $open_sans || 'off' !== $caveat || 'off' !== $great_vibes ) {
$font_families = array();
 
if ( 'off' !== $raleway ) {
$font_families[] = 'Raleway:100,200,300,400,500,600,700,800,900';
}
 
if ( 'off' !== $open_sans ) {
$font_families[] = 'Roboto Mono:100,400';
}

if ( 'off' !== $caveat ) {
$font_families[] = 'Caveat';
}

if ( 'off' !== $great_vibes ) {
$font_families[] = 'Great Vibes';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
}
 
return esc_url_raw( $fonts_url );
}

/*-----------------------------------------------------------------------------------*/
/*	Other Functions
/*-----------------------------------------------------------------------------------*/

add_filter('wp_list_categories', 'universal_add_span_cat_count');
function universal_add_span_cat_count($links) {
$links = str_replace('(', '<span class="universal_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}

if(get_theme_mod('universal_menu_select') == 'onepage')  { 
  function universal_add_classes_a($atts, $item, $args) {
      $class = 'page-scroll';
      $atts['class'] = $class;
      return $atts;
  }
add_filter('nav_menu_link_attributes','universal_add_classes_a', 10, 3 );
};

function universal_MenuFallback ($args) {
  echo '<ul id="menu-all-pages" class="nav navbar-nav"><li id="menu-item-968" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-968"><a href="'. get_home_url() .'">' . esc_html__('Home', 'universal-wp') . '</a></li>
</ul>';
}


class Universal_My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = Array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}