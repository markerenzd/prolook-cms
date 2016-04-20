<?php
/**
 * Prolook functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Prolook
 */

if ( ! function_exists( 'prolook_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function prolook_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Prolook, use a find and replace
	 * to change 'prolook' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'prolook', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'prolook' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'prolook_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'prolook_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function prolook_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'prolook_content_width', 640 );
}
add_action( 'after_setup_theme', 'prolook_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prolook_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'prolook' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sports Footer', 'prolook' ),
		'id'            => 'sports-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget large-4 medium-4 columns">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Quick Links Footer', 'prolook' ),
		'id'            => 'quicklinks-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget large-4 medium-4 columns">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Social Media Footer', 'prolook' ),
		'id'            => 'social-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="social-media-icon">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'prolook_widgets_init' );


// Register Custom Post Type
function baseball() {

	$labels = array(
		'name'                  => _x( 'Baseball', 'Post Type General Name', 'baseball' ),
		'singular_name'         => _x( 'Baseball', 'Post Type Singular Name', 'baseball' ),
		'menu_name'             => __( 'Baseball', 'baseball' ),
		'name_admin_bar'        => __( 'Baseball', 'baseball' ),
		'archives'              => __( 'Item Archives', 'baseball' ),
		'parent_item_colon'     => __( 'Parent Item:', 'baseball' ),
		'all_items'             => __( 'All Items', 'baseball' ),
		'add_new_item'          => __( 'Add New Item', 'baseball' ),
		'add_new'               => __( 'Add New', 'baseball' ),
		'new_item'              => __( 'New Item', 'baseball' ),
		'edit_item'             => __( 'Edit Item', 'baseball' ),
		'update_item'           => __( 'Update Item', 'baseball' ),
		'view_item'             => __( 'View Item', 'baseball' ),
		'search_items'          => __( 'Search Item', 'baseball' ),
		'not_found'             => __( 'Not found', 'baseball' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'baseball' ),
		'featured_image'        => __( 'Featured Image', 'baseball' ),
		'set_featured_image'    => __( 'Set featured image', 'baseball' ),
		'remove_featured_image' => __( 'Remove featured image', 'baseball' ),
		'use_featured_image'    => __( 'Use as featured image', 'baseball' ),
		'insert_into_item'      => __( 'Insert into item', 'baseball' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'baseball' ),
		'items_list'            => __( 'Items list', 'baseball' ),
		'items_list_navigation' => __( 'Items list navigation', 'baseball' ),
		'filter_items_list'     => __( 'Filter items list', 'baseball' ),
	);
	$args = array(
		'label'                 => __( 'Baseball', 'baseball' ),
		'description'           => __( 'Post Type Description', 'baseball' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'baseball_uniform', $args );

}
add_action( 'init', 'baseball', 0 );

// Register Custom Post Type
function catalog_custom() {

	$labels = array(
		'name'                  => _x( 'Catalogs', 'Post Type General Name', 'catalog' ),
		'singular_name'         => _x( 'Catalog', 'Post Type Singular Name', 'catalog' ),
		'menu_name'             => __( 'Catalogs', 'catalog' ),
		'name_admin_bar'        => __( 'Catalogs', 'catalog' ),
		'archives'              => __( 'Item Archives', 'catalog' ),
		'parent_item_colon'     => __( 'Parent Item:', 'catalog' ),
		'all_items'             => __( 'All Items', 'catalog' ),
		'add_new_item'          => __( 'Add New Item', 'catalog' ),
		'add_new'               => __( 'Add New', 'catalog' ),
		'new_item'              => __( 'New Item', 'catalog' ),
		'edit_item'             => __( 'Edit Item', 'catalog' ),
		'update_item'           => __( 'Update Item', 'catalog' ),
		'view_item'             => __( 'View Item', 'catalog' ),
		'search_items'          => __( 'Search Item', 'catalog' ),
		'not_found'             => __( 'Not found', 'catalog' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'catalog' ),
		'featured_image'        => __( 'Featured Image', 'catalog' ),
		'set_featured_image'    => __( 'Set featured image', 'catalog' ),
		'remove_featured_image' => __( 'Remove featured image', 'catalog' ),
		'use_featured_image'    => __( 'Use as featured image', 'catalog' ),
		'insert_into_item'      => __( 'Insert into item', 'catalog' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'catalog' ),
		'items_list'            => __( 'Items list', 'catalog' ),
		'items_list_navigation' => __( 'Items list navigation', 'catalog' ),
		'filter_items_list'     => __( 'Filter items list', 'catalog' ),
	);
	$args = array(
		'label'                 => __( 'Catalog', 'catalog' ),
		'description'           => __( 'Post Type Description', 'catalog' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'catalog', $args );

}
add_action( 'init', 'catalog_custom', 0 );

// Register Custom Post Type
function softball() {

	$labels = array(
		'name'                  => _x( 'Softball', 'Post Type General Name', 'softball_uniform' ),
		'singular_name'         => _x( 'Softball', 'Post Type Singular Name', 'softball_uniform' ),
		'menu_name'             => __( 'Softball', 'softball_uniform' ),
		'name_admin_bar'        => __( 'Softball', 'softball_uniform' ),
		'archives'              => __( 'Item Archives', 'softball_uniform' ),
		'parent_item_colon'     => __( 'Parent Item:', 'softball_uniform' ),
		'all_items'             => __( 'All Items', 'softball_uniform' ),
		'add_new_item'          => __( 'Add New Item', 'softball_uniform' ),
		'add_new'               => __( 'Add New', 'softball_uniform' ),
		'new_item'              => __( 'New Item', 'softball_uniform' ),
		'edit_item'             => __( 'Edit Item', 'softball_uniform' ),
		'update_item'           => __( 'Update Item', 'softball_uniform' ),
		'view_item'             => __( 'View Item', 'softball_uniform' ),
		'search_items'          => __( 'Search Item', 'softball_uniform' ),
		'not_found'             => __( 'Not found', 'softball_uniform' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'softball_uniform' ),
		'featured_image'        => __( 'Featured Image', 'softball_uniform' ),
		'set_featured_image'    => __( 'Set featured image', 'softball_uniform' ),
		'remove_featured_image' => __( 'Remove featured image', 'softball_uniform' ),
		'use_featured_image'    => __( 'Use as featured image', 'softball_uniform' ),
		'insert_into_item'      => __( 'Insert into item', 'softball_uniform' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'softball_uniform' ),
		'items_list'            => __( 'Items list', 'softball_uniform' ),
		'items_list_navigation' => __( 'Items list navigation', 'softball_uniform' ),
		'filter_items_list'     => __( 'Filter items list', 'softball_uniform' ),
	);
	$args = array(
		'label'                 => __( 'Softball', 'softball_uniform' ),
		'description'           => __( 'Post Type Description', 'softball_uniform' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'softball_uninform', $args );

}
add_action( 'init', 'softball', 0 );

function featured_sports() {

	$labels = array(
		'name'                  => _x( 'Sports', 'Post Type General Name', 'featured' ),
		'singular_name'         => _x( 'Sport', 'Post Type Singular Name', 'featured' ),
		'menu_name'             => __( 'Sports', 'featured' ),
		'name_admin_bar'        => __( 'Sports', 'featured' ),
		'archives'              => __( 'Item Archives', 'featured' ),
		'parent_item_colon'     => __( 'Parent Item:', 'featured' ),
		'all_items'             => __( 'All Items', 'featured' ),
		'add_new_item'          => __( 'Add New Item', 'featured' ),
		'add_new'               => __( 'Add New Sports', 'featured' ),
		'new_item'              => __( 'New Sports', 'featured' ),
		'edit_item'             => __( 'Edit Item', 'featured' ),
		'update_item'           => __( 'Update Item', 'featured' ),
		'view_item'             => __( 'View Item', 'featured' ),
		'search_items'          => __( 'Search Item', 'featured' ),
		'not_found'             => __( 'Not found', 'featured' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'featured' ),
		'featured_image'        => __( 'Featured Image', 'featured' ),
		'set_featured_image'    => __( 'Set featured image', 'featured' ),
		'remove_featured_image' => __( 'Remove featured image', 'featured' ),
		'use_featured_image'    => __( 'Use as featured image', 'featured' ),
		'insert_into_item'      => __( 'Insert into item', 'featured' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'featured' ),
		'items_list'            => __( 'Items list', 'featured' ),
		'items_list_navigation' => __( 'Items list navigation', 'featured' ),
		'filter_items_list'     => __( 'Filter items list', 'featured' ),
	);
	$args = array(
		'label'                 => __( 'Sport', 'featured' ),
		'description'           => __( 'Post Type Description', 'featured' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'featured', $args );

}
add_action( 'init', 'featured_sports', 0 );



function football_post() {

	$labels = array(
		'name'                  => _x( 'Football', 'Post Type General Name', 'football' ),
		'singular_name'         => _x( 'Football', 'Post Type Singular Name', 'football' ),
		'menu_name'             => __( 'FootBall', 'football' ),
		'name_admin_bar'        => __( 'FootBall', 'football' ),
		'archives'              => __( 'Item Archives', 'footballs' ),
		'parent_item_colon'     => __( 'Parent Item:', 'football' ),
		'all_items'             => __( 'All Items', 'football' ),
		'add_new_item'          => __( 'Add New Item', 'football' ),
		'add_new'               => __( 'Add New', 'football' ),
		'new_item'              => __( 'New Item', 'football' ),
		'edit_item'             => __( 'Edit Item', 'football' ),
		'update_item'           => __( 'Update Item', 'football' ),
		'view_item'             => __( 'View Item', 'football' ),
		'search_items'          => __( 'Search Item', 'football' ),
		'not_found'             => __( 'Not found', 'football' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'football' ),
		'featured_image'        => __( 'Featured Image', 'football' ),
		'set_featured_image'    => __( 'Set featured image', 'football' ),
		'remove_featured_image' => __( 'Remove featured image', 'football' ),
		'use_featured_image'    => __( 'Use as featured image', 'football' ),
		'insert_into_item'      => __( 'Insert into item', 'football' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'football' ),
		'items_list'            => __( 'Items list', 'football' ),
		'items_list_navigation' => __( 'Items list navigation', 'football' ),
		'filter_items_list'     => __( 'Filter items list', 'football' ),
	);
	$args = array(
		'label'                 => __( 'Football', 'football' ),
		'description'           => __( 'Post Type Description', 'football' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'football_uniform', $args );

}
add_action( 'init', 'football_post', 0 );

// Register Custom Post Type
function basketball_uniform() {

	$labels = array(
		'name'                  => _x( 'Basketball', 'Post Type General Name', 'basketball_uniform' ),
		'singular_name'         => _x( 'Basketball', 'Post Type Singular Name', 'basketball_uniform' ),
		'menu_name'             => __( 'Basketball', 'basketball_uniform' ),
		'name_admin_bar'        => __( 'Basketball', 'basketball_uniform' ),
		'archives'              => __( 'Item Archives', 'basketball_uniform' ),
		'parent_item_colon'     => __( 'Parent Item:', 'basketball_uniform' ),
		'all_items'             => __( 'All Items', 'basketball_uniform' ),
		'add_new_item'          => __( 'Add New Item', 'basketball_uniform' ),
		'add_new'               => __( 'Add New', 'basketball_uniform' ),
		'new_item'              => __( 'New Item', 'basketball_uniform' ),
		'edit_item'             => __( 'Edit Item', 'basketball_uniform' ),
		'update_item'           => __( 'Update Item', 'basketball_uniform' ),
		'view_item'             => __( 'View Item', 'basketball_uniform' ),
		'search_items'          => __( 'Search Item', 'basketball_uniform' ),
		'not_found'             => __( 'Not found', 'basketball_uniform' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'basketball_uniform' ),
		'featured_image'        => __( 'Featured Image', 'basketball_uniform' ),
		'set_featured_image'    => __( 'Set featured image', 'basketball_uniform' ),
		'remove_featured_image' => __( 'Remove featured image', 'basketball_uniform' ),
		'use_featured_image'    => __( 'Use as featured image', 'basketball_uniform' ),
		'insert_into_item'      => __( 'Insert into item', 'basketball_uniform' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'basketball_uniform' ),
		'items_list'            => __( 'Items list', 'basketball_uniform' ),
		'items_list_navigation' => __( 'Items list navigation', 'basketball_uniform' ),
		'filter_items_list'     => __( 'Filter items list', 'basketball_uniform' ),
	);
	$args = array(
		'label'                 => __( 'Basketball', 'basketball_uniform' ),
		'description'           => __( 'Post Type Description', 'basketball_uniform' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'basketball_uniform', $args );

}
add_action( 'init', 'basketball_uniform', 0 );

// Register Custom Post Type
function soccer_uniform() {

	$labels = array(
		'name'                  => _x( 'Soccer', 'Post Type General Name', 'soccer_uniform' ),
		'singular_name'         => _x( 'Soccer', 'Post Type Singular Name', 'soccer_uniform' ),
		'menu_name'             => __( 'Soccer', 'soccer_uniform' ),
		'name_admin_bar'        => __( 'Soccer', 'soccer_uniform' ),
		'archives'              => __( 'Item Archives', 'soccer_uniform' ),
		'parent_item_colon'     => __( 'Parent Item:', 'soccer_uniform' ),
		'all_items'             => __( 'All Items', 'soccer_uniform' ),
		'add_new_item'          => __( 'Add New Item', 'soccer_uniform' ),
		'add_new'               => __( 'Add New', 'soccer_uniform' ),
		'new_item'              => __( 'New Item', 'soccer_uniform' ),
		'edit_item'             => __( 'Edit Item', 'soccer_uniform' ),
		'update_item'           => __( 'Update Item', 'soccer_uniform' ),
		'view_item'             => __( 'View Item', 'soccer_uniform' ),
		'search_items'          => __( 'Search Item', 'soccer_uniform' ),
		'not_found'             => __( 'Not found', 'soccer_uniform' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'soccer_uniform' ),
		'featured_image'        => __( 'Featured Image', 'soccer_uniform' ),
		'set_featured_image'    => __( 'Set featured image', 'soccer_uniform' ),
		'remove_featured_image' => __( 'Remove featured image', 'soccer_uniform' ),
		'use_featured_image'    => __( 'Use as featured image', 'soccer_uniform' ),
		'insert_into_item'      => __( 'Insert into item', 'soccer_uniform' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'soccer_uniform' ),
		'items_list'            => __( 'Items list', 'soccer_uniform' ),
		'items_list_navigation' => __( 'Items list navigation', 'soccer_uniform' ),
		'filter_items_list'     => __( 'Filter items list', 'soccer_uniform' ),
	);
	$args = array(
		'label'                 => __( 'Soccer', 'soccer_uniform' ),
		'description'           => __( 'Post Type Description', 'soccer_uniform' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'soccer_uniform', $args );

}
add_action( 'init', 'soccer_uniform', 0 );

// Register Custom Post Type
function hockey_uniform() {

	$labels = array(
		'name'                  => _x( 'Hockey', 'Post Type General Name', 'hockey_uniform' ),
		'singular_name'         => _x( 'Hockey', 'Post Type Singular Name', 'hockey_uniform' ),
		'menu_name'             => __( 'Hockey', 'hockey_uniform' ),
		'name_admin_bar'        => __( 'Hockey', 'hockey_uniform' ),
		'archives'              => __( 'Item Archives', 'hockey_uniform' ),
		'parent_item_colon'     => __( 'Parent Item:', 'hockey_uniform' ),
		'all_items'             => __( 'All Items', 'hockey_uniform' ),
		'add_new_item'          => __( 'Add New Item', 'hockey_uniform' ),
		'add_new'               => __( 'Add New', 'hockey_uniform' ),
		'new_item'              => __( 'New Item', 'hockey_uniform' ),
		'edit_item'             => __( 'Edit Item', 'hockey_uniform' ),
		'update_item'           => __( 'Update Item', 'hockey_uniform' ),
		'view_item'             => __( 'View Item', 'hockey_uniform' ),
		'search_items'          => __( 'Search Item', 'hockey_uniform' ),
		'not_found'             => __( 'Not found', 'hockey_uniform' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hockey_uniform' ),
		'featured_image'        => __( 'Featured Image', 'hockey_uniform' ),
		'set_featured_image'    => __( 'Set featured image', 'hockey_uniform' ),
		'remove_featured_image' => __( 'Remove featured image', 'hockey_uniform' ),
		'use_featured_image'    => __( 'Use as featured image', 'hockey_uniform' ),
		'insert_into_item'      => __( 'Insert into item', 'hockey_uniform' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'hockey_uniform' ),
		'items_list'            => __( 'Items list', 'hockey_uniform' ),
		'items_list_navigation' => __( 'Items list navigation', 'hockey_uniform' ),
		'filter_items_list'     => __( 'Filter items list', 'hockey_uniform' ),
	);
	$args = array(
		'label'                 => __( 'Hockey', 'hockey_uniform' ),
		'description'           => __( 'Post Type Description', 'hockey_uniform' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'hockey_uniform', $args );

}
add_action( 'init', 'hockey_uniform', 0 );

// Register Custom Post Type
function lacrosse_uniform() {

	$labels = array(
		'name'                  => _x( 'Lacross', 'Post Type General Name', 'lacrosse_uniform' ),
		'singular_name'         => _x( 'Lacross', 'Post Type Singular Name', 'lacrosse_uniform' ),
		'menu_name'             => __( 'Lacross', 'lacrosse_uniform' ),
		'name_admin_bar'        => __( 'Lacross', 'lacrosse_uniform' ),
		'archives'              => __( 'Item Archives', 'lacrosse_uniform' ),
		'parent_item_colon'     => __( 'Parent Item:', 'lacrosse_uniform' ),
		'all_items'             => __( 'All Items', 'lacrosse_uniform' ),
		'add_new_item'          => __( 'Add New Item', 'lacrosse_uniform' ),
		'add_new'               => __( 'Add New', 'lacrosse_uniform' ),
		'new_item'              => __( 'New Item', 'lacrosse_uniform' ),
		'edit_item'             => __( 'Edit Item', 'lacrosse_uniform' ),
		'update_item'           => __( 'Update Item', 'lacrosse_uniform' ),
		'view_item'             => __( 'View Item', 'lacrosse_uniform' ),
		'search_items'          => __( 'Search Item', 'lacrosse_uniform' ),
		'not_found'             => __( 'Not found', 'lacrosse_uniform' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lacrosse_uniform' ),
		'featured_image'        => __( 'Featured Image', 'lacrosse_uniform' ),
		'set_featured_image'    => __( 'Set featured image', 'lacrosse_uniform' ),
		'remove_featured_image' => __( 'Remove featured image', 'lacrosse_uniform' ),
		'use_featured_image'    => __( 'Use as featured image', 'lacrosse_uniform' ),
		'insert_into_item'      => __( 'Insert into item', 'lacrosse_uniform' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lacrosse_uniform' ),
		'items_list'            => __( 'Items list', 'lacrosse_uniform' ),
		'items_list_navigation' => __( 'Items list navigation', 'lacrosse_uniform' ),
		'filter_items_list'     => __( 'Filter items list', 'lacrosse_uniform' ),
	);
	$args = array(
		'label'                 => __( 'Lacross', 'lacrosse_uniform' ),
		'description'           => __( 'Post Type Description', 'lacrosse_uniform' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'lacrosse_uniform', $args );

}
add_action( 'init', 'lacrosse_uniform', 0 );


// Register Custom Taxonomy
function gender_sub() {

	$labels = array(
		'name'                       => _x( 'Gender', 'Taxonomy General Name', 'gender_sub' ),
		'singular_name'              => _x( 'Gender', 'Taxonomy Singular Name', 'gender_sub' ),
		'menu_name'                  => __( 'Gender', 'gender_sub' ),
		'all_items'                  => __( 'All Items', 'gender_sub' ),
		'parent_item'                => __( 'Parent Item', 'gender_sub' ),
		'parent_item_colon'          => __( 'Parent Item:', 'gender_sub' ),
		'new_item_name'              => __( 'New Item Name', 'gender_sub' ),
		'add_new_item'               => __( 'Add New Item', 'gender_sub' ),
		'edit_item'                  => __( 'Edit Item', 'gender_sub' ),
		'update_item'                => __( 'Update Item', 'gender_sub' ),
		'view_item'                  => __( 'View Item', 'gender_sub' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'gender_sub' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'gender_sub' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'gender_sub' ),
		'popular_items'              => __( 'Popular Items', 'gender_sub' ),
		'search_items'               => __( 'Search Items', 'gender_sub' ),
		'not_found'                  => __( 'Not Found', 'gender_sub' ),
		'no_terms'                   => __( 'No items', 'gender_sub' ),
		'items_list'                 => __( 'Items list', 'gender_sub' ),
		'items_list_navigation'      => __( 'Items list navigation', 'gender_sub' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	
	register_taxonomy( 'gender_uniform', 
		array( 
			'baseball_uniform', 
			'softball_uninform', 
			'basketball_uniform', 
			'soccer_uniform',
			'hockey_uniform',
			'lacrosse_uniform',
			'football_uniform'
			 ), 
				$args 
		);
}
add_action( 'init', 'gender_sub', 0 );


function is_mobile(){
	$detect = new Mobile_Detect;
	$result = false; 

	if ($detect->isMobile() && !$detect->isTablet()) :
   		$result = true;
	endif;
	return $result;
	
}

function is_tablet(){
	$detect = new Mobile_Detect;
	$result = false;
	
	if ( $detect->isTablet() ):
		$result = true;
	endif;
	return $result;
}

function version_scripts() {

	// enqueue scripts and styles for mobile
	$detect = new Mobile_Detect;
	$result = false;
	if ( $detect->isMobile() && !$detect->isTablet() ) { 
			wp_register_style( 'mobile', get_template_directory_uri() . '/css/mobile.css', array(), '1', 'all' );
			wp_enqueue_style( 'mobile' );
		} elseif ( $detect->isTablet()) {
		    wp_register_style( 'tablet', get_template_directory_uri() . '/css/tablet.css', array(), '1', 'all' );
			wp_enqueue_style( 'tablet' );
			$result = true;
		}
		 else {
		 	wp_enqueue_style( 'prolook-style', get_stylesheet_uri() );

			wp_register_style( 'responsive.css', get_template_directory_uri() . '/css/responsive.css', array(), '1', 'all' );
			wp_enqueue_style( 'responsive.css' );
		}

		return $result;
}
add_action( 'wp_enqueue_scripts', 'version_scripts' );

// Custom Scripting to Move JavaScript from the Head to the Footer

function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

// END Custom Scripting to Move JavaScript

function prefix_load_cat_posts () {

	$cat_id = $_POST[ 'cat' ];
    	$args = array (
	        'post_type'		 		=> 'football_uniform',	
	        'cat' 			 		=> $cat_id,
	        'posts_per_page' 		=> -1,
	        'order' 				=> 'DESC',

		);
   		 
   		 $posts = get_posts( $args );
  		 ob_start ();

   		foreach ( $posts as $post ) : setup_postdata( $post ); ?>
			<?php $thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
				<div class="column">
					<div class="uniform-wrapper">
						<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
						<h2><?php echo $post->post_title ; ?></h2>
						<p><?php echo get_the_content(); ?></p>	
							<?php printf("<a href='http://alpha.qstrike.com/builder/0/%s'>GO BUILD</a>",$item_id); ?>
					</div>
				</div>

   <?php 
   endforeach; 
   wp_reset_postdata();
   		
   		$response = ob_get_contents();
   		ob_end_clean();
   		echo $response;
   		die(1);
   
}
add_action( 'wp_ajax_nopriv_load-filter', 'prefix_load_cat_posts' );
add_action( 'wp_ajax_load-filter', 'prefix_load_cat_posts' );


function prefix_load_gender_men () {
		$men_id = $_POST[ 'cat' ];
    	$men_post = array (
    		'taxonomy' 			=> 'gender_uniform',
  			'term' 				=> 'men',
	        'post_type' 		=> 'football_uniform',	
	        'cat' 				=> $men_id,
	        'posts_per_page' 	=> -1,
	        'order' 			=> 'DESC'

		);
   	 
   		 $posts = get_posts( $men_post );
  		 ob_start ();
   		foreach ( $posts as $post ) : setup_postdata( $post ); ?>
			<?php $thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>

				<div class="column">
					<div class="uniform-wrapper">
						<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
						<h2><?php echo $post->post_title; ?></h2>
						<p><?php echo get_the_content(); ?></p>
	
							<?php printf("<a href='http://alpha.qstrike.com/builder/0/%s'>GO BUILD</a>",$item_id); ?>
					</div>
				</div>
				
   <?php endforeach; wp_reset_postdata();
   		
   		$response = ob_get_contents();
   		ob_end_clean();
   		echo $response;
   		die(1);

}
add_action( 'wp_ajax_nopriv_load-filter-men', 'prefix_load_gender_men' );
add_action( 'wp_ajax_load-filter-men', 'prefix_load_gender_men' );


function prefix_load_gender_women () {
		
		$women_id 	= $_POST[ 'cat' ];
    	$women_post = array (
    		'taxonomy' 			=> 'gender_uniform',
  			'term' 				=> 'women',
	        'post_type' 		=> 'football_uniform',	
	        'cat' 				=> $women_id,
	        'posts_per_page' 	=> -1,
	        'order' 			=> 'DESC'

		);
   	 
   		 $posts = get_posts( $women_post );
  		 ob_start ();
   		foreach ( $posts as $post ) : setup_postdata( $post ); ?>
			<?php $thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>

				<div class="column">
					<div class="uniform-wrapper">
						<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
						<h2><?php echo $post->post_title; ?></h2>
						<p><?php echo get_the_content(); ?></p>
						<?php printf("<a href='http://alpha.qstrike.com/builder/0/%s'>GO BUILD</a>",$item_id); ?>
					</div>
				</div>
				
   <?php endforeach; wp_reset_postdata();
   		
   		$response = ob_get_contents();
   		ob_end_clean();
   		echo $response;
   		die(1);
}
add_action( 'wp_ajax_nopriv_load-filter-women', 'prefix_load_gender_women' );
add_action( 'wp_ajax_load-filter-women', 'prefix_load_gender_women' );



function prefix_load_gender_youth () {
		
		$youth_id 	= $_POST[ 'cat' ];
    	$youth_post = array (
    		'taxonomy' 			=> 'gender_uniform',
  			'term' 				=> 'youth',
	        'post_type' 		=> 'football_uniform',	
	        'cat' 				=> $youth_id,
	        'posts_per_page' 	=> -1,
	        'order' 			=> 'DESC'

		);
   	 
   		 $posts = get_posts( $youth_post );
  		 ob_start ();
   		foreach ( $posts as $post ) : setup_postdata( $post ); ?>
			<?php $thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>

				<div class="column">
					<div class="uniform-wrapper">
						<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
						<h2><?php echo $post->post_title; ?></h2>
						<p><?php echo get_the_content(); ?></p>
						<?php printf("<a href='http://alpha.qstrike.com/builder/0/%s'>GO BUILD</a>",$item_id); ?>
					</div>
				</div>
				
   <?php endforeach; wp_reset_postdata();
   		
   		$response = ob_get_contents();
   		ob_end_clean();
   		echo $response;
   		die(1);
}
add_action( 'wp_ajax_nopriv_load-filter-youth', 'prefix_load_gender_youth' );
add_action( 'wp_ajax_load-filter-youth', 'prefix_load_gender_youth' );

// Changing excerpt length
function new_excerpt_length($length) {
return 35;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
return '..';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Enqueue scripts and styles.
 */
function prolook_scripts() {

	/**CSS**/
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/assets/foundation/css/foundation.css', array(), '1', 'all' );
 	wp_enqueue_style( 'foundation' );

 	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/flexslider/flexslider.css', array(), '1', 'all' );
 	wp_enqueue_style( 'flexslider' );

 	wp_enqueue_style( 'animation', get_template_directory_uri() . '/assets/animation/animate.css', array(), '1', 'all' );
 	wp_enqueue_style( 'animation' );

 	wp_enqueue_style( 'google-fonts-opensands', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto:400,500,700,900', array(), '1', 'all' );
 	wp_enqueue_style( 'google-fonts-opensands' );

 	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '1', 'all' );
 	wp_enqueue_style( 'font-awesome' );


	/**JS**/
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-1.12.3.js', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'jquery' );

 	wp_register_script( 'wow.js',get_template_directory_uri() .'/assets/animation/wow.min.js', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'wow.js' );

 	wp_register_script( 'shuffle.js',get_template_directory_uri() .'/assets/jquery.shuffle.min.js', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'shuffle.js' );

	wp_register_script( 'foundation.js',get_template_directory_uri() .'/assets/foundation/js/foundation.js', array( 'jquery' ), '1', false );
 	wp_enqueue_script( 'foundation.js' );
 	
 	wp_register_script( 'flexslider.js',get_template_directory_uri() .'/assets/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'flexslider.js' );

 	wp_register_script( 'script.js',get_template_directory_uri() .'/js/script.js', array( 'jquery' ), '1', false );
 	wp_enqueue_script( 'script.js' );

  	wp_register_script( 'football.js',get_template_directory_uri() .'/js/football.js', array( 'jquery' ), '1', false );
 	wp_enqueue_script( 'football.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'prolook_scripts' );

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
 * Slightly Modified Options Framework
 */
require_once ('admin/index.php');

/**
 * Slightly Modified Options Framework
 */
require_once( 'assets/metabox/metabox.php' );

/**
 * BFI 
 */
require_once( 'inc/BFI_Thumb.php' );

/**
 * Load Mobile Detect
 */
require_once('inc/Mobile_Detect.php');


/**
 * Debug
 */

function print_r2($array) {
	echo "<pre>";
		var_dump($array);
	echo "</pre>";
}
