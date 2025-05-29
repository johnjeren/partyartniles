<?php


function disable_deprecated_notices() {
  error_reporting(E_ERROR | E_PARSE);
  @ini_set('display_errors', 0);
}
add_action('init', 'disable_deprecated_notices', 1);

require(__DIR__.'/includes/cpt.php');
require(__DIR__.'/includes/componentizer.php');
require(__DIR__.'/includes/image-sizes.php');
require(__DIR__.'/includes/shortcodes.php');
require(__DIR__.'/includes/acf-override.php');
require(__DIR__.'/includes/acf-menu-addon.php');
require(__DIR__.'/includes/wp_bootstrap_navwalker.php');
require(__DIR__.'/includes/custom_components_hook.php');
require(__DIR__.'/includes/header_components_hook.php');

if ( is_file(get_template_directory().'/post-types.php') ){
  require(get_template_directory().'/post-types.php');
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
    'icon_url'    => 'dashicons-admin-customizer',
    'position'    => 58
	));
}

add_filter('acf/settings/load_json', function($paths) {
    $paths = [
      get_template_directory() . '/acf-json',
      __DIR__.'/acf-json'
    ];

    if(is_child_theme()){
        $paths[] = get_stylesheet_directory() . '/acf-json';
        $paths[] = get_template_directory() . '/acf-json';

    }

    return $paths;
});

//component name Overrides
function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	$type = $layout['label'];
    $given_title = get_sub_field('component_title_display');

    if ( $given_title == '' ){
        $given_title = '<span class="component-title" style="font-weight: bold;"></span>';
    } else {
        $given_title = '<span class="component-title" style="font-weight: bold">'.$given_title.'</span> - ';
    }

	// return
	return $given_title .' ('.$type.')';

}
add_filter('acf/fields/flexible_content/layout_title', 'my_acf_flexible_content_layout_title', 10, 4);


function componentizer_plugin_path(){
  //return '/wp-content/plugins/'
  $components = function_exists('get_field') ? get_field('page_section',get_the_ID()) : null;
  return plugins_url().'/componentizer/';
}


function custom_admin_scripts() {
  if ( get_current_screen()->base != 'post' ){
    return;
  }
  wp_register_script( 'admin-scripts', componentizer_plugin_path() . '/js/acf-override.js', array('jquery'));
  wp_enqueue_style('acf-override',componentizer_plugin_path() . '/css/acf-override.css');
  if ( is_admin() ) {
    wp_enqueue_script('admin-scripts');
    $script = <<<EOF


    jQuery(document).ready(function($){

        function prepAcfTitle(){
            $('[data-name="component_title_display"]').addClass('my-acf-title').find('input').off('keyup').on('keyup',function(){
                $(this).parents('.layout').find('.component-title').html($(this).val());
            })
        }

        acf.add_action('append', function( $el ){
	           prepAcfTitle();
        });


        $('[data-event="add-layout"]').on('click',function(){
            prepAcfTitle();
        })
        prepAcfTitle();


    });
EOF;

    $style = <<<EOF
    <style type="text/css">
    .my-acf-title{
        font-size: 150%;
    }

    .my-acf-title .acf-input .acf-input-wrap input{
        font-size: 25px;
        line-height: 1em;
        padding: 0px 15px;
        height: 40px;
    }
    </style>
EOF;

    wp_add_inline_script( 'jquery-migrate', $script );
    echo $style;
  }
}
add_action( 'admin_enqueue_scripts', 'custom_admin_scripts' );

function hap_hide_the_archive_title( $title ) {
	// Skip if the site isn't LTR, this is visual, not functional.
	// Should try to work out an elegant solution that works for both directions.
	if ( is_rtl() ) {
		return $title;
	}
	// Split the title into parts so we can wrap them with spans.
	$title_parts = explode( ': ', $title, 2 );


	return $title_parts[1];
}
add_filter( 'get_the_archive_title', 'hap_hide_the_archive_title' );

