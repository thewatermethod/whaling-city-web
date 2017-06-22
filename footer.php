<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whalingcityweb
 */

?>

	</div><!-- #content -->
</div><!-- #page -->
	
	<?php get_sidebar(); ?>

	<aside class="subfooter">

		<?php dynamic_sidebar( 'subfooter-sidebar' ); ?>	
		<?php echo whaling_city_web_contact_us_form(); ?>		

		<ul class="brands">
			<li><i class="fa fa-html5" aria-hidden="true"></i></li>
			<li><i class="fa fa-wordpress" aria-hidden="true"></i></li>
			<li><i class="fa fa-apple" aria-hidden="true"></i></li>
			<li><i class="fa fa-chrome" aria-hidden="true"></i></li>
			<li><i class="fa fa-internet-explorer" aria-hidden="true"></i></li>
		</ul>

	</aside>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'whalingcityweb' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'whalingcityweb' ), 'WordPress' ); ?></a>	
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	

<?php wp_footer(); ?>

</body>
</html>
