<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whalingcityweb
 */

// ACF b3JkZXJfaWQ9NzkzMjh8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE2LTA0LTExIDE3OjIyOjAy

get_header(); ?>


	<?php  ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

			
		if ( have_posts() ) :?>

			<h2 class="work-title">Learn more about the businesses that we have helped to succeed online.</h2>

			<div class="recent-work">
				
				<?php

				$query = new WP_Query( array('category_name'=>'work', 'posts_per_page' => '3') );
				/* Start the Loop */
				while ( $query->have_posts() ) : $query->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'work' );

				endwhile;

			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php


get_footer();
