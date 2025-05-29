<?php
    $getAllCats = wp_get_post_categories($post->ID);
?>

	<article data-catslug-post="<?php echo implode(' ', $getAllCats) ?>" id="post-<?php the_ID();?>" <?php post_class("post-set standart-post"); ?>>
		<div class="content-block">
			<h5 class="title">
				<a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo esc_html(get_the_title()); ?></a>
			</h5>
			<p><?php the_excerpt(); ?></p>
			<a href="<?php the_permalink() ?>" class="btn btn-gray btn-xs"><?php esc_html_e('Read More','andaman') ?></a>
		</div>      
    <div class="clear"></div>
</article>


