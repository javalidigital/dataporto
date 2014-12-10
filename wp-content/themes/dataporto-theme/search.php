<?php
/**
 * The template for displaying search results pages.
 *
 * @package Dataporto Theme
 */

get_header(); ?>
	<?php $thumbnail = esc_url( home_url( 'wp-content/themes/dataporto-theme/images/bkg-section-default.jpg' ) ); ?>
	<div class="section-banner"	style="background:url('<?php echo $thumbnail; ?>') no-repeat center center;">
		<header class="entry-header">
			<h1 class="entry-title">Pesquisar</h1>
		</header><!-- .entry-header -->
	</div>
	<div class="breadcrumb">
		<?php if(function_exists('bcn_display')) {
			bcn_display();
		}?>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="search clearfix">
				<div class="title-category">
					<h4><?php printf( __( 'Search Results for: %s', 'dataporto-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
				</div>
				
				<?php if ( have_posts() ) : ?>						
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', 'search' );
						?>
		
					<?php endwhile; ?>
					
					<nav class="site-navigation">
						<?php wp_pagenavi(); ?>
					</nav>
				<?php else : ?>
		
					<?php get_template_part( 'content', 'none' ); ?>
		
				<?php endif; ?>
			</div>
		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>