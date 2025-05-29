<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="06jVEt4rdWdSLA6CqqOdHj5HbCt6_tU-dmDD4Z1dNXQ" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php $allowed_html_array = wp_kses_allowed_html( 'post' )?>
  <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {?><link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('universal_logo_favicon', get_template_directory_uri() . '/assets/images/favicon.png')); ?>"> <?php };?>
	<?php if(get_theme_mod('universal_logo_favicon_iphone', 'enable'))  : ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('universal_logo_favicon_iphone', get_template_directory_uri() . '/assets/images/114.png')); ?>" /><?php endif; ?>
	<?php if(get_theme_mod('universal_logo_favicon_ipad', 'enable'))  : ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('universal_logo_favicon_ipad', get_template_directory_uri() . '/assets/images/144.png')); ?>" /><?php endif; ?>
  <?php wp_head(); ?>
</head>
<body id="page-top" <?php body_class(); ?>>

<?php if(get_theme_mod('universal_preloader','enable') == true)  { ?><div id="preloader"><div id="status"></div></div><?php }; ?>  

<?php if(get_theme_mod('universal_scroll_up','enable') == true)  { ?><a href="#top" class="scroll-top scroll-top-hidden"><i class="fa fa-angle-up"></i></a><?php }; ?>  

<div class="wrapper">
  <div class="header">  
    <?php  get_template_part( 'framework/content/menu'); ?>
  </div>
<?php if(!is_page_template( array('homepage.php', 'coming-soon.php'))) {?>
<?php if(!is_search()) {?>
<?php if(!is_404()) {?>
<?php if(!is_single()) {?>
<?php if(!class_exists( 'WooCommerce' ) || !is_woocommerce()) {?>

    <?php $post = get_post($id); $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'wall-portfolio-squre'); ?> 

      <?php if (has_post_thumbnail()) { ?> 

        <div class="tag_line tag_line_image" data-background="<?php echo esc_url($image[0]); ?>">
          
      <?php } else {?>

        <div class="tag_line tag_line_image" data-background="<?php echo get_template_directory_uri() . '/assets/images/10.jpg' ?>">

      <?php };?>

      <div class="tag-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if (is_page()){ ?>

                        <h1 class="tag_line_title"><?php the_title() ?></h1>

                    <?php } elseif (is_front_page()) { ?>

                        <h1 class="tag_line_title"><?php esc_html_e('Blog', 'universal-wp') ?></h1>

                    <?php } elseif (is_blog()) { if(is_archive()){ ?>

                        <h1 class="tag_line_title"><?php single_cat_title() ?></h1>

                    <?php };};?>

                    <?php universal_breadcrumbs(); ?>
                </div>
                <?php 
                  global $post;
                  $id = 'featured_image_full';
                  if(get_post_meta( $post->ID, $id, true )){echo '<div data-wow-delay="1s" class="scroll-btn hidden-xs wow fadeInDown"><a href="#first-block" class="page-scroll"><span class="mouse"><span class="weel"><span></span></span></span></a></div>'; }
                ?>
            </div>
        </div>
    </div>
  </div>
  <?php };?>
  <?php };?>
  <?php };?>

<?php } else { ?>
    <?php if(get_theme_mod('universal_search_image', 'enable')) {?>
      <div class="tag_line tag_line_image" data-background="<?php echo esc_url(get_theme_mod('universal_search_image', get_template_directory_uri() . '/assets/images/10.jpg')); ?>">
    <?php } else { ?>
      <div class="tag_line tag_line_image" data-background="<?php echo get_template_directory_uri() . '/assets/images/10.jpg' ?>">
    <?php } ?>
      <div class="tag-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h1 class="tag_line_title">
                    <?php printf( wp_kses( __('Search Results: <span class="colored">%s</span>', 'universal-wp'), $allowed_html_array ), get_search_query() ); ?>
                  </h1>
                </div>
            </div>
        </div>
      </div>
    </div>

<?php };?>
<?php };?>

<?php if (class_exists( 'WooCommerce' )) { ?>
  <?php if (is_woocommerce()) { ?>
    <?php if(get_theme_mod('universal_woo_image', 'enable')) {?>
      <div class="tag_line tag_line_image" data-background="<?php echo esc_url(get_theme_mod('universal_woo_image', get_template_directory_uri() . '/assets/images/woo.jpg')); ?>">
    <?php } else { ?>
      <div class="tag_line tag_line_image" data-background="<?php echo get_template_directory_uri() . '/assets/images/woo.jpg' ?>">
    <?php } ?>
      <div class="tag-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="tag_line_title"><?php woocommerce_page_title() ?></h1>
                    <div class="breadcrumbs"><?php woocommerce_breadcrumb() ?></div>
                </div>
            </div>
        </div>
      </div>
    </div>
<?php };?>
<?php };?>
<div class="main-content">