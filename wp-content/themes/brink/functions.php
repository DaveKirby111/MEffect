<?php

/**
 * Kinetic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kinetic
 */

if (!defined('_KIN_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_KIN_VERSION', '2.0.' . filemtime(get_stylesheet_directory() . '/public/mix-manifest.json'));
	$GLOBALS['brink_version'] = _KIN_VERSION;
}

if (!function_exists('kin_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kin_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kinetic, use a find and replace
		 * to change 'kin' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('kin', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary_navigation' => esc_html__('Primary', 'brink'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('kin_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));

		/**
		 * Add Support for Full Width Gutenberg
		 */
		add_theme_support('align-wide');
	}
endif;
add_action('after_setup_theme', 'kin_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kin_content_width()
{
	$GLOBALS['content_width'] = apply_filters('kin_content_width', 640);
}
add_action('after_setup_theme', 'kin_content_width', 0);

/**
 * Set/Update Accepted Mime Types for Upload
 *
 * @param array $mimes
 * @return array
 */
function update_mime_types($mimes)
{

	// New allowed mime types.
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	// Remove Exe files
	unset($mimes['exe']);

	return $mimes;
}
add_filter('upload_mimes', 'update_mime_types');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kin_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'kin'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'kin'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'kin_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function kin_scripts()
{
	// Set from child theme functions files
	$version = _KIN_VERSION;
	wp_enqueue_style('kin-style', get_stylesheet_uri());

	// Font Awesome
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v6.1.2/css/all.css', array(), $version, 'screen');

	// Slick Slider CSS
	wp_enqueue_style('slick-slider', get_template_directory_uri() . '/public/scripts/slick/slick.css', array(), $version, 'screen');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/public/scripts/slick/slick-theme.css', array(), $version, 'screen');

	wp_enqueue_style('kin-screen', get_template_directory_uri() . '/public/styles/screen.css', array(), $version, 'screen');
	wp_enqueue_style('kin-print', get_template_directory_uri() . '/public/styles/print.css', array(), $version, 'print');

	wp_enqueue_script('kin-navigation', get_template_directory_uri() . '/public/scripts/navigation.js', array(), $version, true);

	// JS Includes
	wp_enqueue_script('videoplayer-js', get_template_directory_uri() . '/public/scripts/videoplayer.js', array(), $version, true);
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/public/scripts/slick/slick.min.js', array(), $version, true);
	wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/public/scripts/jquery.hoverIntent.min.js', array(), $version, true);
	wp_enqueue_script('kin-skip-link-focus-fix', get_template_directory_uri() . '/public/scripts/skip-link-focus-fix.js', array(), $version, true);

	wp_enqueue_script('site-js', get_template_directory_uri() . '/public/scripts/site.js', array(), $version, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'kin_scripts');

/**
 * Add Custom Gutenberg Stylesheet
 */
add_theme_support('editor-styles');
add_editor_style(get_template_directory_uri() . '/public/styles/style-editor.css');

/**
 * Implement the Custom functions feature.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the Custom functions feature.
 */
require get_template_directory() . '/inc/acf-custom-blocks.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Require Initial Plugins and Files
 */
/* TGM Plugin activation */
require_once get_stylesheet_directory() . '/init-files/tgm_pa.php';
