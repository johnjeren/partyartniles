<footer>
	<div class="footer">
		<?php if(get_theme_mod('universal_widget_footer', true) == true)  { ?>
		<div class="footer-area-cont">
			<div class="container">
				<div class="row">
				  <?php $universal_widget_footer_count = get_theme_mod( 'universal_widget_footer_count', 'one'); ?>
				    <?php if ($universal_widget_footer_count == 'three'): ?>
				    	<?php if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) { ?>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="footer-widget">
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="footer-widget">
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="footer-widget">
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
							</div>
						</div>
						<?php } ?>
     				<?php elseif ($universal_widget_footer_count == 'four'): ?>
     					<?php if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) { ?>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="footer-widget">
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-1' ); ?>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="footer-widget">
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-2' ); ?>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="footer-widget">
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-3' ); ?>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="footer-widget">
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-4' ); ?>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php elseif ($universal_widget_footer_count == 'one'): ?>
     					<?php if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) { ?>
							<div class="col-sm-4">
								<div class="footer-widget">							
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-1' ); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-sm-offset-1">
								<div class="footer-widget">							
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-2' ); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="footer-widget">							
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-3' ); ?>
									</div>
								</div>
							</div>
							<div class="col-sm-3 text-right">
								<div class="footer-widget">							
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-4' ); ?>
									</div>
								</div>
							</div>
						<?php } ?>
     				<?php elseif ($universal_widget_footer_count == 'five'): ?>
     					<?php if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) { ?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="footer-widget">
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-1' ); ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="footer-widget">
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-2' ); ?>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="footer-widget">
									<div class="footer-area">
										<?php dynamic_sidebar( 'footer-3' ); ?>
									</div>
								</div>
							</div>
						<?php } ?>
     				<?php endif; ?> 
				</div>
			</div>
		</div>
		<?php }; ?> 
		<?php if(get_theme_mod('universal_author_footer', 'enable') == true)  { ?>
			<?php if(get_theme_mod('universal_author_footer_color', 'white') == 'white')  { ?>
				<div class="footer-copyright white">
					<?php } elseif (get_theme_mod('universal_author_footer_color') == 'grey') { ?>	
				<div class="footer-copyright grey">
					<?php } elseif (get_theme_mod('universal_author_footer_color') == 'dark') { ?>	
				<div class="footer-copyright dark">
     		<?php }; ?> 
			<div class="container">
				<div class="row">
					<?php $universal_widget_footer_2_count = get_theme_mod( 'universal_widget_footer_2_count', 'three'); ?>
				    <?php if ($universal_widget_footer_2_count == 'three'): ?>
					<div class="col-sm-4 three-block">
						<div class="copyright-info text-left">
							<h6><?php echo get_theme_mod( 'universal_footer_copy_1', wp_kses( __('Powered by <a href="https://themeforest.net/user/forbetterweb" target="_blank">forbetterweb.com</a>', 'universal-wp'), array('a'=> array('href' => array(),'target' => array())))); ?></h6>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1 three-block">
						<div class="love-info">
							<h6><?php echo get_theme_mod( 'universal_footer_love', wp_kses( __('We <i class="fa fa-heart fa-fw"></i> creative people', 'universal-wp'), array('i'=> array('class' => array())))); ?></h6>
						</div>
					</div>

					<div class="col-sm-3 col-sm-offset-1 three-block">
            			<ul class="list-inline text-right">
		                  	<?php if(get_theme_mod('universal_fot_soc_twitter','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_twitter','http://twitter.com'))) ?>"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_facebook','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_facebook','http://facebook.com'))) ?>"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_googleplus','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_googleplus','http://plus.google.com'))) ?>"><i class="fa fa-google-plus fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_linkedin','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_linkedin','http://linkedin.com'))) ?>"><i class="fa fa-linkedin fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_instagram') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_instagram'))) ?>"><i class="fa fa-instagram fa-fw fa-lg"></i></a></li><?php }; ?> 
							<?php if(get_theme_mod('universal_fot_soc_youtube') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_youtube'))) ?>"><i class="fa fa-youtube-play fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_flickr') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_flickr'))) ?>"><i class="fa fa-flickr fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_tumblr') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_tumblr'))) ?>"><i class="fa fa-tumblr fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_foursquare') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_foursquare'))) ?>"><i class="fa fa-foursquare fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_vk') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_vk'))) ?>"><i class="fa fa-vk fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_behance') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_behance'))) ?>"><i class="fa fa-behance fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_pinterest') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_pinterest'))) ?>"><i class="fa fa-pinterest fa-fw fa-lg"></i></a></li><?php }; ?>
							<?php if(get_theme_mod('universal_fot_soc_github') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_github'))) ?>"><i class="fa fa-github fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_rss') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_rss'))) ?>"><i class="fa fa-rss fa-fw fa-lg"></i></a></li><?php }; ?>   
		              </ul>
              		</div>
     				<?php elseif ($universal_widget_footer_2_count == 'two'): ?>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 two-block">
						<div class="copyright-info text-left">
							<h6><?php echo get_theme_mod( 'universal_footer_copy_2', wp_kses( __('Powered by <a href="https://themeforest.net/user/forbetterweb" target="_blank">forbetterweb.com</a>', 'universal-wp'), array('a'=> array('href' => array(),'target' => array())))); ?></h6>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 two-block">
            			<ul class="list-inline text-right">
		                  	<?php if(get_theme_mod('universal_fot_soc_twitter','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_twitter','http://twitter.com'))) ?>"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_facebook','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_facebook','http://facebook.com'))) ?>"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_googleplus','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_googleplus','http://plus.google.com'))) ?>"><i class="fa fa-google-plus fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_linkedin','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_linkedin','http://linkedin.com'))) ?>"><i class="fa fa-linkedin fa-fw fa-lg"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_instagram') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_instagram'))) ?>"><i class="fa fa-instagram fa-fw fa-lg"></i></a></li><?php }; ?> 
							<?php if(get_theme_mod('universal_fot_soc_youtube') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_youtube'))) ?>"><i class="fa fa-youtube-play fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_flickr') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_flickr'))) ?>"><i class="fa fa-flickr fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_tumblr') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_tumblr'))) ?>"><i class="fa fa-tumblr fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_foursquare') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_foursquare'))) ?>"><i class="fa fa-foursquare fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_vk') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_vk'))) ?>"><i class="fa fa-vk fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_behance') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_behance'))) ?>"><i class="fa fa-behance fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_pinterest') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_pinterest'))) ?>"><i class="fa fa-pinterest fa-fw fa-lg"></i></a></li><?php }; ?>
							<?php if(get_theme_mod('universal_fot_soc_github') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_github'))) ?>"><i class="fa fa-github fa-fw fa-lg"></i></a></li><?php }; ?>   
							<?php if(get_theme_mod('universal_fot_soc_rss') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_rss'))) ?>"><i class="fa fa-rss fa-fw fa-lg"></i></a></li><?php }; ?>   

		              </ul>
					</div>
     				<?php elseif ($universal_widget_footer_2_count == 'one'): ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 one-block">
						<?php if(get_theme_mod('universal_fot_arrow', 'enable') == true)  { ?>
							<div class="arrow-to-top" data-wow-iteration="999" data-wow-duration="3s" class="wow flash"><a href="#page-top" class="page-scroll"><i class="icon ion-ios-arrow-up fa-2x"></i></a></div>
						<?php }; ?>	
            			<ul class="list-inline text-center">
		                  	<?php if(get_theme_mod('universal_fot_soc_twitter','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_twitter','http://twitter.com'))) ?>"><i class="fa fa-twitter fa-fw fa-2x"></i></a></li><?php }; ?> 
		                  	<?php if(get_theme_mod('universal_fot_soc_facebook','enable') == true) {?><li><a href="<?php echo esc_url(stripslashes(get_theme_mod('universal_fot_soc_facebook','http://facebook.com'))) ?>"><i class="fa fa-facebook fa-fw fa-2x"></i></a></li><?php }; ?> 
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
			          	<?php if(get_theme_mod('universal_fot_button', 'enable') == true)  { ?><p><?php echo get_theme_mod( 'universal_fot_button_link', wp_kses( __('<a href="https://themeforest.net/item/universal-smart-multipurpose-wordpress-theme/17680955?ref=ForBetterWeb" class="btn btn-lg btn-gray">Purchase now</a>', 'universal-wp' ), array('a'=> array('href' => array(), 'class' => array())))); ?></p><?php }; ?>
						<p class="copy-info"><?php echo get_theme_mod( 'universal_footer_copy_3', wp_kses( __('<a href="http://forbetterweb.com">©2017 <i class="fa fa-heart fa-fw"></i> forbetterweb.com</a>', 'universal-wp' ), array('a'=> array('href' => array()),'i' => array() ))); ?></p>
				</div>
     				<?php endif; ?> 
				</div>
			</div>
		</div>
		<?php }; ?>		
	</div>
</footer>