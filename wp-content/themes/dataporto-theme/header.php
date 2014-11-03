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
<script type="text/javascript">
	jQuery(document).ready(function() {
		// Create the dropdown base
		jQuery("<select />").appendTo("nav.main-navigation");
		
		// Create default option "Go to..."
		jQuery("<option />", {
		   "selected": "selected",
		   "value"   : "",
		   "text"    : "Ir para..."
		}).appendTo("nav.main-navigation select");
		
		// Populate dropdown with menu items
		jQuery("nav.main-navigation a").each(function() {
		 var el = jQuery(this);
		 jQuery("<option />", {
		     "value"   : el.attr("href"),
		     "text"    : el.text()
		 }).appendTo("nav.main-navigation select");
		});
		
		jQuery("nav.main-navigation select").change(function() {
		  window.location = jQuery(this).find("option:selected").val();
		});
	});
</script>

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
</script>
</head>

<body <?php body_class(); ?>>
<!-- GOOGLE ANALYTICS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56388907-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- END GA -->
<div id="page" class="hfeed site">
<header id="masthead">
	<div class="top-bar">
		<div class="top-bar-container">
			<div class="login-header">
				<?php dynamic_sidebar( 'sidebar-header-login' ); ?>
				<?php if ( is_user_logged_in() ) { ?>

				<?php } else { ?>
					<a class="button-link" href="<?php echo esc_url( home_url( '/' ) ); ?>cadastro/?add-to-cart=293" title="Cadastre-se">Cadastre-se</a>
				<?php } ?> 
			</div>
			<div class="support-header">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>contato" title="Contato">D&uacute;vidas? Entre em contato</a>
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
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->
<div id="content" class="site-content">