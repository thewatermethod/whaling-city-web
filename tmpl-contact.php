<?php // Template Name: Contact Form Page ?>
<?php
/**
 * The template for displaying contact form page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whalingcityweb
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		
			echo whaling_city_web_contact_us_form(); 
			?>			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
