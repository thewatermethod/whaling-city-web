<?php
/**
 * whalingcityweb functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package whalingcityweb
 */

if ( ! function_exists( 'whalingcityweb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function whalingcityweb_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on whalingcityweb, use a find and replace
	 * to change 'whalingcityweb' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'whalingcityweb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'whalingcityweb' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'whalingcityweb_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'whalingcityweb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function whalingcityweb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'whalingcityweb_content_width', 640 );
}
add_action( 'after_setup_theme', 'whalingcityweb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whalingcityweb_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Posts and Pages Below Content', 'whalingcityweb' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'whalingcityweb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Below Main Content', 'whalingcityweb' ),
		'id'            => 'home-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'whalingcityweb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Subfooter Content', 'whalingcityweb' ),
		'id'            => 'subfooter-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'whalingcityweb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'whalingcityweb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function whalingcityweb_scripts() {

	wp_enqueue_style( 'whalingcityweb-fonts', '//fonts.googleapis.com/css?family=Droid+Serif|Roboto' );
	wp_enqueue_style( 'whalingcityweb-style', get_stylesheet_uri() );
	wp_enqueue_script( 'fontawesome', '//use.fontawesome.com/6dfe1e61b6.js', array(), '20151215', true );
	wp_enqueue_script( 'whalingcityweb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'whalingcityweb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	//load jquery in the footer
	wp_enqueue_script( 'jquery', includes_url('js/jquery/jquery.js'), array(), '1.12.4', true );

	// this handles the contact us form
	wp_enqueue_script( 'whalingcityweb-contact', get_template_directory_uri() . '/js/contact-us.js', array(), '20151215', true);
    wp_localize_script( 'whalingcityweb-contact', 'ajax', array( 'url' => admin_url('admin-ajax.php') ) );
}

add_action( 'wp_enqueue_scripts', 'whalingcityweb_scripts' );

/**
 * Remove jquery
 **/

function whaling_city_change_default_jquery( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');       
    }


}

add_filter( 'wp_default_scripts', 'whaling_city_change_default_jquery' );

/**
 * Disable emojis.
 */

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}

add_action( 'init', 'disable_emojis' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
  * SVG/Security stuff
  */
require get_template_directory() . '/inc/misc.php';

/**
 * Contact us form
 */
require get_template_directory() . '/inc/contact-us.php';