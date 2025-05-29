<?php if(get_theme_mod('universal_404_image', 'enable')) {?>
	<div class="tag_line tag_line_image" data-background="<?php echo esc_url(get_theme_mod('universal_404_image', get_template_directory_uri() . '/assets/images/0.jpg')); ?>">
<?php } else { ?>
    <div class="tag_line tag_line_image" data-background="<?php echo get_template_directory_uri() . '/assets/images/0.jpg' ?>">
<?php } ?>
    <div class="tag-body">
		<h1><?php esc_html_e("404",'universal-wp')?></h1>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h3><?php echo esc_attr(get_theme_mod('universal_404_text_1','houston we have a problem...')) ?></h3>
					<h4><?php echo esc_attr(get_theme_mod('universal_404_text_2',"maybe, just maybe, though, you'll be able to find what you were looking for below:")) ?></h4>
					<?php get_search_form(); ?>
            		<ul class="list-inline">
						<?php if(get_theme_mod('universal_fot_soc_twitter','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_twitter','http://twitter.com'))) ?>"><i class="fa fa-twitter fa-fw fa-2x"></i></a></li><?php }; ?> 
						<?php if(get_theme_mod('universal_fot_soc_facebook','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_googleplus','http://facebook.com'))) ?>"><i class="fa fa-facebook fa-fw fa-2x"></i></a></li><?php }; ?> 
						<?php if(get_theme_mod('universal_fot_soc_googleplus','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_googleplus','http://plus.google.com'))) ?>"><i class="fa fa-google-plus fa-fw fa-2x"></i></a></li><?php }; ?> 
						<?php if(get_theme_mod('universal_fot_soc_linkedin','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_linkedin','http://linkedin.com'))) ?>"><i class="fa fa-linkedin fa-fw fa-2x"></i></a></li><?php }; ?> 
						<?php if(get_theme_mod('universal_fot_soc_instagram') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_instagram'))) ?>"><i class="fa fa-instagram fa-fw fa-2x"></i></a></li><?php }; ?> 
						<?php if(get_theme_mod('universal_fot_soc_youtube') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_youtube'))) ?>"><i class="fa fa-youtube-play fa-fw fa-2x"></i></a></li><?php }; ?>   
						<?php if(get_theme_mod('universal_fot_soc_flickr') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_flickr'))) ?>"><i class="fa fa-flickr fa-fw fa-2x"></i></a></li><?php }; ?>   
						<?php if(get_theme_mod('universal_fot_soc_tumblr') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_tumblr'))) ?>"><i class="fa fa-tumblr fa-fw fa-2x"></i></a></li><?php }; ?>   
						<?php if(get_theme_mod('universal_fot_soc_foursquare') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_foursquare'))) ?>"><i class="fa fa-foursquare fa-fw fa-2x"></i></a></li><?php }; ?>  
						<?php if(get_theme_mod('universal_fot_soc_vk') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_vk'))) ?>"><i class="fa fa-vk fa-fw fa-2x"></i></a></li><?php }; ?>   
						<?php if(get_theme_mod('universal_fot_soc_behance') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_behance'))) ?>"><i class="fa fa-behance fa-fw fa-2x"></i></a></li><?php }; ?>   
						<?php if(get_theme_mod('universal_fot_soc_pinterest') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_pinterest'))) ?>"><i class="fa fa-pinterest fa-fw fa-2x"></i></a></li><?php }; ?>
						<?php if(get_theme_mod('universal_fot_soc_github') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_github'))) ?>"><i class="fa fa-github fa-fw fa-2x"></i></a></li><?php }; ?>   
						<?php if(get_theme_mod('universal_fot_soc_rss') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_rss'))) ?>"><i class="fa fa-rss fa-fw fa-2x"></i></a></li><?php }; ?>   
		              </ul>
  						<?php $universal_widget_footer_2_count = get_theme_mod( 'universal_widget_footer_2_count', 'three'); ?>
				    		<?php if ($universal_widget_footer_2_count == 'three'): ?>
								<p class="copy-info"><?php echo get_theme_mod( 'universal_footer_copy_1', wp_kses( __('<a href="http://forbetterweb.com">©2017 <i class="fa fa-heart fa-fw"></i> forbetterweb.com</a>', 'universal-wp' ), array('a'=> array('href' => array()),'i' => array() ))); ?></p>
     						<?php elseif ($universal_widget_footer_2_count == 'two'): ?>
								<p class="copy-info"><?php echo get_theme_mod( 'universal_footer_copy_2', wp_kses( __('<a href="http://forbetterweb.com">©2017 <i class="fa fa-heart fa-fw"></i> forbetterweb.com</a>', 'universal-wp' ), array('a'=> array('href' => array()),'i' => array() ))); ?></p>
     						<?php elseif ($universal_widget_footer_2_count == 'one'): ?>
								<p class="copy-info"><?php echo get_theme_mod( 'universal_footer_copy_3', wp_kses( __('<a href="http://forbetterweb.com">©2017 <i class="fa fa-heart fa-fw"></i> forbetterweb.com</a>', 'universal-wp' ), array('a'=> array('href' => array()),'i' => array() ))); ?></p>
     						<?php endif; ?> 		            
     			</div>
			</div>
		</div>
  	</div>  	
</div>