// Add role class to body
function add_role_to_body($classes) {

	global $current_user;
	$user_role = array_shift($current_user->roles);

	$classes .= 'role-'. $user_role;
	return $classes;
}

add_filter('admin_body_class', 'add_role_to_body');


function cp_template_include($template){
  if ( $template != '' ){
    return $template;
  } else {
    return __DIR__.'/page.php';
  }
}
add_filter('page_template','cp_template_include',99);

// Add Reusable Component Types
$reusable_components = new CPT([
	'post_type_name'=>'reusable_components',
	'singular'=>'Component',
	'plural'=>'Reusable Components',
	'slug'=>'reusable-components',
],[
  'has_archive'=>false,
  'capability_type'	=> ['reusable_component','reusable_components'],
  'map_meta_cap'=> true,
  'menu_icon'=>'dashicons-controls-repeat'
]);

/**
CSS OVERRIDES OPTIONS
**/
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' 	=> 'CSS Overrides',
    'menu_title'	=> 'CSS Overrides',
    'menu_slug' 	=> 'css-overrides',
    'capability'	=> 'edit_css',
    'redirect'		=> false,
    'icon_url'    => 'dashicons-editor-code'
  ));
}


//Adding CSS inline style to an existing CSS stylesheet
function wpb_add_inline_css() {
    $css = function_exists('get_field') ? get_field('css_overrides', 'option') : '';
    wp_register_style( 'css-overrides',false );
    wp_enqueue_style( 'css-overrides' );
    wp_add_inline_style( 'css-overrides', preg_replace( "/\r|\n/", "", $css));
    return;
}
add_action( 'wp_enqueue_scripts', 'wpb_add_inline_css', 25 ); //Enqueue the CSS style

//add global enqueues
function comp_add_global_scripts(){
    //wp_register_script( 'jarallax',
    wp_enqueue_script('jarallax', 'https://cdnjs.cloudflare.com/ajax/libs/jarallax/1.7.3/jarallax.min.js', null, null, true );
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', false );
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', array(), false, false);
    wp_enqueue_script( 'on-page-scroll', componentizer_plugin_path().'js/onPageScroll.js', null, null, true );
    wp_enqueue_script( 'lightbox-js', componentizer_plugin_path().'js/lightbox/js/lightbox.min.js', null, null, true );
    wp_enqueue_script('vide',componentizer_plugin_path().'js/jquery.vide.min.js', null, null, true);
    wp_enqueue_style('font-awesome',componentizer_plugin_path().'css/font-awesome.min.css');
    wp_enqueue_style('lightbox-css',componentizer_plugin_path().'js/lightbox/css/lightbox.min.css');


    if ( @is_array(config('enqueued_scripts')) ){
        foreach ( config('enqueued_scripts') as $script ){
            wp_enqueue_script(@$script['name']?$script['name']:null, $script['href'], array(), false, @$script['footer']?true:false);
        }
    }

    if ( @is_array(config('enqueued_styles')) ){
        foreach ( config('enqueued_styles') as $style ){
            wp_enqueue_style(@$style['name']?$style['name']:null, $style['href'], array(), false, @$style['footer']?true:false);
        }
    }

}
add_action( 'wp_enqueue_scripts', 'comp_add_global_scripts' ); //Enqueue the CSS style


/**
  ADDING CODE BLOCKS
 */
 $code = new CPT([
   'post_type_name'=>'code',
   'singular'=>'Code Chunk',
   'plural'=>'Code Chunks',
   'slug'=>'code',
 ],[
   'has_archive'=>false,
   'capability_type'	=> ['edit_posts'],
   'map_meta_cap'=> true,
   'menu_icon'=>'dashicons-editor-code'
 ]);
