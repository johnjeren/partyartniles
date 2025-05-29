<?php $layout_value = get_theme_mod( 'universal_post_type', 'masonry' ); ?>
<?php if ($layout_value == 'masonry'){ ?>
    <div class="wrap-content universal_mas_container">
<?php } else { ?>
    <div class="wrap-content">
<?php } ?>


                                <?php
                                    $get_cats_for_filter = array(
                                        'type'                     => 'post',
                                        'child_of'                 => 0,
                                        'parent'                   => '',
                                        'orderby'                  => 'name',
                                        'order'                    => 'ASC',
                                        'hide_empty'               => 1,
                                        'hierarchical'             => 0,
                                        'exclude'                  => '',
                                        'include'                  => '',
                                        'number'                   => 4,
                                        'taxonomy'                 => 'category',
                                        'pad_counts'               => false 
                                    );
                                    $get_cats_for_filter = get_categories($get_cats_for_filter);
                                ?>


           
                    <?php if ( !is_archive() ) { 


                        $paged = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                        $args = array(
                            'cat' => $cat,
                            'paged'          => $paged
                        );

                        query_posts( $args );

                };
                
                    if (!(have_posts())) { ?><h3 class="page_title"><?php esc_html_e('Nothing was found','universal-wp')?></h3><?php }   
                    if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                    
                        <?php get_template_part( 'framework/formats/format', get_post_format() );   ?>
            
                    <?php endwhile; endif;?>
                                                
    </div>






