<?php $layout_value = get_theme_mod( 'universal_post_type', 'classic' ); ?>
		<?php if ( have_posts() ) : ?>
    <div class="wrap-content">


			<?php /* Start the Loop */
				 while ( have_posts() ) :
					the_post();
					get_template_part( 'framework/content/post-search' );
			?>
			<?php endwhile; ?>

				</div>
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="archive-header">
					<h3 class="archive-title archive-search"><?php esc_html_e( 'Nothing Found', 'universal-wp' ); ?></h3>
				</header>

				<div class="search-content">
					<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'universal-wp' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>

		<?php endif; ?>