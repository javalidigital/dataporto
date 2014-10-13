<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Dataporto Theme
 */

get_header(); ?>
	<?php $thumbnail = esc_url( home_url( 'wp-content/themes/dataporto-theme/images/bkg-section-default.jpg' ) );?>
	<div class="section-banner"	style="background:url('<?php echo $thumbnail; ?>') no-repeat center center;">
		<header class="entry-header">
			<h1 class="entry-title">Relat&oacute;rios</h1>
		</header><!-- .entry-header -->
	</div>
	<div class="breadcrumb">
		<?php if(function_exists('bcn_display')) {
			bcn_display();
		}?>
	</div>
	<div id="primary" class="content-area clearfix reports">
		<main id="main" class="site-main" role="main">
			<?php if ( is_singular( 'product' ) ) { ?>				
				<?php woocommerce_content(); ?>
				<footer class="post-footer">
					<div class="post-disclaimer">
						<p class="post-disclaimer-text">Este &eacute; um conte&uacute;do exclusivo e &eacute; vedada a sua altera&ccedil;&atilde;o, adapta&ccedil;&atilde;o e compartilhamento parcial ou na &iacute;ntegra.</p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>reportar-erro"  class="post-disclaimer-link">Reportar Erro</a>
					</div>
				</footer>				
			<?php } else { ?>				
				<?php woocommerce_get_template( 'archive-product.php' ); ?>
			<?php }; ?>
		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-reports' ); ?>			
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>