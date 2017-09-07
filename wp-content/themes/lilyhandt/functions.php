<?php
/**
 * Lily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lily
 */

if ( ! function_exists( 'lilyhandt_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lilyhandt_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Lily, use a find and replace
		 * to change 'lilyhandt' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lilyhandt', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'lilyhandt' ),
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
		add_theme_support( 'custom-background', apply_filters( 'lilyhandt_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'lilyhandt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lilyhandt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lilyhandt_content_width', 640 );
}
add_action( 'after_setup_theme', 'lilyhandt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lilyhandt_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lilyhandt' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lilyhandt' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lilyhandt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lilyhandt_scripts() {
	wp_enqueue_style( 'lilyhandt-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lilyhandt-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lilyhandt-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lilyhandt_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Allow SVG in WordPress media uploader
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Options framework setup
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/' );
@require_once dirname( __FILE__ ) . '/inc/options-framework/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

function optionsframework_custom_scripts() {
	?><script type="text/javascript">
	jQuery(document).ready(function() {

		<?php // Script goes here ?>

	});
	</script><?php
}
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

// Child header for sub-pages
function get_header_child() {
	include_once get_template_directory() . '/inc/header-child.php';
}

// Primary slider for clinic page (clinic-main-slider.php)
function lily_shortcode_main_slider() {
	include_once get_template_directory() . '/shortcodes/clinic-main-slider.php';
}
add_shortcode( 'main-clinic-slider', 'lily_shortcode_main_slider' );

// Slick slider for clinic page (clinic-before-after-slider.php)
function lily_shortcode_before_after_slider() {
	include_once get_template_directory() . '/shortcodes/clinic-before-after-slider.php';
}
add_shortcode( 'before-after-slider', 'lily_shortcode_before_after_slider' );

// Slick slider for clinic page (clinic-testimonials-slider.php)
function lily_shortcode_clinic_testimonials() {
	include_once get_template_directory() . '/shortcodes/clinic-testimonials-slider.php';
}
add_shortcode( 'testimonials-slider', 'lily_shortcode_clinic_testimonials' );

// Add star rating shortcode
function lily_shortcode_star_rating( $atts ) {
	$atts = shortcode_atts(
		array(
			'rating' => 0
		), $atts, 'star-rating'
	);
	$vipExperienceRating = $atts['rating'];
	include_once get_template_directory() . '/shortcodes/star-rating-calculator.php';
}
add_shortcode( 'star-rating', 'lily_shortcode_star_rating' );

// Global social icons
function lily_shortcode_social_icons() {
	ob_start();
	include_once get_template_directory() . '/shortcodes/global-social-icons.php';
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode( 'lily-social-icons', 'lily_shortcode_social_icons' );

// Register posttype for sliders
function create_posttype() {
	// Slider Posttype
	register_post_type( 'Slider',
		array(
			'labels' => array(
				'name' => __( 'Slider' ),
				'singular_name' => __( 'Slide' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Slide' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Slide' ),
				'new_item' => __( 'New Slide' ),
				'view' => __( 'View Slide' ),
				'view_item' => __( 'View Slide' ),
				'search_items' => __( 'Search Slide' ),
				'not_found' => __( 'No Slides found.' ),
				'not_found_in_trash' => __( 'No Slides found in Trash' ),
				'parent' => __( 'Parent Slide' ),
	    	),
			'taxonomies' => array('slide-type'),
			'public' => true,
			'has_archive' => false,
			//'rewrite' => array( 'slug' => 'snippets/%category%', 'with_front' => false ),
			'query_var' => true,
			'supports' => array('title', 'thumbnail'),
			'slug' => 'slider',
			'with_front' => false
		)
	);

	$labels = array(
		'name' => _x( 'Slider Type', 'taxonomy general name' ),
		'singular_name' => _x( 'Slide', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Sliders Type' ),
		'popular_items' => __( 'Popular Sliders Type' ),
		'all_items' => __( 'All Sliders Type' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Slider Type' ), 
		'update_item' => __( 'Update Slider Type' ),
		'add_new_item' => __( 'Add New Slider Type' ),
		'new_item_name' => __( 'New Slider Type' ),
		'separate_items_with_commas' => __( 'Separate slider types with commas' ),
		'add_or_remove_items' => __( 'Add or remove slider type' ),
		'choose_from_most_used' => __( 'Choose from the most used slider type' ),
		'menu_name' => __( 'Slider Type' ),
	);

	register_taxonomy( 'slide-type', array('slider'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'slide-type' ),
	));

	// Testimonials Posttype
	register_post_type( 'Testimonials',
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Testimonial' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Testimonial' ),
				'new_item' => __( 'New Testimonial' ),
				'view' => __( 'View Testimonial' ),
				'view_item' => __( 'View Testimonial' ),
				'search_items' => __( 'Search Testimonial' ),
				'not_found' => __( 'No Testimonials found.' ),
				'not_found_in_trash' => __( 'No Testimonials found in Trash' ),
				'parent' => __( 'Parent Testimonial' ),
	    	),
			'taxonomies' => array(''),
			'public' => true,
			'has_archive' => false,
			//'rewrite' => array( 'slug' => 'snippets/%category%', 'with_front' => false ),
			'query_var' => true,
			'supports' => array('title', 'editor'),
			'slug' => 'testimonial',
			'with_front' => false
		)
	);
}
add_action( 'init', 'create_posttype' );

// HOME URL SHORTCODE
function lily_url_shortcode() {
	return get_bloginfo('url');
}
add_shortcode('home-url','lily_url_shortcode');