add_action( 'init', 'componentizer_load_code_blocks');
function componentizer_load_code_blocks(){


  if ( !is_admin() ){
   $code_blocks = get_posts([
     'post_type'=>'code',
     'post_status'=>'publish',
     'orderby'=>'menu_order'
   ]);

   foreach ($code_blocks as $cb){

     $urls = function_exists('get_field') ? trim(get_field('url',$cb->ID)) : '';
     if ( $urls != '' ){ //limit the pages on which this can happen
       $url_arr = array_map('trim', explode(',',$urls)); //explode and trim the url options via comma
       $url = $_SERVER['REQUEST_URI']; //get current url
       $match = FALSE; //start with no match
       foreach ($url_arr as $ua){ //for each exploded option
         if ( $ua == '/' ){ //if we match the homepage with "/"
           if ( $url == '/' ){ //if we are there
             $match = TRUE; //yup
           }
         } else if ( stripos($url, $ua) !== FALSE ){ //pages other than homepage need fuzzy match
           $match = TRUE;
         }
       }

       if ( !$match ){ //if no match, we move on to the next block
         continue;
       }
     }

     $chunks = function_exists('get_field') ? get_field('code_chunk',$cb->ID) : null;

     if (is_array($chunks) || is_object($chunks)) {
       foreach ($chunks as $chunk){
       $location = $chunk['code_location'];
       $code = $chunk['code'];


       if ( $location == 'head' ){
         add_action('wp_head', function() use ($code){
           echo "\n".$code."\n";
         }, 50);
       }

       if ( $location == 'after_body_start' ){
         add_action('after_body_open_tag',function() use ($code){
           echo "\n".$code."\n";
         },50);
       }

       if ( $location == 'before_body_end' ){
         add_action('wp_footer',function() use ($code){
           echo "\n".$code."\n";
         },50);
        }
      }
    }
  }
}
};
/**
 END CODE BLOCKS
 */



/**
ANALYTICS TRACKING
**/
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' 	=> 'Analytics Tracking',
    'menu_title'	=> 'Analytics Tracking',
    'menu_slug' 	=> 'analytics-tracking',
    'capability'	=> 'edit_analytics_tracking',
    'redirect'		=> false,
    'icon_url'    => 'dashicons-editor-code'
  ));
}

function ga_head(){
    $ga_id = function_exists('get_field') ? get_field('google_analytics_id', 'option') : '';
    if($ga_id != ''){
?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '<?=$ga_id?>', 'auto');
    ga('send', 'pageview');

</script>
<?php
  }
}
add_action('wp_head', 'ga_head');


function ga_script() {
?>
<script type="text/javascript">
    function trackGaBtnClick(e, label,dest){
        console.log(e);
        e.preventDefault();
        ga('send', {
            hitType: 'event',
            eventCategory: 'Button',
            eventAction: 'click',
            eventLabel: label,
            hitCallback: function() {
                window.location = dest;
            }
        });
    }
</script>
<?php
}
add_action( 'wp_footer', 'ga_script' );



/**
Set Up Componentizer Docs Route
*/
function componentizer_docs_rewrite_rule() {
    add_rewrite_rule( 'componentizer-docs', 'index.php?componentizer_docs=yes', 'top' );
}
add_action( 'init', 'componentizer_docs_rewrite_rule' );

function componentizer_docs_register_query_var( $vars ) {
    $vars[] = 'componentizer_docs';
    return $vars;
}
add_filter( 'query_vars', 'componentizer_docs_register_query_var' );

function componentizer_docs_url_rewrite_templates() {
    if ( get_query_var( 'componentizer_docs' ) ) {
        add_filter( 'template_include', function() {
            return __DIR__ . '/componentizer_docs.php';
        });
    }
}
add_action( 'template_redirect', 'componentizer_docs_url_rewrite_templates' );
/**
END Componentizer Docs Route
*/

function create_on_page_nav_menu() {
    $menu_name = 'On Page Navigation (Leave Blank)';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    // If it doesn't exist, let's create it.
    if( !$menu_exists){
        $menu_id = wp_create_nav_menu($menu_name);
    }
}
add_action( 'admin_head', 'create_on_page_nav_menu' );

/**
 WP Effeciency gains
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
function stop_loading_wp_embed() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}
add_action('init', 'stop_loading_wp_embed');
// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );
// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
// Remove all embeds rewrite rules.
//add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
/**
 END WP Effeciency gains
 */
