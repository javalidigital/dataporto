<?php
/**
 * The template for displaying all single posts.
 *
 * @package Dataporto Theme
 */

get_header(); ?>	
	<div class="section-banner">
		<header class="entry-header">
			<h1 class="entry-title">
				<?php
					$category = get_the_category(); 
					echo $category[0]->cat_name;
				?>
			</h1>
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

			<?php get_template_part( 'content', 'single' ); ?>			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php if ( in_category( 'noticias-comentadas' )) { ?>
				<?php dynamic_sidebar( 'sidebar-news' ); ?>			
			<?php } elseif ( in_category( 'regulacao-legislacao' )) { ?>
				<?php dynamic_sidebar( 'sidebar-law' ); ?>
			<?php } else { ?>
				<?php dynamic_sidebar( 'sidebar' ); ?>
			<?php } ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>