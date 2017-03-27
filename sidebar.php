<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whalingcityweb
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if( !is_home() || !is_front_page() ){ 

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

<?php

} 