<?php $layout_value = get_theme_mod( 'universal_post_type', 'masonry' ); ?>

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h3 class="archive-title archive-date"><?php
					if ( is_day() ) :
						printf( esc_html__( '%s', 'universal-wp' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( esc_html__( '%s', 'universal-wp' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'universal-wp' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( esc_html__( '%s', 'universal-wp' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'universal-wp' ) ) . '</span>' );
					else :
						esc_html_e( 'Archives', 'universal-wp' );
					endif;
				?></h3>
			</header><!-- .archive-header -->
<?php if ($layout_value == 'masonry') {?>
    <div class="wrap-content universal_mas_container">
<?php } else { ?>
    <div class="wrap-content">
<?php } ?>
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'framework/formats/format', get_post_format() ); ?>
			<?php endwhile; ?>
				</div>
		<?php else : ?>
				<?php  echo "<p class='not-found'>" . esc_html__('Sorry, no posts in archives.', 'universal-wp') . "</p>";
			endif; ?>
