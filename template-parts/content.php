<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whalingcityweb
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<?php
		if ( is_single() ) :
			?><header class="entry-header single"><?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			?><header class="entry-header archive"><?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'whalingcityweb' ), array( 'span' => array( 'class' => array('') ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'whalingcityweb' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
