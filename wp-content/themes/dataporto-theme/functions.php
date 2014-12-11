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
		'name'          => __( 'Sidebar - Relatórios', 'dataporto-theme' ),
		'id'            => 'sidebar-reports',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-sidebar"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar - Trial', 'dataporto-theme' ),
		'id'            => 'sidebar-trial',
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
		'before_widget' => '<div id="%1$s" class="services-home-box-container %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home - Banco de Dados', 'dataporto-theme' ),
		'id'            => 'sidebar-database-home',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
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
		'before_widget' => '<a href="http://vasconsult.eng.br" target="_blank" title="Conhe&ccedil;a a Vasconsult">',
		'after_widget'  => '</a>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Header - Login', 'dataporto-theme' ),
		'id'            => 'sidebar-header-login',
		'description'   => '',
		'before_widget' => '<div class="header-login-form">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 style=display:none>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'dataporto_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dataporto_theme_scripts() {
	wp_enqueue_script("jquery");
	
	wp_enqueue_script("jquery-ui-autocomplete");

	wp_enqueue_script("jquery-ui-accordion");
	
	wp_enqueue_style( 'dataporto-theme-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'dataporto-form-database', get_template_directory_uri() . '/js/form-database.js', array(), '20120206', true );

	wp_enqueue_script( 'dataporto-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'dataporto-accordion', get_template_directory_uri() . '/js/accordion.js', array(), '20140115', true );

	wp_enqueue_script( 'dataporto-mask', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array(), '20150115', true );

	wp_enqueue_script( 'dataporto-validator', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '20160115', true );	

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
	function fb_filter_query( $query, $error = true ) {
		if ( is_search() ) {
			$query->is_search = false;
			$query->query_vars[s] = false;
			$query->query[s] = false;
			// to error
			if ( $error == true )
				$query->is_404 = true;
		}
	}
	add_action( 'parse_query', 'fb_filter_query' );
	add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
}


function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));

	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");

/**
 * WooCommerce
 */
 
add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );


function woocommerce_custom_subscription_product_single_add_to_cart_text( $text = '' , $post = '' ) {
	global $product;
	if ( $product->is_type( 'subscription' ) ) {
		return __( 'Assinar Agora', 'woocommerce' );
	} else {
		return __( 'Acessar relat&oacute;rio', 'woocommerce' );
	}	
	return $text; 
}

add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_subscription_product_single_add_to_cart_text', 2, 10);
 



add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) { 
	$tabs['description']['title'] = __( 'Tabela de Conte&uacute;dos' );		// Rename the description tab 
	return $tabs; 
}

add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) { 
	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback 
	return $tabs;
}
 
function woo_custom_description_tab_content() {	
	echo the_content();
}

/**
 * Redirect subscription add to cart to checkout page
 *
 * @param string $url
 */
function custom_add_to_cart_redirect( $url ) {
	global $woocommerce;
	$product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_REQUEST['add-to-cart'] ) );
	$product_id_new = (int) apply_filters('woocommerce_add_to_cart_product_id', $_POST['product_id']);	
	if ( class_exists( 'WC_Subscriptions_Product' ) ) {
		
		if ( WC_Subscriptions_Product::is_subscription( $product_id ) ) {
						
			return get_permalink(get_option( 'woocommerce_checkout_page_id' ) );
			
		} else return $url;
		
	} elseif ( $_POST['_regular_price'] == 0 ) {
		
		return get_permalink(get_option( 'woocommerce_checkout_page_id' ) );
				
	} else return $url;
}
add_filter('add_to_cart_redirect', 'custom_add_to_cart_redirect');


/**
 * Empty the cart if a subscription is added to the cart
 *
 * @param string $cart_item_data
 */
function woo_custom_add_to_cart( $cart_item_data ) {
	global $woocommerce;
	$product_id	= (int) $_REQUEST['add-to-cart'];
	if ( class_exists( 'WC_Subscriptions_Product' ) ) {
		if ( WC_Subscriptions_Product::is_subscription( $product_id ) ) {
			$woocommerce->cart->empty_cart();
			return $cart_item_data;
		}
	}
}
add_filter( 'woocommerce_add_cart_item_data', 'woo_custom_add_to_cart' );


/**
 * Add the field to the checkout
 **/
add_action('woocommerce_after_order_notes', 'possivel_assinante_field');

function possivel_assinante_field( $checkout ) {

    echo '<div id="possivel_assinante_field" style="margin-top:15px;"><h3>'.__('Deseja conhecer nossos planos pagos? ').'</h3>';

    woocommerce_form_field( 'possivel_assinante', array(
        'type'          => 'select',
        'class'         => array('my-field-class form-row-wide'),
		'required' 		=> true,
        'label'         => __('Selecione para receber informa&ccedil;&otilde;es sobre planos e valores.'),
		'options'     => array(
			'' => __('Selecione', 'woocommerce'),
        	'Sim' => __('Sim', 'woocommerce' ),
        	'Nao' => __('N&atilde;o', 'woocommerce' )
        	)
        ), $checkout->get_value( 'possivel_assinante' ));

    echo '</div>';

}

/**
 * Process the checkout
 **/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if (!$_POST['possivel_assinante'])
         $woocommerce->add_error( __('Selecione se deseja conhecer nossos planos pagos') );
}

/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['possivel_assinante']) update_post_meta( $order_id, 'Deseja conhecer nossos planos pagos? ', esc_attr($_POST['possivel_assinante']));
}