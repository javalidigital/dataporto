<?php
/**
 * Dataporto Theme functions and definitions
 *
 * @package Dataporto Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'dataporto_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dataporto_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dataporto Theme, use a find and replace
	 * to change 'dataporto-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dataporto-theme', get_template_directory() . '/languages' );

	
	// Add post thumbnail support
	add_theme_support( 'post-thumbnails' ); 
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dataporto-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dataporto_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // dataporto_theme_setup
add_action( 'after_setup_theme', 'dataporto_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dataporto_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dataporto-theme' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-sidebar"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar - Sobre o Dataporto', 'dataporto-theme' ),
		'id'            => 'sidebar-about',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-sidebar"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar - Notícias Comentadas', 'dataporto-theme' ),
		'id'            => 'sidebar-news',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-sidebar"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar - Regulação & Legislação', 'dataporto-theme' ),
		'id'            => 'sidebar-law',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-sidebar"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Home - Serviços', 'dataporto-theme' ),
		'id'            => 'sidebar-services-home',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="services-home-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer - Boxes', 'dataporto-theme' ),
		'id'            => 'sidebar-footer-boxes',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-box %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer - Links', 'dataporto-theme' ),
		'id'            => 'sidebar-footer-links',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer - Vasconsult', 'dataporto-theme' ),
		'id'            => 'sidebar-footer-vasconsult',
		'description'   => '',
		'before_widget' => '<a href="http://vasconsult.eng.br" target="_blank" title="Conhe&ccedil; a Vasconsult">',
		'after_widget'  => '</a>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'dataporto_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dataporto_theme_scripts() {
	wp_enqueue_script("jquery");
	
	wp_enqueue_style( 'dataporto-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dataporto-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'dataporto-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dataporto_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

add_filter( "the_excerpt", "add_class_to_excerpt" );
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
}