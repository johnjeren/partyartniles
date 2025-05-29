<?php $layout_value = get_theme_mod( 'universal_post_type', 'masonry' ); ?>
	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h3 class="archive-title archive-category">Category: <?php printf( esc_html__( '%s', 'universal-wp' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h3>
			<?php if ( category_description() ) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
		</header>
		<?php if ($layout_value == 'masonry') {?>
			   <div class="wrap-content universal_mas_container">
		<?php } else { ?>
			   <div class="wrap-content">
		<?php } ?>
		<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'framework/formats/format', get_post_format() );
				endwhile;
				else :
					echo "<p class='not-found'>" . esc_html__('Sorry, no posts in this category.', 'universal-wp') . "</p>";
				endif;  		
			?>
				</div>