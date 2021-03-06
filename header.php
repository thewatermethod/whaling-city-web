<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whalingcityweb
 */


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whalingcityweb' ); ?></a>

	<?php 

		$facebook = get_theme_mod('facebook'); 		
		$phone_number = get_theme_mod('phone_number');
		$contact_us_link = get_theme_mod('contact_link');

	?>

	<div class="top-nav">
		<ul>			
			<li><a href="<?php echo $facebook; ?>" aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri();?>/img/facebook.svg"></a></li>			
			<li><a href="<?php echo $phone_number; ?>" aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri();?>/img/phone.svg"></a></li>
			<li><a href="<?php echo $contact_us_link?>" aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri();?>/img/message-circle.svg"></a></li>
		</ul>		
	</div>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding" 
			<?php if( is_home() || is_front_page() || !is_single() ) :?>

				<?php if ( get_header_image() ) : ?>
					style="background-image: url(<?php header_image(); ?>);"
				<?php endif; // End header image check. ?>

			<?php else: ?>	
				<?php if ( get_the_post_thumbnail() ) : ?>
					style="background-image: url(<?php the_post_thumbnail_url(); ?>);"
				<?php else: ?>
					style="background-image: url(<?php header_image(); ?>);"
				<?php endif; // End header image check. ?>	

			<?php endif; ?>>
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="nav-left-icon burger-menu-btn"><span></span></div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

			<?php
			if ( is_front_page() && is_home() ) : 

				$home_page_message = get_theme_mod('home_page_message');
				
				$callout_msg = get_theme_mod('contact_callout');

				if($callout_msg == ''){
					$callout_msg = 'Contact Us Today';
				}

				if( $home_page_message != ''):?>
					<div class="home-page-message">
						<p><?php echo $home_page_message; ?></p>
						<a href="<?php echo $contact_us_link; ?>"><?php echo $callout_msg; ?></a>
					</div>
				<?php endif; ?>
			<?php
			endif;?>
		</div><!-- .site-branding -->


	</header><!-- #masthead -->

	<div id="content" class="site-content">
