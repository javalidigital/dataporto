<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Dataporto Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url') ?>/favicon.ico">	
<link rel="icon" href="<?php echo get_bloginfo('template_url') ?>/favicon.png" type="image/png">	
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Exo:400,700,400italic|Open+Sans' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
<?php
   $placeholder_user = __( 'Username' );
   $placeholder_pass = __( 'Password' );
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	var placeholder_user_var = '<?php echo $placeholder_user; ?>'; 
	var placeholder_pass_var = '<?php echo $placeholder_pass; ?>';
    jQuery('#loginform input[type="text"]').attr('placeholder', placeholder_user_var);
	jQuery('#loginform input[type="password"]').attr('placeholder', placeholder_pass_var);
	jQuery('#loginform label[for="user_login"]').contents().filter(function() {
		return this.nodeType === 3;
	}).remove();
	jQuery('#loginform label[for="user_pass"]').contents().filter(function() {
		return this.nodeType === 3;
}).remove();
});

jQuery(function() {
    var availableTags = [
      "Porto de Santos",
      "Porto XYZ",
      "Porto QWE",
      "Porto ASD",
      "Porto zxc",
      "Porto poi",
      "Porto LKJ",
      "Porto MNB"
    ];
    jQuery( "#nome-porto" ).autocomplete({
      source: availableTags,
      autoFocus: true,
      appendTo: "#nome-porto-options"
    });
  });
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<header id="masthead">
	<div class="top-bar">
		<div class="top-bar-container">
			<div class="login">
				 <?php $args = array(
			        'echo'           => true,
			        'redirect'       => site_url( $_SERVER['REQUEST_URI'] ), 
			        'form_id'        => 'loginform',
			        'label_username' => __( 'Username' ),
			        'label_password' => __( 'Password' ),
			        'label_remember' => __( 'Remember Me' ),
			        'label_log_in'   => __( 'Entrar' ),
			        'id_username'    => 'user_login',
			        'id_password'    => 'user_pass',
			        'id_remember'    => 'rememberme',
			        'id_submit'      => 'wp-submit',
			        'remember'       => false,
			        'value_remember' => false
				); ?>
				<?php wp_login_form( $args ); ?> 
			</div>
			<div class="language">
				<?php do_action('icl_language_selector'); ?>
			</div>
		</div>
	</div>
	<div class="logo-search">
		<div class="logo-search-container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>" class="logo"></a>
			<div class="search-header">
				<?php get_search_form(); ?>
			</div>
		</div>		
	</div>
	<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'dataporto-theme' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->
<div id="content" class="site-content">