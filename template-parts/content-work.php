<?php
/**
 * Template part for displaying work examples on home page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whalingcityweb
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('recent_work_item'); ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	</article><!-- #post-## -->
