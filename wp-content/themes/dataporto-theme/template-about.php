<?php
/*
Template Name: About Template
*/
?>
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
	<?php
		if (function_exists('has_post_thumbnail')) {
	    if ( has_post_thumbnail() ) {
	    	$post_image_id = get_post_thumbnail_id($post_to_use->ID);
	    	if ($post_image_id) {
	    		$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
	    		if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			}
		} else {
			$thumbnail = esc_url( home_url( 'wp-content/themes/dataporto-theme/images/bkg-section-default.jpg' ) );
		}
	}
	?>
	<div class="section-banner"	style="background:url('<?php echo $thumbnail; ?>') no-repeat center center;">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
	<div class="breadcrumb">
		<?php if(function_exists('bcn_display')) {
			bcn_display();
		}?>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-about' ); ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>