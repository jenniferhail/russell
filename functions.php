<?php
/**
 * Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions including
 * custom template tags, actions and filter hooks to change core functionality.
 *
 *
 * @package Russell
 */

/* OEMBED SIZING
 ========================== */

if ( ! isset( $content_width ) ) :
	$content_width = 600;
endif;

/* THEME SETUP
 ========================== */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override starter_theme_setup() in a child theme,
 * add your own starter_theme_setup to your child theme's functions.php file.
 */
if ( ! function_exists( 'starter_theme_setup' ) ):
	function starter_theme_setup() {

		// Make theme available for translation.
		// Translations can be filed in the /languages/ directory.
		load_theme_textdomain( 'starter-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add custom nav menu support
		register_nav_menu( 'primary', __( 'Primary Menu', 'starter-theme' ) );

		// Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(300, 300, true);
		add_image_size( 'portfolio-thumbnail', 300, 300, true ); // Permalink thumbnail size

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array(
				'comment-list',
				'search-form',
				'comment-form',
				'gallery',
			) );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link'
			) );

		// Enable support for editable menus via Appearance > Menus
		register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'starter-theme' ),
			) );

		// Add custom image sizes
		// add_image_size( 'name', 500, 300 );
	}
endif; // starter_theme_setup
add_action( 'after_setup_theme', 'starter_theme_setup' );

/* CUSTOM MENUS
=========================== */
add_action( 'init', 'my_register_menus' );

function my_register_menus() {
	register_nav_menu( 'social-media', __( 'Social Media', 'nav menu location', 'starter-theme' ) );
}

/* SIDEBARS & WIDGET AREAS
 ========================== */
function starter_theme_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Sidebar', 'starter-theme' ),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

	register_sidebar( array(
			'name' => __( 'Footer Sidebar Left', 'starter-theme' ),
			'id' => 'sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	register_sidebar( array(
			'name' => __( 'Footer Sidebar Right', 'starter-theme' ),
			'id' => 'sidebar-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

}
add_action( 'widgets_init', 'starter_theme_widgets_init' );


/* ENQUEUE SCRIPTS
 ========================== */
function starter_theme_scripts_method() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		'theme',
		get_template_directory_uri() . '/assets/theme.js',
		array( 'jquery' )
	);

	if ( is_page_template( 'page-portfolio-test.php' ) || is_page_template( 'page-portfolio.php' ) ) :
	wp_enqueue_script(
		'easing',
		get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'quicksand',
		get_template_directory_uri() . '/assets/js/jquery.quicksand.js',
		array( 'easing' )
	);
	wp_enqueue_script(
		'portfolio',
		get_template_directory_uri() . '/assets/js/jquery.portfolio.js',
		array( 'quicksand' )
	);
	endif;
	wp_enqueue_script(
		'bxslider',
		get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js',
		array( 'jquery' )
	);
	wp_enqueue_style( 'bxslider-style', get_template_directory_uri() . '/assets/vendor/jquery.bxslider.css' );

}

add_action( 'wp_enqueue_scripts', 'starter_theme_scripts_method' );


/* MISC EXTRAS
=========================== */

// Comments & pingbacks display template
include 'inc/functions/comments.php';

// Remove admin bar for all users
show_admin_bar( false );

/**
 * Add TinyMCE buttons that are disabled by default to 2nd row
 */
//function starter_theme_mce_buttons($buttons) {
// $buttons[] = 'justify'; // fully justify text
// $buttons[] = 'hr'; // insert HR
//
// return $buttons;
//}
//add_filter('mce_buttons_2', 'starter_theme_mce_buttons');

/**
 * Remove from TinyMCE all colors except those specified
 */
//function starter_theme_change_mce_colors( $init ) {
// $init['theme_advanced_text_colors'] = '8dc63f';
// $init['theme_advanced_more_colors'] = false;
//return $init;
//}
//add_filter('tiny_mce_before_init', 'starter_theme_change_mce_colors');

/**
 * Taxonomies for the Portfolio
 */
// hook into the init action and call create_portfolio_taxonomies when it fires
add_action( 'init', 'starter_theme_portfolio_taxonomies', 0 );

// create two taxonomies, illustration and design for the post type "portfolio"
function starter_theme_portfolio_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Portfolio Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Portfolio Categories' ),
		'all_items'         => __( 'All Portfolio Categories' ),
		'parent_item'       => __( 'Parent Portfolio Category' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:' ),
		'edit_item'         => __( 'Edit Portfolio Category' ),
		'update_item'       => __( 'Update Portfolio Category' ),
		'add_new_item'      => __( 'Add New Portfolio Category' ),
		'new_item_name'     => __( 'New Portfolio Category Name' ),
		'menu_name'         => __( 'Portfolio Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio-category' ),
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

}

// Create a list of taxonomy slugs
function custom_taxonomy_terms_slugs( $taxonomy ) {
	$terms = get_the_terms( $post->ID, $taxonomy );

	if ( $terms && ! is_wp_error( $terms ) ) :

		$term_slugs = array();

	foreach ( $terms as $term ) {
		$term_slugs[] = $term->slug;
	}

	$termslugs = join( " ", $term_slugs );

	return $termslugs;
	endif;
}

?>
