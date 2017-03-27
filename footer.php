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
	<aside class="subfooter">
		<?php dynamic_sidebar( 'subfooter-sidebar' ); ?>	
	</aside>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'whalingcityweb' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'whalingcityweb' ), 'WordPress' ); ?></a>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
