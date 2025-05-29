<?php if ( post_password_required() ) return; ?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _x( 'One Comment', '%1$s Comments', get_comments_number(), 'universal-wp' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'universal_comment', 'style' => 'ol' ) ); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php esc_html_e( 'Comment navigation', 'universal-wp' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'universal-wp' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'universal-wp' ) ); ?></div>
		</nav>
		<?php endif; ?>
		<?php the_comments_navigation(); ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'universal-wp' ); ?></p>
	<?php endif; ?>
	<?php endif; ?>


	<?php comment_form(); ?>

</div>