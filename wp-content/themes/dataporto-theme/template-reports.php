<?php
/*
Template Name: Reports Template
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
	<div id="primary" class="content-area reports">
		<main id="main" class="site-main" role="main">
			<div class="featured clearfix">
				<div class="title-category">
					<h4>Destaques</h4>
				</div>
				<?php
					$args = array(
						'post_type' => 'product',
						'meta_query' => array(
							array(
								'key' 	=> '_featured',
								'value' => 'yes'
							)
						),
						'posts_per_page' => 4
					);
					$posts_array = get_posts( $args );
				?>							
				<?php
					$i = 1; 
					foreach ( $posts_array as $post ) : setup_postdata( $post );
					$classes = ' ';
					 if ( $i == 1) {
				        $classes .= 'featured-item-first';
				    }
					$i++;
				?>
					<div class="featured-item <?php echo $classes;?>">
						<div class="featured-item-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb'); ?></a>							
						</div>
						<div class="featured-item-contents">
							<span class="featured-item-date">
								<?php the_time('l\, j \d\e F \d\e Y'); ?>
							</span>
							<h1 class="featured-item-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h1>							
							<a class="featured-item-link" href="<?php the_permalink() ?>">Acessar</a>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
			<div class="archive-container clearfix">
				<div class="title-category">
					<h4>Arquivo</h4>
				</div>
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
						'post_type' => 'product',
						'tax_query' => array(
							array(								 
					            'taxonomy' => 'product_cat',
					            'field' => 'slug',
					            'terms' => 'planos-de-assinatura',
					            'operator' => 'NOT IN'
							)
						),
						'meta_query' => array(
							array(
								'key' 	=> '_featured',
								'value' => 'no'
							)
						),
						'posts_per_page' => 10,
						'paged' => $paged
					);
					$category_posts = new WP_Query($args);
					if($category_posts->have_posts()) :
						while($category_posts->have_posts()) :
							$category_posts->the_post();
				?>				
					<div class="archive-item">
						<span class="archive-item-date">
							<?php the_time('l\, j \d\e F \d\e Y'); ?>
						</span>
						<h2 class="archive-item-title">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="archive-item-content">
							<?php the_excerpt(); ?>								
						</div>						
					</div>				
				<?php endwhile; ?>
				<nav class="site-navigation">
					<?php wp_pagenavi( array( 'query' => $category_posts ) ); ?>
				</nav>
				<?php else: ?>				
				     <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>				
				<?php endif; ?>	
			</div>
		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-reports' ); ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>