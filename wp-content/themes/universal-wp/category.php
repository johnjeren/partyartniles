<?php get_header(); ?>
    <div class="container content-wrap">
        <div class="row">
            <?php $layout_value = get_theme_mod( 'universal_sidebars', 'sidebar-right' ); ?>
             <?php if ($layout_value == 'sidebar-left'): ?>
                <div class="col-lg-8 col-md-8 col-sm-12 sidebar-left">
                <?php get_template_part( 'framework/content/category');?>
                </div>
                <?php get_sidebar(); ?>
            <?php elseif ($layout_value == 'sidebar-right'): ?>
                <div class="col-lg-8 col-md-8 col-sm-12 sidebar-right">
                <?php get_template_part( 'framework/content/category');?>
                </div>
                <?php get_sidebar(); ?>
            <?php else: ?>
                <div class="col-lg-12 col-md-12 col-sm-12 no-sidebar">
                <?php get_template_part( 'framework/content/category');?>
                </div>    
            <?php endif; ?>
        </div>                
    </div>
    <?php the_posts_pagination( array('prev_text' => __('&laquo;'), 'next_text'    => __('&raquo;'))) ?>
<?php get_footer(); ?>
